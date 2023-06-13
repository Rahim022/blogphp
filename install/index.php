<?php
include_once 'install.php';

if(isset($_POST['create']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $database-> createdb();
    $database-> createtbusers();
    $database-> createtbcategories();
    $da tabase-> createtbinsertcat();
    $database-> createtbcomments();
    $database-> createtbpost();
    $database-> createtbsubscribers();
    $database-> createkey3();
    $database-> createkey5();
	$database-> createfkey1();
	$database-> createfkey2();
}
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
	<title>create database and install</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link href="../assets/css/style.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
body{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
	background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
}

.signup{
	position: relative;
	width:100%;
	height: 100%;
}

input{
	width: 60%;
	height: 20px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 10px;
	border: none;
	outline: none;
	border-radius: 5px;
}
.button{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #fff;
	background: #573b8a;
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;
}
.button:hover{
	background: #6d44b8;
}


</style>
</head>
<body>	
	<div class="signup">
        <form method='POST' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>">
                <input class="button" type="submit" value="ساخت DataBase" name='create'>
        </form>
	</div>
</body>
</html>