<?php
include("./include/config.php");
include("./include/db.php");

$user = new User();

if (isset($_POST['register']))
{ 
   $fname = $_POST['firstname'];
   $lname = test_input($_POST['lastname']);
   $codemeli = test_input($_POST['codemeli']);
   $phone = test_input($_POST['phone']);
   $password = test_input($_POST['password']);
   $password_confrim = test_input($_POST['password-confirm']);
    if ($password == $password_confrim) {
      if (empty ($_POST["firstname"])) {
         $errMsg = "<div class='alert alert-danger my-3'>نام خود را وارد نکردید</div>";
         echo $errMsg;
     }
     if (empty ($_POST["lastname"])) {
         $errMsg = "<div class='alert alert-danger my-3'>نام خانوادگی خود را وارد نکردید</div>";
                  echo $errMsg;
     }
     if (empty ($_POST["codemeli"])) {
         $errMsg = "<div class='alert alert-danger my-3'>کد ملی را وارد نکردید</div>";
                  echo $errMsg;
     }
     if (empty ($_POST["phone"])) {
         $errMsg = "<div class='alert alert-danger my-3'>شماره تلفن را وارد نکردید</div>";
                  echo $errMsg;
     }
     if (empty ($_POST["password"])) {
         $errMsg = "<div class='alert alert-danger my-3'>رمز عبور را وارد نکردید</div>";
                  echo $errMsg;
     } 
     if (empty ($_POST["password-confirm"])) {
         $errMsg = "<div class='alert alert-danger my-3'>تکرار رمز عبور را وارد نکردید</div>";
           echo $errMsg;
     }else{
         $user->registration($fname,$lname,$codemeli,$phone,$password);
         echo "registration success";
         header("location:/blog/index.php");
      }
}else {
   echo "<div class='alert alert-danger my-3'>رمز عبور و تکرار آن یکسان نیست</div>";
}
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }

?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/admin.css" />

    <title>Blog register</title>
    <style>
    .row1{
         margin-right:28%;
         margin-left:28%;
      }
    </style>
</head>
<body>

   <div class="row1">
         <form class = "form-horizontal bg-dark" role = "form" style="margin-top:30px;" method="post">
         
         <div class = "form-group">
            <label for = "firstname" class = "col-sm-2 control-label" style="color:white;">نام</label>
            
            <div class = "col-sm-12">
               <input type = "text" class = "form-control" id = "firstname" name="firstname" placeholder = "نام">
            </div>
         </div>
         
         <div class = "form-group">
            <label for = "lastname" class = "col-sm-2 control-label" style="color:white;"> نام خانوادگی</label>
            
            <div class = "col-sm-12">
               <input type = "text" class = "form-control" id = "lastname"  name="lastname" placeholder = " نام خانوداگی">
            </div>
         </div>
         <div class = "form-group">
            <label for = "codemeli" class = "col-sm-2 control-label" style="color:white;">کد ملی</label>
            
            <div class = "col-sm-12">
               <input type = "number" class = "form-control" id = "codemeli"   name="codemeli" placeholder = "  کدملی">
            </div>
         </div>
         <div class = "form-group">
            <label for = "phone" class = "col-sm-2 control-label" style="color:white;"> شماره تلفن</label>
            
            <div class = "col-sm-12">
               <input type = "number" class = "form-control" id = "phone"   name="phone" placeholder = "  شماره تلفن">
            </div>
         </div>
         <div class = "form-group">
            <label for = "password" class = "col-sm-2 control-label" style="color:white;">رمز عبور</label>
            
            <div class = "col-sm-12">
               <input type = "text" class = "form-control" id = "password"   name="password" placeholder = "رمز عبور">
            </div>
         </div>
         <div class = "form-group">
            <label for = "lastname" class = "col-sm-2 control-label" style="color:white;">تکرار رمز عبور</label>
            
            <div class = "col-sm-12">
               <input type = "text" class = "form-control" id = "password-confrim"   name="password-confirm" placeholder = "تکرار رمز عبور">
            </div>
         </div> 
         
         <div class = "form-group">
            <div class = "col-sm-offset-2 col-sm-4">
               <button type = "submit" class = "btn btn-default btn-primary" name="register"> ثبت نام</button>
            </div>
         </div>
      </form>
   </div>

</body>