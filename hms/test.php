<?php// include QR_BarCode class 
include_once('include/QR_BarCode.php'); 

// QR_BarCode object 
$qr = new QR_BarCode(); 

// create text QR code 
$qr->url('http://techbloghunting.com'); 

// display QR code image
$qr->qrCode();
?>