<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ManagerController extends Controller
{
    public function index(){
        if (Auth::check()) {
           $user = Auth::user();
           
           if ($user->usertype_id == 1){
               return view('manage.index');
           }
           else {
               return view('pages.error')->with('errormessage','Kein Zugriff auf diese Seite!');
           }
        }
    }
    //
}
