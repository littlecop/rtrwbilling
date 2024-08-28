<?php
require '../koneksi.php';
session_start();

$idcust = $_POST['id_customer']; 
$kategori = $_POST['kategori'];
$alamat = $_POST['alamat'];
$nama = $_POST['nama'];
$query = mysqli_query($conn, "SELECT erp_customer.id_customer as id,erp_customer.nama as nama,erp_kategori_customer.kategori as kategori, erp_kategori_customer.harga as harga FROM erp_customer JOIN erp_kategori_customer ON erp_customer.kategori = erp_kategori_customer.id_kategori WHERE erp_customer.id_customer = '$idcust'");
$cust = mysqli_fetch_assoc($query);
$hargaLama = $cust['harga'];

$queryHarga = mysqli_query($conn, "SELECT * FROM erp_kategori_customer WHERE id_kategori = '$kategori'");
$getHarga = mysqli_fetch_assoc($queryHarga);
$harga = $getHarga['harga'];

$queryUpdate = mysqli_query($conn, "UPDATE erp_customer SET nama='$nama',alamat='$alamat',kategori='$kategori',harga_paket_kategori='$harga' WHERE id_customer='$idcust'");
if(mysqli_affected_rows($conn) > 0 ) {
    $_SESSION['sukses'] = "Data diubah";
    header('Location: ../?page=customer');
    die();
}else{
    $_SESSION['gagal'] = "Gagal/Tidak ada data yang berubah";
    header('Location: ../?page=customer');
    die();
}


?>
id cust : <?= $idcust; ?> <br>
nama : <?= $nama; ?> <br>
alamat : <?= $alamat; ?> <br>
id kategori : <?= $kategori; ?> <br>
harga lama : <?= $hargaLama; ?> <br>
harga baru : <?= $harga; ?> <br>

