<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Categore;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends UploadImageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index'    ,   ['posts'    =>  Post::all()])   ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('post.create'   ,   ['categores'    =>  Categore::all()]  ) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

       $data   =   $request->except('categores')     ;


       $imageurl =  $this->uploadImage(request()->file('avatar')) ;



       $data['avatar']  =   $imageurl   ;
       $post =  auth()->user()->posts()->create($data);
       $post->categore()->attach(request('categores'))    ;

       return redirect(route('post.index')) ;





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

        $post   =   Post::find($id) ;
        $categores  =   Categore::all();

        return view('post.edit' ,   ['post' =>  $post       ,   'categores' =>  $categores]) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post   =   Post::find($id) ;


        $data   =   $request->except('categores')     ;


         if ($request->hasFile('avatar')){

        $imageurl =  $this->uploadImage(request()->file('avatar')) ;
        $data['avatar']  =   $imageurl   ;
         
         }
         
       $data['avatar']  =   $post->avatar ;
       
        $post->update($data)    ;
        $post->categore()->detach($post->categore)  ;
        $post->categore()->attach(request('categores'))    ;
        return redirect(route('post.index'))    ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post   =   Post::find($id) ;
        $post->delete() ;
        return back()   ;

    }
}
