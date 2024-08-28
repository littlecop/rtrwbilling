<?php
$conn = mysqli_connect("localhost","root","","erp");
//variabel nim yang dikirimkan form.php
$id_kategori = $_GET['id_kategori'];

//mengambil data
$query = mysqli_query($conn, "select * from erp_kategori_customer where id_kategori='$id_kategori'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'harga'      =>  @$mahasiswa['harga'],
            // 'jeniskelamin'      =>  @$mahasiswa['jeniskelamin'],
            // 'jurusan'   =>  @$mahasiswa['jurusan'],
            // 'notelp'      =>  @$mahasiswa['notelp'],
            // 'email'      =>  @$mahasiswa['email'],
            // 'alamat'    =>  @$mahasiswa['alamat'],
            );

//tampil data
echo json_encode($data);
?>