@extends('layouts.welcome')


@section('content')

    <h1>ثبت کاربر جدید :</h1>

    <div class="row">

        <div class="col-md-10 offset-md-1">


                <form   method="post"   action={{route('panel.store')}}>
                    @csrf

                    <div class="form-group">
                        <label for="name">نام کاربری</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="" placeholder="entet title">
                        @if($errors->has('name'))
                            <p style="color: red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>



                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="" placeholder="entet title">
                        @if($errors->has('email'))
                            <p style="color: red">{{ $errors->first('email') }}</p>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="email">رمز عبور</label>
                        <input type="password" name="password" class="form-control" id="password" aria-describedby="" placeholder="entet title">
                        @if($errors->has('password'))
                            <p style="color: red">{{ $errors->first('password') }}</p>
                        @endif
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="role">

                            @foreach($roles    as $roel)
                            <option value="{{$roel->id}}">{{$roel->name}}</option>
                            @endforeach

                        </select>
                    </div>




                    <div class="form-group">
                        <label for="title">File</label>
                        <input type="file" name="post_image" class="form-control-file" id="post_image"  placeholder="entet title">
                        @if($errors->has('post_image'))
                            <p style="color: red">{{ $errors->first('post_image') }}</p>
                        @endif
                    </div>



                    <button type="submit" class="btn-primary">ثبت </button>
                </form>


        </div>
    </div>



@endsection
