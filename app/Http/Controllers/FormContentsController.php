<?php

namespace App\Http\Controllers;

use App\Exports\FormContentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\FormContent;


class FormContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.formcontents');
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
        $form = new \App\FormContent;
        $form->firstname       = $request->firstname;
        $form->givenname       = $request->givenname;
        $form->email       = $request->email;
        $form->subject       = $request->subject;
        $form->text       = $request->text;
        
        $form->save();
        //
        return redirect()->back()->with('message', 'Vielen Dank für die Nachricht. Wir werden uns schnellstmöglich bei Ihnen melden!');
	
    }
    public function getMessages()
    {
        if (Auth::check() and User::find(Auth::id())->usertype_id == 1) {
            $allnewformcontents = FormContent::where('processed', "0")->get();
            $allprocessedformcontents = FormContent::where('processed', "1")->get();
            
            return view('manage.formcontents')->with(compact('allnewformcontents', 'allprocessedformcontents'));
        } else {
            return view('pages.error')->with('errormessage', 'Kein Zugriff. Melden Sie sich bitte bei der Verwaltung wenn Sie das Gefühl haben, Zugriff zu benötigen.');
        }
        
        //
    }
    public function processform(Request $request)
    {
        if($request->filled('id')){
            foreach ($request->id as $id){
                $form = FormContent::find($id);
                $form->processed = true;
                $form->save();
            }
            return redirect()->back()->with('message', 'Nachrichten verarbeitet. Sie finden die Nachrichten nun unter "verarbeitete Nachrichten".');
        } else {
            return redirect()->back();
        }
    }
    
    public function export() 
    {
        return Excel::download(new FormContentsExport, 'FormContent.xlsx');
    }
}
