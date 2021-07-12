@extends('layouts.welcome')


@section('content')

    <h1>ثبت کاربر جدید :</h1>


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



        <button type="submit" class="btn-primary">ثبت </button>
    </form>

@endsection
