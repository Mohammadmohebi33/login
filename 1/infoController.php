<?php

namespace App\Http\Controllers;

use App\Flight;
use App\Http\Requests\ArticleReq;
use App\Info;
use App\User;
use App\user_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class infoController extends Controller
{
    public function index(){

        return view('index'  , [
            'data'=> user_table::all()  ,
        ]) ;

    }


    public  function update(user_table $user){


        return view('update' , [

            'data_id'=> user_table::findOrFail($user) ,

        ]) ;
    }



    public  function edit(ArticleReq $request ,  user_table $user)
    {

       $validate_data = $request->validated();
       $user->update($validate_data) ;


        return redirect('/') ;

    }





    public  function creat_user(){

        $validate_data = Validator::make(request()->all() , [

            'name'   => 'required' ,
            'family' =>'required' ,
            'email'  => 'required' ,
            'number' => 'required' ,
            'addres' => 'required' ,

        ])->validated();


        user_table::create([
            'name'   => $validate_data['name'],
            'family' => $validate_data['family'],
            'email'  => $validate_data['email'],
            'number' => $validate_data['number'],
            'addres' => $validate_data['addres'],
        ]);

        return redirect('/');
    }



    public function insert(){

        return view('/insert') ;
    }



    public function delete(user_table $user){


        $id = user_table::findOrFail($user->id);
        $id->delete();

        return back();
    }


}
