<?php
include "restrict.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembaca QR Code</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>

    <style>
        .d-none {
            display: none;
        }
    </style>
</head>

<body>
    <h1>Scan QR Code</h1>
    <div id="reader" style="width: 300px;"></div>

    <form action="validasiqr.php" method="post" id="form" class="d-none">
        <input type="hidden" name="qr" id="result">
        <button type="submit">Cek</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof Html5Qrcode === "undefined") {
                console.error("Library html5-qrcode belum dimuat!");
                return;
            }

            let lastScanTime = 0;
            const delay = 500; // 3 detik sebelum menyembunyikan form

            function onScanSuccess(decodedText) {
                document.getElementById('form').classList.remove('d-none');
                document.getElementById('result').value = decodedText;
                lastScanTime = Date.now();
            }

            function checkTimeout() {
                if (Date.now() - lastScanTime >= delay) {
                    document.getElementById('form').classList.add('d-none');
                }
            }

            setInterval(checkTimeout, 1000); // Cek setiap 1 detik

            let html5QrCode = new Html5Qrcode("reader");

            Html5Qrcode.getCameras().then(cameras => {
                if (cameras.length > 0) {
                    html5QrCode.start(
                        cameras[0].id, {
                            fps: 10,
                            qrbox: 250
                        },
                        onScanSuccess
                    );
                }
            }).catch(err => {
                console.error("Tidak dapat mengakses kamera: ", err);
            });
        });
    </script>

</body>

</html>