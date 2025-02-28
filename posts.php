<?php
$link = mysqli_connect('127.0.0.1', 'root', 'qwerty123', 'first');
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link, $sql);

$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мельникова В.Д.</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: rgb(216, 213, 236);">
<?php
	echo "<h1>$title</h1>";
	echo "<p>$main_text</p>";
?>
</body>
</html>
