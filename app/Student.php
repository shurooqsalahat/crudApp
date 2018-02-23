<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
use DB;

class Student extends Model
{
    //
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone'
        ];
}
