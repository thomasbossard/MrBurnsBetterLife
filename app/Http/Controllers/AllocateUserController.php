<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class AllocateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
                
            $unallocatedusers = DB::table('users')
                    ->whereNull('rentableobject_id')
                    ->get();
            
            $allocatedobjects = DB::table('users')
                    ->whereNotNull('rentableobject_id')
                    ->get();
            
            #allocatedobjects ist eine Collection, diese muss zu einem Array gemacht werden
            $allocatedobjects_array = array();
            foreach ($allocatedobjects as $object){
                array_push($allocatedobjects_array, $object->rentableobject_id);
            }
            
            
            $unallocatedobjects = DB::table('rentableobjects')
                    ->whereNotIn('id', $allocatedobjects_array)
                    ->get();
            
            return view('pages.allocateUser', compact('unallocatedusers', 'unallocatedobjects'));
        } else {
            return view('pages.error');
        }
        
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
        return redirect()->back()->with('message', 'Zuweisung gespeichert');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
