<?php 
require '../vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;

$data = $_GET["data"];
$qrCode = QrCode::create($data);
$writer = new PngWriter;
$result = $writer->write($qrCode);
header("Content-Type: " . $result->getMimeType());
$result->saveToFile("qrCode/".$data.".png");
header('Location: listproduit.php');
?>