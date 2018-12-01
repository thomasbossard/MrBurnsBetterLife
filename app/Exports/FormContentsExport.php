<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\FormContent;
use Illuminate\Support\Facades\DB;

class FormContentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $formcontent= DB::table('formcontents')
        ->select('firstname', 'givenname', 'email', 'subject', 'text', 'created_at as date')
        ->where('processed', '=', 0)
        ->get();
        
       return $formcontent;
    }
}