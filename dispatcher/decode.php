<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("location: index.php");
    die();
}

require "vendor/autoload.php";
$qrcode = new QrReader($_FILES['qrimage']['tmp_name']);
$text = $qrcode->text();
$_SESSION['valued']=$text;
header("Location:forward-file.php");
?>