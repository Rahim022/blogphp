<?php
session_start();
include("./include/config.php");
include("./include/db.php");
if (isset($_POST['login'])) {
    
    if (trim($_POST['codemeli']) != "" || trim($_POST['password']) != "") {

        $codemeli = $_POST['codemeli'];
        $password = $_POST['password'];
        $db = new Database();
        $conn = $db->getConnection();
        $user_select = $conn->prepare("SELECT * FROM users WHERE codemeli=:codemeli AND password=:password ");
        $user_select->execute(['codemeli' => $codemeli, 'password' => $password]);

        if ($user_select->rowCount() == 1) {
            $_SESSION['codemeli'] = $codemeli;
            header("Location:index.php");
            exit();
        }
    } else {
        header("Location:signin.php?err_msg= فیلد ها ایمیل و پسورد الزامی هست");
        exit();
    }
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

    <title>Blog Login</title>
</head>

<body>
    <div class="container">

        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="card bg-dark">
                <?php
                if (isset($_GET['err_msg'])) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['err_msg'] ?>
                    </div>
                <?php
                }
                ?>
                <h3 class="text-white text-center pt-3">ورود</h2>
                    <div class="card-body" style="width: 400px">
                        <form method="POST">
                            <div class="form-group">
                                <label class="text-white" for="codemeliphone">کد ملی </label>
                                <input type="number" class="form-control" name="codemeli" id="codemeli" placeholder="کد ملی خود را وارد کنید.">
                            </div>
                            <div class="form-group">
                                <label class="text-white" for="password">رمز عبور</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="پسورد خود را وارد کنید.">
                            </div>

                            <button type="submit" name="login" class="btn btn-outline-primary btn-block">ورود</button>
                        </form>
                    </div>

            </div>
        </div>
    </div>
</body>