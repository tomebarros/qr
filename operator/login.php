<?php 
session_start();
if( isset($_SESSION['statusOperator']) && $_SESSION['statusOperator'] ){
    header("location: qr.php");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form action="ceklogin.php" method="post">
        <input type="email" name="email" required autofocus>
        <input type="password" name="password" required>
        <button type="submit">Kirim</button>
    </form>

</body>

</html>