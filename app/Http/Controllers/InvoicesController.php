<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use Illuminate\Support\Facades\DB;
use Auth;

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
                
                $invoice = DB::table('invoices')
                        ->join('invoicetypes', 'invoicetypes.id', '=', 'invoices.type_id')
                        ->where('user_id', '=', $id)
                        ->select('invoices.*', 'invoicetypes.type')
                        ->get();

                $payment = DB::table('payments')
                        ->where('user_id', '=', $id)
                        ->orderBy('date', 'asc')
                        ->get();
                
                return view('myobject.invoices', compact('invoice', 'payment'));
                
            } else {
                return view('pages.error')->with('errormessage', 'Kein Haus zugewiesen. Melden Sie sich bitte bei der Verwaltung.');
            }
        } else {
            return view('pages.nologinerror');
        }
    }
}
