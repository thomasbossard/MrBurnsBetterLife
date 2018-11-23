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
        if (Auth::check() and User::find(Auth::id())->usertype_id == 1) {
            $users_and_objects = DB::table('rentableobjects')
                        ->join('users', 'rentableobjects.id', '=', 'users.rentableobject_id')
                        ->select('rentableobjects.name as objectname', 'users.name', 'users.givenname', 'users.id')
                        ->where('users.usertype_id', '=', 2)
                        ->get();
            
            #alle nicht zugewiesenen user holen
            $unallocatedusers = DB::table('users')
                    ->whereNull('rentableobject_id')
                    ->where('users.usertype_id', '=', 2)
                    ->get();
            
            #allocatedobjects wird gebraucht, um nachher alle nicht zugewiesenen objekte zu holen (unallocatedobjects)
            $allocatedobjects = DB::table('users')
                    ->whereNotNull('rentableobject_id')
                    ->where('users.usertype_id', '=', 2)
                    ->get();
            
            #allocatedobjects ist eine Collection, diese muss zu einem Array gemacht werden
            $allocatedobjects_array = array();
            foreach ($allocatedobjects as $object){
                array_push($allocatedobjects_array, $object->rentableobject_id);
            }
            
            #hole alle nicht zugewiesenen objekte mit "whereNotIn"
            $unallocatedobjects = DB::table('rentableobjects')
                    ->whereNotIn('id', $allocatedobjects_array)
                    ->get();
            
            return view('manage.allocateUser', compact('unallocatedusers', 'unallocatedobjects', 'users_and_objects'));
        } else {
            return view('pages.error')->with('errormessage', 'Kein Zugriff. Melden Sie sich bitte bei der Verwaltung wenn Sie das Gefühl haben, Zugriff zu benötigen.');
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
        
        $user = User::find($request->user_id);
        
        $user->rentableobject_id = $request->object_id;
        
        $user->save();
        
        return redirect()->back()->with('message', 'Zuweisung gespeichert');
    }
    
    public function removeallocation(Request $request)
    {
        if($request->filled('id')){
            $user = User::find($request->id);
        
            $user->rentableobject_id = null;

            $user->save();

            return redirect()->back()->with('message', 'Zuweisung aufgehoben');
        } else {
            return redirect()->back();
        }
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
