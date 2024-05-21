<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Масалов Н. А.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="col-12">
        <form method="POST" action="registration.php">
        <div class="row reg_name"><h1>РЕГИСТРАЦИЯ</h1></div>
            <div class="row form__reg"><input type="email" class="form" name="email" placeholder="Email"></div>
            <div class="row form__reg"><input type="text" class="form" name="username" placeholder="Login"></div>
            <div class="row form__reg"><input type="password" class="form" name="password" placeholder="Password"></div>
            <button type="submit" class="btn_red btn__reg" name="submit">Продолжить</button>
        </form>
    </div>
    
</body>
</html>
<?php
    require_once('db.php');

    if (isset($_COOKIE['User'])) {
        header("Location: login.php");
    }

    $link = mysqli_connect('db', 'root', 'masalov', 'first');

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pass = $_POST['password'];

        if (!$email || !$username || !$pass) die ('Пожалуйста, введите все значения!');

        $sql = "INSERT INTO users (email, username, pass) VALUES ('$email', '$username', '$pass')";

        if(!mysqli_query($link, $sql)) {
            echo "Не удалось добавить пользователя";
        }

    }

    


?>
