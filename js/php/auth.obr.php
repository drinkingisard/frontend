<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$mysqli = mysqli_connect("localhost", "fbevljpt_0667", "Frontend2022", "fbevljpt_0667");
if ($mysqli == false) {
    print("error");
} else {

$email = trim(mb_strtolower($_POST["email"]));
$pass = trim($_POST["pass"]);

$result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
$result = $result->fetch_assoc();

if (password_verify($pass, $result["pass"])) {
    echo "autorised";
    $_SESSION["name"] = $result["name"];
    $_SESSION["lastname"] = $result["lastname"];
    $_SESSION["email"] = $result["email"];
    $_SESSION["id"] = $result["id"];    
} else {
    echo "user does not exist";
}
}