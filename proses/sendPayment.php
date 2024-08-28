<?php
require '../koneksi.php';
session_start();

$idcust = $_POST['idcust'];
$status = $_POST['status'];
$string1 = $idcust;
$pattern = '/<input(?:.*?)value=\"([^"]+).*>/i';
preg_match($pattern, $string1, $matches);
$id_bayar = $matches[1];
// var_dump( $matches[1] );
// echo $matches[1];


$query = mysqli_query($conn, "UPDATE erp_payment SET status_bayar = '$status' WHERE id_bayar = '$id_bayar'");
if(mysqli_affected_rows($conn) > 0 ) {
    $_SESSION["sukses"] = 'Pembayaran Berhasil Dikirim';
    header('Location: ../?page=payment');
}else{
    $_SESSION["gagal"] = 'Gagal';
    header('Location: ../?page=payment');
}



