<?php
require '../koneksi.php';
session_start();

$idcust = $_POST['idcust'];
$akhir = $_POST['akhir'];
$status = $_POST['status'];
$string1 = $idcust;
$pattern = '/<input(?:.*?)value=\"([^"]+).*>/i';
preg_match($pattern, $string1, $matches);
$id_customer = $matches[1];
// var_dump( $matches[1] );
// echo $matches[1];


$query = mysqli_query($conn, "UPDATE erp_customer SET akhir = '$akhir', status_berlangganan = '$status' WHERE id_customer = '$id_customer'");
if(mysqli_affected_rows($conn) > 0 ) {
    $_SESSION["sukses"] = 'Customer Dinonaktifkan';
    header('Location: ../?page=customer');
}else{
    $_SESSION["gagal"] = 'Gagal';
    header('Location: ../?page=customer');
}



