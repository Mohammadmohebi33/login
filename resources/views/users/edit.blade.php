@extends('layouts.welcome')


@section('content')

    <h1>ثبت کاربر جدید :</h1>

    <div class="row">

        <div class="col-md-10 offset-md-1">


                <form  enctype="multipart/form-data" method="post"   action={{route('panel.update' , $user->id)}}>
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">نام کاربری</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="" placeholder="entet title" value="{{$user->name}}">
                        @if($errors->has('name'))
                            <p style="color: red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>



                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="" placeholder="entet title" value="{{$user->email}}">
                        @if($errors->has('email'))
                            <p style="color: red">{{ $errors->first('email') }}</p>
                        @endif
                    </div>





                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="role">

                            @foreach($roles   as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach

                        </select>
                    </div>





                    <div class="form-group">
                        <label for="title">تصویر اصلی</label>
                        <input type="file" name="avatar" class="form-control-file" id="user_image"  placeholder="entet title">

                        @if($user->avatar != null)
                        <img src='/storage/user/{{$user->avatar}}' width="300px" height="200px">
                        @endif

                        @if($errors->has('avatar'))
                            <p style="color: red">{{ $errors->first('avatar') }}</p>
                        @endif
                    </div>



                    <button type="submit" class="btn-primary">ثبت </button>
                </form>


        </div>
    </div>



@endsection
