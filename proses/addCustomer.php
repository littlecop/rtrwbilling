<?php
require '../koneksi.php';
session_start();

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kategori = $_POST['kategori'];
$awal = $_POST['awal'];
$status = $_POST['status'];

$query = mysqli_query($conn, "INSERT INTO erp_customer VALUES (UUID(), '$nama','$alamat','$kategori','','$awal','','$status')");
if(mysqli_affected_rows($conn) > 0 ) {
    $_SESSION["sukses"] = 'Data Berhasil Disimpan';
    header('Location: ../?page=customer');
}else {
    $_SESSION["gagal"] = 'Data Gagal Disimpan';
    header('Location: ../?page=customer');
}