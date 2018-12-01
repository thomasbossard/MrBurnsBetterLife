<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\RentableObject;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use Storage;
use Validator;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->usertype_id == 2){
                
                $id = Auth::id();
                
                #alle Rechnungen für den aktuellen User
                $invoice = DB::table('invoices')
                        ->join('invoicetypes', 'invoicetypes.id', '=', 'invoices.type_id')
                        ->where('user_id', '=', $id)
                        ->select('invoices.*', 'invoicetypes.type')
                        ->get();

                #Alle Zahlungen des aktuellen User
                $payment = DB::table('payments')
                        ->where('user_id', '=', $id)
                        ->orderBy('date', 'asc')
                        ->get();
                
                #Total der Zahlungen des aktuellen User
                $totalpaid = 0;
                foreach ($payment as $pay){
                    $totalpaid += $pay->amount;
                }
                
                #offener Rechnungsbetrag des aktuellen User
                $openamount = 0;
                foreach ($invoice as $inv){
                    $openamount += $inv->amount;
                }
                $openamount = $openamount - $totalpaid;
                
                
                
                return view('myobject.invoices', compact('invoice', 'payment', 'totalpaid', 'openamount'));
                
            } else {
                return view('pages.error')->with('errormessage', 'Kein Haus zugewiesen. Melden Sie sich bitte bei der Verwaltung.');
            }
        } else {
            return view('pages.nologinerror');
        }
    }
    
    public function newinvoice()
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            #Gibt alle Users zurück welche einem Object zugeordnet wurden
            if ($user->usertype_id == 1){
                $users = DB::table('users')
                        ->join('rentableobjects', 'rentableobjects.id', '=', 'users.rentableobject_id') 
                        ->where('users.usertype_id', '=', 2)
                        ->select('users.*')
                        ->get();

                #Gibt alle Invoicetypes zurück
                $invoicetypes = DB::table('invoicetypes')
                        ->get();
                
                $invoices = DB::table('invoices')
                        ->join('users', 'users.id', '=', 'invoices.user_id') 
                        ->select('invoices.*', 'users.name', 'users.givenname')
                        ->get();
                
                return view('manage.newinvoice', compact('users', 'invoicetypes', 'invoices'));
                
                
            } else {
                    return view('pages.error')->with('errormessage', 'Keine Berechtigung. Melden Sie sich bitte bei der Verwaltung.');
                }
        } else {
            return view('pages.nologinerror');
        }     
    }
    
    public function storenewinvoice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fileupload' => 'required|file',
            'amount' => 'required',
            'description' => 'required'
        ]);
        if(!($validator->fails())){
            $filename = $request->file('fileupload')->getClientOriginalName();
            $path = $request->file('fileupload')->storeAs('public', $filename);
            
            $invoice = new Invoice;
            $invoice->amount  = $request->amount;
            $invoice->description  = $request->description;
            $invoice->date      = date('Y-m-d H:i:s');
            $invoice->user_id    = $request->user_id;
            $invoice->type_id    = $request->type_id;
            $invoice->filepath    = $path;

            $invoice->save();
            //
            return redirect()->back()->with('message', 'Neue Rechnung gespeichert!');
        } else {
            return redirect()->back()->with('message', 'Bitte alle Felder richtig ausfüllen!');
        }
        
    }
    
    public function downloadinvoice($id)
    {
        $invoice = Invoice::find($id);
        return Storage::download($invoice->filepath);
    }
    
    public function storenewadditionalcosts(Request $request)
    {
        foreach($request->except('_token') as $key => $value){
            $user = User::find($key);

            $user->currentadditionalcosts = $value;

            $user->save();
        }
        return redirect()->back()->with('message', 'neue unverrechnete Heiz und Nebenkosten gespeichert');
    }
    
    
     public function deleteinvoice(Request $request){
           if($request->filled('id')){
            foreach ($request->id as $id){
                $invoice = Invoice::find($id);
                $invoice->delete();
                
            }
                    return redirect()->back()->with('message', 'Rechnung(en) gelöscht.');
            }else {
            return redirect()->back();
        
     }}
}
