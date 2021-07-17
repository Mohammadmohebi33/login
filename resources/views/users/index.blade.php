@extends('layouts.welcome')

@section('content')


    <h1>لیست کاربران</h1>
    <br>


    <table class="table  table-hover">
        <thead>
        <tr >
            <th>شناسه</th>
            <th>نام</th>
            <th>ایمیل</th>

            <th>نقش</th>
            <th>تاریخ ثبت نام</th>
            <th>بروز رسانی</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users    as      $user)


            <tr>
                <th>{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>



                <td>
                    <ul>

                        @foreach($user->role as $role)

                            <li> {{$role->name}}</li>

                        @endforeach

                    </ul>
                </td>




                <td>{{\Hekmatinasser\Verta\Verta::instance($user->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::now())}}</td>


                <td>

                    <form method="get" action={{route('panel.edit'       ,   $user->id)}} >
                        @csrf


                        <button class="btn btn-warning">بروز رسانی</button>
                    </form>
                </td>


                <td>
                    <form method="post" action={{route('panel.destroy'  ,   $user->id)}} >
                        @csrf
                        @method('DELETE')


                        <button class="btn btn-danger">حذف کاربر</button>
                    </form>
                </td>
            </tr>


        @endforeach



        </tbody>
    </table>




@endsection

