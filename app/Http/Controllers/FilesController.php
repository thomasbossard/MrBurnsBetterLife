<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\DB;
use Auth;
use Storage;
use Validator;

class FilesController extends Controller
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
                
                #alle Files für den aktuellen User
                $file = DB::table('files')
                        ->where('user_id', '=', $id)
                        ->select('files.*')
                        ->get();
                
                return view('myobject.files', compact('file'));

        } }else {
            return view('pages.nologinerror');
    }
    }
    
    public function newfile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->usertype_id == 1){
                
                $users = DB::table('users')
                        ->where('users.usertype_id', '=', 2)
                        ->get();
                
                return view('manage.newfile', compact('users'));
                
                
            } else {
                    return view('pages.error')->with('errormessage', 'Keine Berechtigung. Melden Sie sich bitte bei der Verwaltung.');
                }
        } else {
            return view('pages.nologinerror');
        }     
    }
    
    public function storenewfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fileupload' => 'required|file',
            'name' => 'required',
        ]);
        if(!($validator->fails())){
            $path = $request->file('fileupload')->store('public');

            $file = new File;
            $file->name  = $request->name;
            $file->user_id    = $request->user_id;
            $file->filepath    = $path;

            $file->save();
            //
            return redirect()->back()->with('message', 'Neues File gespeichert!');
        } else {
            return redirect()->back()->with('message', 'Bitte alle Felder richtig ausfüllen!');
        }
        
    }
    
    public function downloadfile($id)
    {
        $file = File::find($id);
        return Storage::download($file->filepath);
    }
}
