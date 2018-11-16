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

                $invoice = DB::table('invoices')
                        ->join('invoicetypes', 'invoicetypes.id', '=', 'invoices.type_id')
                        ->where('user_id', '=', $id)
                        ->select('invoices.*', 'invoicetypes.type')
                        ->get();

                $payment = DB::table('payments')
                        ->where('user_id', '=', $id)
                        ->orderBy('date', 'asc')
                        ->get();

                $pushmessage = DB::table('pushmessages')
                        ->join('rentableobjects', 'rentableobjects.id', '=', 'pushmessages.rentableobject_id') 
                        ->join('users', 'rentableobjects.id', '=', 'users.rentableobject_id') 
                        ->where('users.id', '=', $id)
                        ->where('users.usertype_id', '=', 2)
                        ->select('pushmessages.*')
                        ->get();


                return view('myobject.index', compact('manager', 'groundkeeper', 'rentableobject', 'invoice', 'payment', 'pushmessage'));

            } else {
                return view('pages.error')->with('errormessage', 'Kein Haus zugewiesen. Melden Sie sich bitte bei der Verwaltung.');
            }
            } else {
                return view('pages.nologinerror');
            }
    }
}   