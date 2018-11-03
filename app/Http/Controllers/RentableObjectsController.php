<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\RentableObject;
use App\Invoice;
use Illuminate\Support\Facades\DB;
use Auth;

class RentableObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
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
    
    $invoice = DB::table('users')
            ->join('rentableobjects', 'rentableobjects.id', '=', 'users.rentableobject_id') 
            ->join('invoices', 'invoices.id', '=', 'users.invoice_id') 
            ->where('users.id', '=', $id)
            ->where('users.usertype_id', '=', 2)
            ->select('invoices.*')
            ->get();
    
    $payment = DB::table('payments')
            ->join('users', 'payments.user_id', '=', 'users.id') 
            ->where('payments.user_id', '=', $id)
            ->where('users.usertype_id', '=', 2)
            ->orderBy('date', 'asc')
            ->select('payments.*')
           
            ->get();
    
    $pushmessage = DB::table('pushmessages')
            ->join('rentableobjects', 'rentableobjects.id', '=', 'pushmessages.rentableobject_id') 
            ->join('users', 'rentableobjects.id', '=', 'users.rentableobject_id') 
            ->where('users.id', '=', $id)
            ->where('users.usertype_id', '=', 2)
            ->select('pushmessages.*')
            ->get();
         

      return view('rentableobjects.index', compact('manager', 'groundkeeper', 'rentableobject', 'invoice', 'payment', 'pushmessage'));
    
        //      ->with('rentableobjects', $rentableobject);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return RentableObject::find($id); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
