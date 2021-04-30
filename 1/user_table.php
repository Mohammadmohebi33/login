<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_table extends Model
{
    //
    protected $table = 'user_teable' ;

    protected $fillable = [

        'name' ,
        'family' ,
        'email' ,
        'number' ,
        'addres' ,

    ] ;
}
