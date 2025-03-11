<?php 
session_start();
include "../config/functions.php";

$email = input($_POST['email']);
$password = input($_POST['password']);

$row = query("SELECT * FROM operator WHERE email = '$email' AND password = '$password'");

if(count($row) > 0){
    $_SESSION['dataOpeator'] = $row[0];
    $_SESSION['statusOperator'] = true;
    header("location: index.php");
    die;
}

header("location: login.php");