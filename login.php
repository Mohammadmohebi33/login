<?php
session_start() ;
$config = mysqli_connect("localhost" , "root" , ""   , "login") ;



if ($_COOKIE["user_remained"]  &&  $_COOKIE["user_pass"]){

    $sql1="SELECT * FROM user WHERE name ='$_COOKIE[user_remained]'" ;
    $row1=mysqli_query($config,$sql1);
    $res1=mysqli_fetch_array($row1);

    if($res1['pass']==sha1($_COOKIE['user_pass'])){
        $_SESSION['name']=$res1['name'];
        header("location:welcome.php");
    }


}



if (isset($_POST['btn'])){
 $name  = $_POST['username']  ;
 $pass = $_POST['password']   ;

 $query = "SELECT * FROM user WHERE name  = '$name' " ;
 $row = mysqli_query($config , $query)  ;

 $res  =  mysqli_fetch_assoc($row) ;
 //var_dump($res);
    if (isset($_POST['remember'])){

    setcookie("user_remained" , $name , time() + 60 ) ;
    setcookie("user_pass" , $pass , time() + 60 ) ;

    }

    if ($res['pass'] == sha1($pass)){
       $_SESSION['name'] = $res['name'] ;
       header("location:welcome.php");
    }
    else{
        header("location:login.php?login=error");
    }



}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="logo">
    <i class="fa fa-unlock" aria-hidden="true"></i>
    ضمن عرض خوش آمد گویی ، لطفا برای دسترسی به بخش مدیریت از فرم زیر استفاده نمایید
</div>
<form method="post" class="mainfrm">
    <div class="lable">
        نام کاربری شما
    </div>
    <div class="frmrow">
        <i class="fa fa-user" aria-hidden="true"></i>
        <input type="text" name="username"/>
    </div>
    <div class="lable">
        کلمه عبور
    </div>
    <div class="frmrow">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" name="password"/>
    </div>
    <div class="frmrow1">
        <input type="checkbox" name="remember" />
مرا به خاطر بسپار
    </div>
    <div class="frmrow1">
        <input type="submit" value="ورود" name="btn" class="login"/>
    </div>
    <div class="frmrow1">

        <?php if(isset($_GET['login'])){
            if($_GET['login']=="error"){
                echo "<i class=\"fa fa-bullhorn\" aria-hidden=\"true\"></i><p class='alert'>نام کاربری یا کلمه عبور اشتباه است</p>";
            }
            else if($_GET['login']=="error1"){
                echo "<i class=\"fa fa-bullhorn\" aria-hidden=\"true\"></i><p class='alert'>لطفا ابتدا وارد شوید </p>";
            }
            else if($_GET['login']=="logout"){
                echo "<i class=\"fa fa-bullhorn\" aria-hidden=\"true\"></i><p class='alert'>خروج با موفقیت انجام شد</p>";
            }
        } ?>

    </div>
</form>

</body>
</html>