<?php
$conn = mysqli_connect("localhost","root","","erp");
//variabel nim yang dikirimkan form.php
$id_customer = $_GET['id_customer'];

//mengambil data
$query = mysqli_query($conn, "SELECT erp_customer.id_user as id_user,erp_customer.id_customer as id_customer, erp_customer.harga_paket_kategori as harga_paket_kategori,erp_customer.nama as nama,erp_kategori_customer.kategori as kategori FROM erp_customer JOIN erp_kategori_customer ON erp_customer.kategori = erp_kategori_customer.id_kategori WHERE id_customer='$id_customer'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'id_user'      =>  @$mahasiswa['id_user'],
            'paket'      =>  @$mahasiswa['paket'],
            'harga_paket_kategori'      =>  @$mahasiswa['harga_paket_kategori'],
            'nama'      =>  @$mahasiswa['nama'],
            'kategori'      =>  @$mahasiswa['kategori'],
            // 'jeniskelamin'      =>  @$mahasiswa['jeniskelamin'],
            // 'jurusan'   =>  @$mahasiswa['jurusan'],
            // 'notelp'      =>  @$mahasiswa['notelp'],
            // 'email'      =>  @$mahasiswa['email'],
            // 'alamat'    =>  @$mahasiswa['alamat'],
            );

//tampil data
echo json_encode($data);
?>