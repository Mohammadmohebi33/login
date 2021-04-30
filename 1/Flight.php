<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
   protected  $table = 'flight' ;

   protected $fillable  = [

       'name' , 'family' , 'email' , 'number' , 'addres'
   ] ;
}
