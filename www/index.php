<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$fullURL = $_SERVER['REQUEST_URI'];


$code = str_replace("/", "", $fullURL);
$code = str_replace(".png", "", $code);

include_once('functions/phpqrcode/qrlib.php');
include_once('functions/get_mime_type.php');



$qr_save_file = "/var/www/html/temp/" . $code . ".png";
$mime_type = get_mime_type($qr_save_file);
$content_type = 'Content-Type:' . $mime_type;

QRcode::png($code, $qr_save_file, QR_ECLEVEL_L, 10);



header($content_type);
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
readfile($qr_save_file);

//echo $qr_save_file;