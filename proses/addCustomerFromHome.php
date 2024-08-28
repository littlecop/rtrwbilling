<?php
require '../koneksi.php';
session_start();

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$active = $_POST['active'];
$kategori = "0d470101-2997-11ef-a632-9009dfabca9c";


$query = mysqli_query($conn, "UPDATE erp_customer SET nama='$nama',alamat='$alamat',kategori='$kategori',status_berlangganan='$active' WHERE id_user = '$id_user'");
if(mysqli_affected_rows($conn) > 0 ) {
    $_SESSION["sukses"] = 'Data Berhasil Disimpan';
    header('Location: ../?page=home');
}else {
    $_SESSION["gagal"] = 'Data Gagal Disimpan';
    header('Location: ../?page=home');
}