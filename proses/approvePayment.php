<?php
require '../koneksi.php';
session_start();

$id_bayar = $_POST['id_bayar'];
$status = $_POST['status'];
$string1 = $id_bayar;
$pattern = '/<input(?:.*?)value=\"([^"]+).*>/i';
preg_match($pattern, $string1, $matches);
$idbayar = $matches[1];


$query = mysqli_query($conn, "UPDATE erp_payment SET status_bayar = '$status' WHERE id_bayar = '$idbayar'");
if(mysqli_affected_rows($conn) > 0 ) {
    $_SESSION["sukses"] = 'Pembayaran Berhasil di Approve';
    header('Location: ../?page=reportPayment');
}else{
    $_SESSION["gagal"] = 'Pembayaran Gagal';
    header('Location: ../?page=reportPayment');
}

echo $idbayar;