@extends('layouts.welcome')


@section('content')

    <h1>مطالب</h1>
    <br>


    <table class="table  table-hover">
        <thead>
        <tr >
            <th>شناسه</th>
            <th>عنوان</th>
            <th>توضیحات</th>
            <th>عکس</th>

            <th>نام مستعار</th>
            <th>تاریخ ثبت نام</th>
            <th>بروز رسانی</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts    as      $post)


            <tr>
                <th>{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td><img src="/storage/post/{{$post->avatar}}" alt="" width="100px"></td>
                <td>{{$post->description}}</td>








                <td>{{\Hekmatinasser\Verta\Verta::instance($post->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::now())}}</td>


                <td>

                    <form method="get" action={{route('post.edit'  ,   $post->id)}} >
                        @csrf



                        <button class="btn btn-warning">بروز رسانی</button>
                    </form>
                </td>


                <td>
                    <form method="post" action={{route('post.destroy' ,   $post->id)}}>
                        @csrf
                        @method('DELETE')


                        <button class="btn btn-danger">حذف پست </button>
                    </form>
                </td>
            </tr>


        @endforeach



        </tbody>
    </table>

@endsection
