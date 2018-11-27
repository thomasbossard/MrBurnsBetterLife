<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use Illuminate\Support\Facades\DB;
use Auth;
use Storage;
use Validator;

class PushMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    
    public function newpushmessage()
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->usertype_id == 1){
                
                $rentableobject = DB::table('rentableobjects')
                        ->get();
                
                $pushmessages = DB::table('pushmessages')
                        ->join('rentableobjects', 'rentableobjects.id', '=', 'pushmessages.rentableobject_id')
                        ->get();
       
                return view('manage.newpushmessage', compact('rentableobject', 'pushmessages'));
                
                
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
