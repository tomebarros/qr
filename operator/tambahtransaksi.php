<?php
include "restrict.php";
include "../config/functions.php";


$kodeQr = input($_POST['qr']);
$dataKendaraan = query("SELECT * FROM kendaraan, jeniskendaraan WHERE kendaraan.idjeniskendaraan = jeniskendaraan.idjeniskendaraan AND kendaraan.kodeqr = '$kodeQr'")[0];

$saldo = $dataKendaraan['saldo'];
$harga = $dataKendaraan['harga'];
$idkendaraan = $dataKendaraan['idkendaraan'];

if ($saldo < $harga) {
    echo "<script>
        alert('Saldo User Tidak Cukup!!');
        document.location.href = 'index.php';
    </script>";
    die;
}

mysqli_query($koneksi, "INSERT INTO transaksi(idkendaraan, harga) VALUE('$idkendaraan', '$harga')");

echo "<script>
        alert('Transaksi Berhasil di Buat');
        document.location.href = 'index.php';
    </script>";
