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
            <dev class="col-12" style="color:rgb(121, 102, 242); text-align: center">
            <?php
                        if (!isset($_COOKIE['User'])) {
       ?>
				<h1 style="color:rgb(121, 102, 242); text-align: center;font-family: Rubik Bubbles">Авторизуйтесь</h1>
          <p style="color:rgb(121, 102, 242); text-align: center;font-family: Comfortaa;"> <a href="/registration.php" style="color:rgb(85,61,240);">Зарегистрируйтесь</a> или <a href="/login.php" style="color:rgb(85,61, 240);">войдите</a>, чтобы просматривать контент!</p>
       <?php
       } else {
		echo "<h1 style='color:rgb(121, 102, 242); text-align: center;font-family: Rubik Bubbles'>Ваши постики</h1>";
		$link = mysqli_connect('10.10.0.3', 'root', 'qwerty123', 'first');

		$sql = "SELECT * FROM posts";
		$res = mysqli_query($link, $sql);

		if (mysqli_num_rows($res) >  0) {
        	    while ($post = mysqli_fetch_array($res)) {
		                echo "<a href='/posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a>\n";
         		}
           	} else {
			echo "Записей пока нет";
           	}
		echo "<h1 style='color:rgb(121, 102, 242); text-align: center;font-family: Rubik Bubbles'>Ваши картиночки</h1>";
		$link = mysqli_connect('10.10.0.3', 'root', 'qwerty123', 'first');
                $sql = "SELECT * FROM images;";
                $res = mysqli_query($link, $sql);
                if (mysqli_num_rows($res) >  0) {
                    while ($image = mysqli_fetch_array($res)) {
                                echo "<a href='/images.php?id=" . $image["id"] . "'>" . $image['path'] . "</a>\n";
                        }
                } else {
                        echo "Картиночек пока нет";
                }

       }
	   ?>
            </dev>
        </div>
    </div>
</body>
</html>
