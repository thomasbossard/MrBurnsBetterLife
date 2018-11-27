<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterfaceController extends Controller
{
    public function allinvoices()
    {
           
        $invoice = DB::table('invoices')
                        ->join('invoicetypes', 'invoicetypes.id', '=', 'invoices.type_id')
                        ->join('users', 'users.id', '=', 'invoices.user_id')
                        ->select('invoices.amount', 'invoices.date', 'invoicetypes.type', 'users.Name', 'users.givenname')
                        ->get();
        return $invoice->toJson();
    }
    
    public function openamounts()
    {
        $users = DB::table('users')
                ->select('users.Name', 'users.givenname', 'users.id')
                ->where('users.usertype_id', '=', 2)
                ->get();
               
        foreach ($users as $user) {
            $id = $user->id;
            
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
            
            $user->openamount = $openamount;
        }
        
        return $users->toJson();
    }
    
    
    //
}
