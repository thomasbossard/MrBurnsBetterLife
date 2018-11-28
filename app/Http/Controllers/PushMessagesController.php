<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pushmessage;
use Illuminate\Support\Facades\DB;
use Auth;
use Storage;
use Validator;

class PushMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    
    public function newpushmessage()
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->usertype_id == 1){
                
                $rentableobject = DB::table('rentableobjects')
                        ->get();
                
                $pushmessages = DB::table('pushmessages')
                        ->join('rentableobjects', 'rentableobjects.id', '=', 'pushmessages.rentableobject_id')
                        ->select('pushmessages.subject', 'rentableobjects.name','pushmessages.text', 'pushmessages.date','pushmessages.id')
                        ->get();
    
                return view('manage.newpushmessage', compact('rentableobject', 'pushmessages'));
                
                
            } else {
                    return view('pages.error')->with('errormessage', 'Keine Berechtigung. Melden Sie sich bitte bei der Verwaltung.');
                }
        } else {
            return view('pages.nologinerror');
        }     
    }
    
    public function storenewpushmessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'text' => 'required',
        ]);
        if(!($validator->fails())){
            

            $pushmessage = new PushMessage;
            $pushmessage->subject            = $request->subject;
            $pushmessage->text               = $request->text;
            $pushmessage->date               = date('Y-m-d H:i:s');
            $pushmessage->rentableobject_id  = $request->rentableobject_id;
            

            $pushmessage->save();
            //
            return redirect()->back()->with('message', 'Neue Rechnung gespeichert!');
        } else {
            return redirect()->back()->with('message', 'Bitte alle Felder richtig ausfüllen!');
        }
        
    }
    
    public function deletepushmessage(Request $request)
    {
        if($request->filled('id')){
            foreach ($request->id as $id){
                $pushmessage = PushMessage::find($id);
                $pushmessage->delete();
                
            }    
               
            
        return redirect()->back()->with('message', 'Gelöscht');
    } else {
            return redirect()->back();
        }
        }
}
