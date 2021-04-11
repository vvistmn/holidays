<?php ob_start();?>
<?php session_start();?>
<?php  include '_functions.php';?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Отпуск</title>
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Главная</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <?php if (empty($_SESSION['AUTH']['email'])):?>
                <li class="nav-item">
                    <a class="nav-link" href="registration.php">Регистрация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Войти в систему</a>
                </li>
            <?php endif;
            if (isset($_SESSION['AUTH']['is_admin'])):?>
                <li class="nav-item">
                    <a class="nav-link" href="admin/index.php">Администрация</a>
                </li>
            <?php endif;
            if (isset($_SESSION['AUTH']['email'])):?>
                <li class="nav-item">
                    <a class="nav-link" href="add_date.php">Выбрать дату для отпустка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Выйти из системы</a>
                </li>
            <?php endif;?>
            </ul>
        </div>
        </nav>
    </div>