<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\FormContent;

class FormContentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return FormContent::all();
    }
}
