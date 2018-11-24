<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;

class PaymentsController extends Controller
{
    
    public function newpayment()
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->usertype_id == 1){
                
                $users = DB::table('users')
                        ->where('users.usertype_id', '=', 2)
                        ->get();
                
                $allunpaidinvoices = DB::table('invoices')
                        ->join('users', 'users.id', '=', 'invoices.user_id')
                        ->where('invoices.paid', '=', 0)
                        ->select('invoices.*','users.name','users.givenname')
                        ->get();
                
                return view('manage.newpayment', compact('users', 'allunpaidinvoices'));
                
            } else {
                    return view('pages.error')->with('errormessage', 'Keine Berechtigung. Melden Sie sich bitte bei der Verwaltung.');
                }
        } else {
            return view('pages.nologinerror');
        }     
    }
    
    public function storenewpayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required'
        ]);
        if(!($validator->fails())){
            
            $payment = new Payment;
            $payment->amount  = $request->amount;
            $payment->user_id  = $request->user_id;
            $payment->date      = date('Y-m-d H:i:s');
            
            $payment->save();
            //
            return redirect()->back()->with('message', 'Neue Zahlung gespeichert!');
        } else {
            return redirect()->back()->with('message', 'Bitte alle Felder richtig ausfüllen!');
        }
        
    }
    
    public function processinvoice(Request $request)
    {
        if($request->filled('id')){
            foreach ($request->id as $id){
                $form = \App\Invoice::find($id);
                $form->paid = true;
                $form->save();
            }
            return redirect()->back()->with('message', 'Rechnungen verarbeitet.');
        } else {
            return redirect()->back();
        }
    }
}
