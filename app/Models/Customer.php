<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    protected $fillable = [
        'NAME',
        'ADDRESS',
        'GENDER',
        'NO_HP'
    ];
}
