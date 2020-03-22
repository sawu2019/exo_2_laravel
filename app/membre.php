<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class membre extends Model
{
    protected $fillable =[
        'nom',
        'prenom',
        'email',

    ];
}
