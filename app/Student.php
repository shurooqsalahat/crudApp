<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone'
        ];
    protected $dates = ['deleted_at'];
}
