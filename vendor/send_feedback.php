<?php
// запускаем сессии и файл подключения к БД
session_start();
require_once 'connect.php';

// заносим данные полей из формы в отдельные переменные и очищаем их
$name = mysqli_real_escape_string($connect, $_POST['name']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$message = mysqli_real_escape_string($connect, $_POST['message']);

// подготавливаем sql-запрос для вставки данных в БД
$sql = "INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `date`) VALUES (NULL, '$name', '$email', '$message', current_timestamp()) ";

// добавляем запись в БД
$res = mysqli_query($connect, $sql);

// если добавление прошло успешно выводим сообщение
if ($res) {
    $_SESSION['alert'] = "Спасибо, $name!";
}
else {
    die( mysql_error() );
}

