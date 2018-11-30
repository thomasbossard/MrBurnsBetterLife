<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\RentableObject;
use App\Invoice;
use Illuminate\Support\Facades\DB;
use Auth;

class ObjectController extends Controller
{
    public function index(){
        
        if (Auth::check()) {
            $user = Auth::user();
           
            if ($user->usertype_id == 2){
                
                $id = Auth::id();

                $rentableobject = DB::table('rentableobjects')
                        ->join('users', 'rentableobjects.id', '=', 'users.rentableobject_id') 
                        ->where('users.id', '=', $id)
                        ->where('users.usertype_id', '=', 2)
                        ->select('rentableobjects.*')
                        ->get();

                $manager = DB::table('users')
                        ->where('users.usertype_id', '=', 1)
                        ->get();

                $groundkeeper = DB::table('users')
                        ->where('users.usertype_id', '=', 3)
                        ->get();

                $pushmessage = DB::table('pushmessages')
                        ->join('rentableobjects', 'rentableobjects.id', '=', 'pushmessages.rentableobject_id') 
                        ->join('users', 'rentableobjects.id', '=', 'users.rentableobject_id') 
                        ->where('users.id', '=', $id)
                        ->where('users.usertype_id', '=', 2)
                        ->select('pushmessages.*')
                        ->get();

                #alle Heiz- und Nebenkosten für den aktuellen User
                $invoice = DB::table('invoices')
                        ->join('invoicetypes', 'invoicetypes.id', '=', 'invoices.type_id')
                        ->where('user_id', '=', $id)
                        ->where('invoices.type_id', '<>', 1)
                        ->whereDate('date', '>', date('2018-01-01'))
                        ->select('invoices.*', 'invoicetypes.type')
                        ->get();
                $openamount = 0;
                foreach ($invoice as $inv){
                    $openamount += $inv->amount;
                }
                if ($rentableobject->isEmpty()){
                return view('pages.error')->with('errormessage', 'Leider wurde Ihnen noch kein Objekt zugewiesen. Melden Sie sich bitte bei der Verwaltung.');
                } else {
                  return view('myobject.index', compact('manager', 'groundkeeper', 'rentableobject', 'pushmessage', 'openamount'));
         }     } }else {
                return view('pages.nologinerror');
            }
            
}   }