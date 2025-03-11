<?php
include "restrict.php";
include "../config/functions.php";

if (!isset($_POST['qr']) || empty($_POST['qr'])) {
    header("location: index.php");
    die;
}
$kodeQR = input($_POST['qr']);
$dataKendaraan = query("SELECT * FROM kendaraan, jeniskendaraan WHERE kendaraan.idjeniskendaraan = jeniskendaraan.idjeniskendaraan AND kendaraan.kodeqr = '$kodeQR'");

$validQr = false;
if (count($dataKendaraan) > 0) {
    $kendaraan = $dataKendaraan[0];
    $validQr = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek QR</title>
</head>

<body>


    <?php if ($validQr) {
    ?>
        <ul>
            <li>Jenis Kendaraan : <?= $kendaraan['jeniskendaraan']; ?></li>
            <li>Nama Sopir : <?= $kendaraan['namasopir']; ?></li>
            <li>Plat Nomor : <?= $kendaraan['platnomor']; ?></li>
            <li>
                <form action="tambahtransaksi.php" method="post">
                    <input type="hidden" name="qr" value="<?= $kodeQR ?>">
                    <button type="submit">Proses</button>
                </form>
                 | <a href="index.php">Kembali</a>
            </li>
        </ul>
    <?php } else { ?>
        <ul>
            <li>QR tidak valid</li>
            <li><a href="index.php">Kembali</a></li>
        </ul>

    <?php } ?>
</body>

</html>