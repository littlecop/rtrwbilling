<?php
require '../koneksi.php';
session_start();
$nama = $_POST['nama'];
$created_at = $_POST['created_at'];
$username = strtolower($_POST['username']);
$password = strtolower(hash('sha256', $_POST['password']));
$passwordconfirm = strtolower(hash('sha256', $_POST['passwordconfirm']));
$role = $_POST['role'];
$kategori = $_POST['kategori'];
$active = $_POST['active'];
$harga_paket_kategori = $_POST['harga_paket_kategori'];
$date = date("Yhis");
$uuid = md5(uniqid(rand(), true));
$uniq = "$date-$uuid";

echo $created_at;


// cek username
$queryUsername = mysqli_query($conn, "SELECT * FROM erp_user WHERE username = '$username'");
if(mysqli_fetch_assoc($queryUsername)) {
    $_SESSION['gagal'] = "Username sudah terdaftar";
    header('Location: ../?page=usrmngmnt');
    die();
}
// untuk cek konfirmasi password
if($password != $passwordconfirm) {
    $_SESSION['gagal'] = "Konfirmasi Password Tidak Sesuai";
    header('Location: ../?page=usrmngmnt');
    die();
}
$queryInsert = mysqli_query($conn, "INSERT INTO erp_user VALUES ('$uniq', '$nama','$username','$password','$role','$created_at','','$active')");
$queryInsertCust = mysqli_query($conn, "INSERT INTO erp_customer VALUES (UUID(), '$uniq','$nama','','$kategori','$harga_paket_kategori','$created_at','','$active')");
if(mysqli_affected_rows($conn) > 0 ) {
    $_SESSION['sukses'] = "Registrasi Berhasil";
    header('Location: ../?page=usrmngmnt');
}else {
    $_SESSION['gagal'] = "Registrasi Gagal";
    header('Location: ../?page=usrmngmnt');
}


