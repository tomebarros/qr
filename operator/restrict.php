<?php
session_start();
if (!$_SESSION["statusOperator"]) {
    header("location: login.php");
    die;
}
