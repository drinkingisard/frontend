<?php
header('Content-Type: text/html; charset=utf-8');
$mysqli = mysqli_connect("localhost", "fbevljpt_0667", "Frontend2022", "fbevljpt_0667");
if ($mysqli == false) {
    print("error");
} else {
   
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$email =trim(mb_strtolower($_POST["email"])); //mb strtlower почта в нижнем регистре
$pass = trim($_POST["pass"]);
$pass = password_hash($pass, PASSWORD_DEFAULT);

$result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
if ($result->num_rows != 0) {
    print("exist");
} else {
    $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
    print("ok");
}
// echo var_dump($result->num_rows);
}
