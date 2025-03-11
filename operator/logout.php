<?php
session_start();

$_SESSION["dataOperator"] = "";
$_SESSION["statusOperator"] = "";
unset($_SESSION);

session_destroy();
session_unset();

header("location: login.php");
