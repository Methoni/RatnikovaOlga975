<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$mysqli = mysqli_connect("localhost", "kqblhpxa_0975", "12345", "kqblhpxa_0975");
if ($mysqli == false) {
    print("error");
  } else {
    
$email = trim(mb_strtolower($_POST["email"]));
$pass = trim($_POST["pass"]);

$result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
$result = $result->fetch_assoc();

if (password_verify($pass, $result["pass"])) {
// $pass - то, что ввёл пользователь, $result["pass"] - то, что хранится зашифрованное в БД
// echo "Успех!";
echo "ok";
$_SESSION["name"] = $result["name"];
$_SESSION["lastname"] = $result["lastname"];
$_SESSION["email"] = $result["email"];
$_SESSION["id"] = $result["id"];
// Обращение к массиву session, в [] указан ключ, который придумываем сами
} else {
    // echo "Нет такого пользователя!";
    echo "not_found";
}
// var_dump($result["pass"]);
}