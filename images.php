<?php
$link = mysqli_connect('10.10.0.3', 'root', 'qwerty123', 'first');
$id = $_GET['id'];
$sql = "SELECT * FROM images WHERE id=$id";
$res = mysqli_query($link, $sql);

$rows = mysqli_fetch_array($res);
$image = $rows['path'];
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
        echo "<h1 style='color:rgb(121, 102, 242);font-family: Rubik Bubbles;'>$image</h1>";
        echo "<img src='" . $image . "' alt='' style='width: 500px;'>";
?>
</body>
</html>
