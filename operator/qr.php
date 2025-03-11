<?php
// include "restrict.php";
// include "../config/functions.php";
include "restrict.php";
// require '../vendor/autoload.php';
require __DIR__ . '/../vendor/autoload.php';


use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;

class QrCodeGenerator
{
    public static function generateQrCode($data, $labelText = '', $size = 300, $margin = 10)
    {
        $result = Builder::create()
            ->data($data)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size($size)
            ->margin($margin)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->labelText($labelText)
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->build();

        return $result->getString();
    }
}


$qrData = "hmw202jqk2kl";
$labelText = '';
$qrCodeImage = QrCodeGenerator::generateQrCode($qrData, $labelText, 150, 5);
?>

        <img class="qr" src="data:image/png;base64,<?php echo base64_encode($qrCodeImage); ?>" alt="QR Code">

        <a href="logout.php">logout</a>