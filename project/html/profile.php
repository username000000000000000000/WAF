<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Масалов Н. А.</title>
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container nav_bar">
        <div class="row">
            <div class="row">
                <div class="col-3 nav_logo"></div>
                <div class="col-9">
                    <div class="nav_text">Инфа обо мне!</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Я, Масалов Николай, гражданин Российской Федерации, обучаюсь в Дальневосточном Государственном университете в 
                    институте математических и компьютерных технологий на специальности "Компьтерная безопасность" в 
                    группе С9122-10.05.01бкс. Стараюсь развиваться в направлении специальности. Также нахожу время на отдых и 
                    занятие спортом. Надеюсь, Вам понравился сайт!
                </h2>
            </div>
            <div class="col-6">
                <div class="row my_photo"></div>
                <div class="row title_photo"><p>Масалов Н. А.</p></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 char">
                <h1>Мои качества</h1>
            </div>
        </div>
        <div class="row chars">
            <div class="col-4">
                <div class="row">Целеустремлённость</div>
            </div>
            <div class="col-4">
                <div class="row">Пунктуальность</div>
            </div>
            <div class="col-4">
                <div class="row">Отвественность</div>
            </div>
        </div>
        
    </div>
    <div class="container">
        <div class="row">
            <div class="button_js col-12">
                <button id="myButton">Click me</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>
    <div class="container for_pub">
        <div class="row">
            <div class="col-12">
                
                <form method="POST" action="profile.php" class="pub" enctype="multipart/form-data" name="upload">
                    <h1 class="hello">
                        Привет, <?php echo $_COOKIE['User'];?>
                    </h1>
                    <input type="text" class="form in_pub" name="title" placeholder="Заголовок вашего поста">
                    <textarea class="text_pub form" name="text" cols="30" rows="10" placeholder="Введите текст вашего поста..."></textarea>
                    <input type="file" name="file" class="btn__post"/><br>
                    <button class="btn__post" type="submit" name="submit">Сохранить пост!</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/button.js"></script>
</body>
</html>
<?php
require_once('db.php');
$link = mysqli_connect('db', 'root', 'masalov', 'first');
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];
    if (!$title || !$main_text) die ("Заполните все поля");
    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }

}


?>
