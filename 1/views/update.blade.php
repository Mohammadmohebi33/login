

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container border p-4 mt-4">

    <div class="row">
        <div class="col-md-12">
            <h3 class="p-4">ویرایش اطلاعات</h3>
            <hr />
        </div>
    </div>


    @foreach($data_id as $data)


    <form method="post" action="/edit/{{$data->id}}'">
        @csrf
        @method('patch')


        <div class="form-row">
            <div class="form-group col-md-6">
                <label>نام</label>
                <input type="text" class="form-control" value={{$data->name}} name="name">
                @if($errors->has('name'))
                    <p style="color: red">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label>نام خانوادگی</label>
                <input type="text" class="form-control" value={{$data->family}} name="family">
                @if($errors->has('family'))
                    <p style="color: red">{{ $errors->first('family') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label>ایمیل</label>
            <input type="email" class="form-control" value={{$data->email}} name="email">
            @if($errors->has('email'))
                <p style="color: red">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>شماره</label>
            <input type="number" class="form-control" value={{$data->number}} name="number">
            @if($errors->has('number'))
                <p style="color: red">{{ $errors->first('number') }}</p>
            @endif
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>آدرس</label>
                <textarea class="form-control" rows="5"  name="addres">{{$data->addres}}</textarea>
                @if($errors->has('addres'))
                    <p style="color: red">{{ $errors->first('addres') }}</p>
                @endif

            </div>
        </div>





        <button type="submit" class="btn btn-warning" name="btn_up">ویرایش</button>
        @endforeach



    </form>


</div>




</body>
</html>

