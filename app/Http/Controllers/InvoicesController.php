<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use Illuminate\Support\Facades\DB;
use Auth;
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
            
            if ($user->usertype_id == 1){
                
                $users = DB::table('users')
                        ->where('users.usertype_id', '=', 2)
                        ->get();
                
                $invoicetypes = DB::table('invoicetypes')
                        ->get();
                
                return view('manage.newinvoice', compact('users', 'invoicetypes'));
                
                
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
            $path = $request->file('fileupload')->store('public');

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
}
