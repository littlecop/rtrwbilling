<?php
require '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
$waktusekarang = date("d-m-Y H:i:s");
$nama = $_POST['nama'];
$created_at = $_POST['created_at'];
$username = strtolower($_POST['username']);
$password = hash('sha256', $_POST['password']);
$passwordconfirm = hash('sha256', $_POST['passwordconfirm']);
$defaultKategori = "0d470101-2997-11ef-a632-9009dfabca9c";
$role = $_POST['role'];
$active = 1;
$date = date("Yhis");
$uuid = md5(uniqid(rand(), true));
$uniq = "$date-$uuid";





// cek username
$queryUsername = mysqli_query($conn, "SELECT * FROM erp_user WHERE username = '$username'");
if(mysqli_fetch_assoc($queryUsername)) {
    $_SESSION['gagal'] = "Username sudah terdaftar";
    header('Location: ../register.php');
    die();
}


// untuk cek konfirmasi password
if($password != $passwordconfirm) {
    $_SESSION['gagal'] = "Konfirmasi Password Tidak Sesuai";
    header('Location: ../register.php');
    die();
}

$queryInsert = mysqli_query($conn, "INSERT INTO erp_user VALUES ('$uniq', '$nama','$username','$password','$role','$created_at','','$active')");
$insertCustomer = mysqli_query($conn, "INSERT INTO erp_customer VALUES (UUID(),'$uniq','$nama','','$defaultKategori','','$waktusekarang','','')");
if(mysqli_affected_rows($conn) > 0 ) {
    $_SESSION['ok'] = "Registrasi Berhasil";
    header('Location: ../login.php');
}else {
    $_SESSION['gagal'] = "Registrasi Gagal";
    header('Location: ../register.php');
}


