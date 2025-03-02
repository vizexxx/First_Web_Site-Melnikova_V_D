<?php
$servername = "10.10.0.3";
$username = "root";
$password = "qwerty123";
$dbName = "first";

$link = mysqli_connect($servername, $username, $password);
if (!$link) {
	die("Ошибка подключения: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

if (!mysqli_query($link, $sql)) {
	echo "Не удалось создать БД";
}

mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS users(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password VARCHAR(50) NOT NULL
)";

if(!mysqli_query($link, $sql)){
	echo "Не удалось создать таблицу Users";
}

$sql = "CREATE TABLE IF NOT EXISTS posts(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(20) NOT NULL,
	main_text VARCHAR(400) NOT NULL,
	img_path VARCHAR(400)
)";

if(!mysqli_query($link, $sql)){
	echo "He удалось создать таблицу posts";
}

$sql = "CREATE TABLE IF NOT EXISTS images(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        path VARCHAR(400) NOT NULL
)";

if(!mysqli_query($link, $sql)){
        echo "He удалось создать таблицу images";
}

mysqli_close($link);
?>
