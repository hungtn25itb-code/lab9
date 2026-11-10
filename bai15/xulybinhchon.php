<?php
require_once './config.php';

if (!isset($_GET['idPA'])) {
    die('Vui lòng chọn một phương án.');
}

$idPA = (int) $_GET['idPA'];

$qr1 = "UPDATE binhchon SET SoLanChon = SoLanChon + 1 WHERE idBC = 1";
$qr = "UPDATE phuongan SET SoLanChon = SoLanChon + 1 WHERE idBC = 1 AND idPA = $idPA";

if (mysqli_query($config, $qr1) && mysqli_query($config, $qr)) {
    header('Location: ketquabinhchon.php');
    exit;
} else {
    echo 'Thất bại!';
}
?>
