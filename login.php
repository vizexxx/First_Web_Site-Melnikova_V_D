<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мельникова В.Д.</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: rgb(216, 213, 236);">
    <div class="container">
        <div class="row">
            <dev class="col-12">
                <p style="color:rgb(109, 91, 228); text-align: center;font-family: Rubik Bubbles; font-size: 43px;margin-bottom: 10px;margin-top: 0px;">Регистрация</p>
            </dev>
        </div>
                <div class="row">
                        <div class="col-12">
                                <form method="POST" action="/First_Web_Site-Melnikova_V_D/login.php" style="text-align: center;">
                                        <div class="row form＿reg" style="margin-bottom: 10px;"><input class="form" type="text" name="login" placeholder="Login" required></div>
                                        <div class="row form＿reg" style="margin-bottom: 20px;"><input class="form" type="password" name="password" placeholder="Password" required></div>
                                        <button type="submit" class="btn_red btn_reg" name="submit" style="width: 150px;border-radius: 15px;font-family: Comfortaa;background-color: rgb(162, 149, 249);color: rgb(255,255,255)">Продолжить</button>
                                </form>
                        </div>
                </div>
        </body>
</html>
<?php
if (isset($_COOKIE['User'])) {
    header("Location: /First_Web_Site-Melnikova_V_D/profile.php");
}
require_once('db.php');
$link = mysqli_connect('127.0.0.1', 'root', 'qwerty123', 'first');
if (isset($_POST['submit'])) {
        $username = $_POST['login'];
        $password = $_POST['password'];

        if (!$username || !$password) die('Пожалуйста введите все значения!');

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

		$result = mysqli_query($link, $sql);

		if (mysqli_num_rows($result) == 1) {
			setcookie("User", $username, time()+7200);
			header('Location: /First_Web_Site-Melnikova_V_D/profile.php');
		} else {
			echo "не правильное имя или пароль";
		}
}
?>
