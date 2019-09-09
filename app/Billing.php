<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected  $fillable=[

        'user_id',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'address',

    ];
}
