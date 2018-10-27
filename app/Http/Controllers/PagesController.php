<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Laravel!';
        return view('pages.index')-> with('titel', $title);
    }
    
    public function about(){
       $title = 'About us';
       return view('pages.about')-> with('titel', $title);
    }
      public function services(){
        $data = array(
            'title' => 'Services',
            'services' =>['Yolo', 'Hallo', 'Idiot']
        );
        return view('pages.services')-> with($data);
    }
}
