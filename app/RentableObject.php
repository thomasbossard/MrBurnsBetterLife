<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentableObject extends Model
{
    protected $table ='rentableobjects';
    public $primaryKey = 'id';
}
