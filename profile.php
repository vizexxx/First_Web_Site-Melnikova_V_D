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
                <p style="color:rgb(109, 91, 228); text-align: center;font-family: Rubik Bubbles; font-size: 43px;margin-bottom: 0px;margin-top: 0px;">
                    Котята:
                </p>
                <p style="color:rgb(109, 91, 228); text-align: center;font-family: Comfortaa; font-size: 23px;margin-top: 0px; margin-left: 120px;margin-bottom: 0px;">
                    ваши пушистые друзья
                </p>
            </dev>
        </div>
        <div class="row">
            <dev class="col-8">
                <p style="color:rgb(121, 102, 242);font-family: Comfortaa;margin-bottom: 0px">Добро пожаловать в мир котят!</p>
                    <p style="color:rgb(121, 102, 242);font-family: Comfortaa;margin-top: 0px;">Здесь вы найдете все, что нужно знать о милых пушистиках:</p>
                    <p style="color:rgb(121, 102, 242);font-family: Comfortaa;margin-top: 0px;margin-left: 30px;">- советы по уходу;</p> 
                    <p style="color:rgb(121, 102, 242);font-family: Comfortaa;margin-left: 30px;">- интересные факты;</p>
                    <p style="color:rgb(121, 102, 242);font-family: Comfortaa;margin-left: 30px;">- истории о воспитании.</p> 
                    <p style="color:rgb(121, 102, 242);font-family: Comfortaa;margin-bottom: 10px;">Погрузитесь в их увлекательный мир и узнайте, как сделать их жизнь комфортной и счастливой. Котята — это радость и уют, и мы поможем вам стать идеальным хозяином!</p>
            </dev>
        </div>
        <div class="row">
            <dev class="col-4">
                <dev class="container" style="padding-left: 30px;">
                    <img src="photos/first.jpg" style="height: 300px;margin-right: 10px;">
                    <img src="photos/second.jpg" style="height: 300px;margin-right: 10px;">
                    <img src="photos/third.jpg" style="height: 300px;margin-right: 10px;">
                    <img src="photos/video.gif" style="height: 300px">
                </dev>
            </dev>
        </div>
        <div class="row">
            <dev class="col-2">
                <p style="color:rgb(121, 102, 242); text-align: center; font-family: Comfortaa;margin-top: 5px;margin-bottom: 0px;">Сайт выполнила: Мельникова Валерия Дмитриевна</p>
            </dev>
        </div>

        <div class="container">
            <div class="row">
                <div class="button_js col-12">
                    <button id="myButton" style="text-align: center;">Тыкни  на меня и пролистни вниз</button>
                    <p id="image" style="margin-top: 5px; margin-bottom: 30px;"></p>
                </div>
            </div>
        </div>

	<div class="container">
		<div class="row">
			<dev class="col-8">
				<p style="color:rgb(109, 91, 228); text-align: center;font-family: Comfortaa; font-size: 35px;margin-bottom: 10px;margin-top: 0px;">Добро пожаловать, <?php echo $_COOKIE['User'];?>!</p>
			</dev>
                	<dev class="col-8">
                		<form method="POST" action="/profile.php" style="display: grid;place-items: center;" enctype="multipart/form-data" name="upload">
                        		<input class="form" type="text" name="title" placeholder="Заголовок поста" style="margin-bottom: 10px;width:600px">
                         		<textarea name="text" cols="30" rows="10" placeholder="Введите содержание поста..." style="margin-bottom: 10px;width: 600px;height:400px;"></textarea>
					<input style="margin-bottom: 10px;" type="file" name="file" />
                         		<button type="submit" class="btn_red btn_reg" name="submit" style="width: 150px;border-radius: 15px;font-family: Comfortaa;background-color: rgb(162, 149, 249);color: rgb(255,255,255)">Сохранить пост</button>
                    		</form>
			</dev>
                </div>
	</div>

</div>
<script type="text/javascript" src="javascript/button.js"></script>
</body>
</html>
<?php
require_once('db.php');
$link = mysqli_connect('10.10.0.3', 'root', 'qwerty123', 'first');
if (isset($_POST['submit'])) {
	$title = strip_tags($_POST['title']);
    	$main_text = strip_tags($_POST['text']);
	$title = mysqli_real_escape_string($link, $title);
	$main_text = mysqli_real_escape_string($link, $main_text);
	if (!$title || !$main_text) die("Заполните все поля");
    	$title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    	$main_text = htmlspecialchars($main_text, ENT_QUOTES, 'UTF-8');
if(!empty($_FILES["file"]))
    	{
		$errors = [];
        	$allowedTypes = ['image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg', 'image/x-png', 'image/png'];
        	$maxFileSize = 102400;

        	if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
				$sql = "INSERT INTO posts (title, main_text, img_path) VALUES ('$title', '$main_text', '')";
                if (!mysqli_query($link, $sql)) die("Не удалось добавить пост");
        	}

        	$realFileSize = filesize($_FILES['file']['tmp_name']);
        	if ($realFileSize > $maxFileSize) {
            		$errors[] = 'Файл слишком большой.';
        	}

        	$fileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']);
        	if (!in_array($fileType, $allowedTypes)) {
            		$errors[] = 'Недопустимый тип файла.';
        	}

        	if (empty($errors)) {
            		$tempPath = $_FILES['file']['tmp_name'];
            		$destinationPath = 'upload/' . uniqid() . '_' . basename($_FILES['file']['name']);
            		if (move_uploaded_file($tempPath, $destinationPath)) {
				$sql = "INSERT INTO images (path) VALUES ('$destinationPath')";
				if (!mysqli_query($link, $sql)) die("Не удалось добавить картинку");
				$sql = "INSERT INTO posts (title, main_text, img_path) VALUES ('$title', '$main_text', '$destinationPath')";
			        if (!mysqli_query($link, $sql)) die("Не удалось добавить пост");

                		echo "Файл загружен успешно: " . $destinationPath;
            		} else {
                		$errors[] = 'Не удалось переместить загруженный файл.';
            		}
        	} else {
            		foreach ($errors as $error) {
                		echo $error . '<br>';
            		}
        	}

	}
}
?>
