<?php
require '../koneksi.php';
setlocale(LC_ALL, 'id_ID');
session_start();
date_default_timezone_set('Asia/Jakarta');
$waktusekarang = date("d-m-Y H:i:s");

$username = $_POST['username'];
$nama = $_POST['nama'];
$id_user = $_POST['id_user'];
$harga_paket_kategori = $_POST['harga_paket_kategori'];
$paket = $_POST['paket'];
$periode_tagihan = $_POST['periode_tagihan'];
$newPeriodeTagihan = date('d-m-Y', strtotime($periode_tagihan));
$bulanTagihan = date('m', strtotime($periode_tagihan));
$tahunTagihan = date('Y', strtotime($periode_tagihan));
$bayar = $_POST['bayar'];
$metode_bayar = $_POST['metode_bayar'];
$note = $_POST['note'];
$status_bayar = $_POST['status_bayar'];
$created_at = $_POST['created_at'];
$harga_paket = $_POST['harga_paket'];
$kurangBayar = $harga_paket - $bayar;

if($bayar < $harga_paket) {
    $_SESSION["gagal"] = 'Nominal yang dibayarkan kurang';
    header('Location: ../?page=payment');
    die();
}
$query = mysqli_query($conn, "INSERT INTO erp_payment VALUES (UUID(),'$id_user','$nama','$paket','$newPeriodeTagihan','$bulanTagihan','$tahunTagihan','$harga_paket_kategori','$bayar','$metode_bayar','$note','$created_at','$status_bayar')");
if(mysqli_affected_rows($conn) > 0 ) {
    $_SESSION["sukses"] = 'Pembayaran berhasil dibuat';
    header('Location: ../?page=payment');
}else {
    $_SESSION["gagal"] = 'Pembayaran gagal dibuat';
    header('Location: ../?page=payment');
}
?>