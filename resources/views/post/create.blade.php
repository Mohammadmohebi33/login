
@extends('layouts.welcome')


@section('content')

    <h1>ثبت مطلب جدید :</h1>

    <div class="row">

        <div class="col-md-10 offset-md-1">


            <form   method="post"   action={{route('post.store')}}>
                @csrf

                <div class="form-group">
                    <label for="name">عنوان:</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="entet title">
                    @if($errors->has('title'))
                        <p style="color: red">{{ $errors->first('title') }}</p>
                    @endif
                </div>



                <div class="form-group">
                    <label for="slug">نام مستعار:</label>
                    <input type="text" name="slug" class="form-control" id="email" aria-describedby="" placeholder="entet title">
                    @if($errors->has('slug'))
                        <p style="color: red">{{ $errors->first('slug') }}</p>
                    @endif
                </div>





                <div class="form-group">
                    <label for="exampleFormControlSelect1">دسته بندی‌:</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="categores[]" multiple>

                        @foreach($categores as $categore)

                        <option value="{{$categore->id}}">{{$categore->title}}</option>

                        @endforeach

                    </select>
                    @if($errors->has('categores'))
                        <p style="color: red">{{ $errors->first('categores') }}</p>
                    @endif
                </div>






                    <label for="slug">توضیحات:</label>
                    <textarea class="form-control"  name="description" cols="50" rows="10">
                    </textarea>
                    @if($errors->has('description'))
                        <p style="color: red">{{ $errors->first('description') }}</p>
                    @endif




                <label for="slug"> متا توضیحات:</label>
                <textarea class="form-control"  name="meta_description" cols="50" rows="10">
                    </textarea>
                @if($errors->has('meta_description'))
                    <p style="color: red">{{ $errors->first('meta_description') }}</p>
                @endif





                <label for="slug">متا برچسب ها:</label>
                <textarea class="form-control"  name="meta_keywords" cols="50" rows="10">
                    </textarea>
                @if($errors->has('meta_keywords'))
                    <p style="color: red">{{ $errors->first('meta_keywords') }}</p>
                @endif





{{--                <div class="form-group">--}}
{{--                    <label for="title">تصویر اصلی</label>--}}
{{--                    <input type="file" name="post_image" class="form-control-file" id="post_image"  placeholder="entet title">--}}
{{--                    @if($errors->has('post_image'))--}}
{{--                        <p style="color: red">{{ $errors->first('post_image') }}</p>--}}
{{--                    @endif--}}
{{--                </div>--}}



                <button type="submit" class="btn-primary">ثبت </button>
            </form>


        </div>
    </div>



@endsection
