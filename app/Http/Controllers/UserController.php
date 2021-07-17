<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequesst;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends UploadImageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('users.index'   ,  ['users'    =>  User::all()] )  ;
    }

    /**
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('users.create_user' ,   ['roles'    =>  Role::all()])     ;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequesst $request)
    {

       $data    =   $request->all() ;
       $role    =    $data['role']  ;
       $data['password']   =  bcrypt( $data['password'])   ;

       $user    =   User::create($data)    ;
       $user->role()->attach($role)    ;

       return redirect(route('panel.index'))    ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user   =   User::find($id) ;
        return view('users.edit'    ,   ['user' => $user , 'roles' => Role::all()])   ;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $data = $request->except('role')    ;
       $role    =   $request->only('role')  ;
       $user = User::find($id)  ;







        if ($request->hasFile('avatar')) {
            $imageurl = $this->uploadImage(request()->file('avatar'));

            $data['avatar'] =   $imageurl   ;

        }



        $user->update($data)  ;
        $user->role()->detach($user->role)  ;
        $user->role()->attach($role)    ;
        return redirect(route('panel.index'))    ;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user    =   User::find($id) ;
       $user->delete()  ;
       return back()        ;
    }
}
