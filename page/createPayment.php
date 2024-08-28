<?php
    //jika bukan role admin & devloper maka di alihkan ke halaman home. direct halaman home ada di baris paling bawah
    $role = $_SESSION['id_role'];
    if($role == "94868ac6-258e-11ef-916f-9009dfabca9c" || $role == "a53ee18e-258e-11ef-916f-9009dfabca9c") {
?>
<div class="menu">
    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-money" aria-hidden="true"></i> Create Payment</button>
    <!-- <a href="" data-bs-toggle="modal" data-bs-target="#createPayment" class="link-menu">Create Payment</a>
    <a href="" class="link-menu badge bg-primary" data-bs-toggle="modal" data-bs-target="#setAktif"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Payment</a> -->
    <!-- <a href="" class="link-menu badge bg-danger" data-bs-toggle="modal" data-bs-target="#setNonaktif">Set Nonaktif</a> -->
</div>
<style>
    .dropdown-menu.show {
    display: block;
    width: 100% !important;
}
</style>
<link rel="stylesheet" href="./assets/dselect/dselect.scss">
  
  <div class="row">
    <div class="col">
    <form action="./proses/createPayment.php" method="post">
      <select class="form-select" id="id_customer" onchange="isi_otomatis()">
        
          <option>Pilih Customer</option>
              <?php
                  $queryKategori = mysqli_query($conn, "SELECT * FROM erp_customer WHERE status_berlangganan='1'");
                  while($kat = mysqli_fetch_assoc($queryKategori)) {
              ?>
                  <option value="<?= $kat['id_customer']; ?>"><?= $kat['nama']; ?></option>
              <?php } ?>
          </select>
          <br>
          <input type="hidden" name="id_user" id="id_user">
      <div class="row g-3">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Date</label>
            <input type="text" class="form-control form-control-sm" name="created_at" value="<?= $waktusekarang = date("d-m-Y H:i:s"); ?>" readonly>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Nama Cust</label>
            <input type="text" class="form-control form-control-sm" id="nama" name="nama" readonly>
        </div>
      </div>
      <br>
      <div class="row g-3">
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Paket</label>
            <input type="text" class="form-control form-control-sm" name="paket" id="kategori" readonly>
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Harga</label>
            <input type="text" class="form-control form-control-sm" name="harga" id="harga_paket_kategori" readonly>
        </div>
      </div>
      <br>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Rp</span>
          <input type="text" class="form-control form-control-sm" placeholder="masukkan jml bayar" aria-label="Username" name="bayar" aria-describedby="basic-addon1">
      </div>
      <div class="row g-3">
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Periode Tagihan</label>
            <input type="date" class="form-control form-control-sm" name="periode_tagihan">
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Metode Bayar</label>
                <select class="form-select form-select-sm" name="metode_bayar" aria-label=".form-select-sm example">
                        <option selected>Metode Pembayaran</option>
                            <?php
                                $queryMetodePembayaran = mysqli_query($conn, "SELECT * FROM erp_jenis_payment");
                                while($jenis = mysqli_fetch_assoc($queryMetodePembayaran)) {
                            ?>
                                <option value="<?= $jenis['id_jenis_payment']; ?>"><?= $jenis['jenis_payment']; ?></option>
                            <?php } ?>
                </select>
        </div>
      </div>
      <br>
      <div class="input-group">
        <span class="input-group-text">Note</span>
          <textarea class="form-control" name="note" aria-label="With textarea"></textarea>
      </div>
      <br>
      <div class="d-grid gap-2">
        <button class="btn btn-primary btn-sm" type="submit" name="status_bayar" value="1">Save Payment</button>
      </div>
    </div>
    <!--  -->
    <div class="col">
      2 of 2
    </div>
  </div>
  </form>
<script src="./assets/dselect/dselect.js"></script>
<script>
    var select_box_element = document.querySelector('#id_customer');
    dselect(select_box_element, {
        search: true
    });
</script>
<script type="text/javascript">
            function isi_otomatis(){
                var id_customer = $("#id_customer").val();
                $.ajax({
                    url: './page/autofillcustomer.php',
                    data:"id_customer="+id_customer ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#id_user').val(obj.id_user);
                    $('#harga_paket_kategori').val(obj.harga_paket_kategori);
                    $('#nama').val(obj.nama);
                    $('#kategori').val(obj.kategori);
                    // $('#jeniskelamin').val(obj.jeniskelamin);
                    // $('#jurusan').val(obj.jurusan);
                    // $('#notelp').val(obj.notelp);
                    // $('#email').val(obj.email);
                    // $('#alamat').val(obj.alamat);
                });
            }
        </script>


<?php if(@$_SESSION['sukses']){ ?>
         <script>
            swal("Good job!", "<?php echo $_SESSION['sukses']; ?>", "success");
        </script> 
<?php unset($_SESSION['sukses']); } ?>
<?php if(@$_SESSION['gagal']){ ?>
         <script>
            swal("Whoops!", "<?php echo $_SESSION['gagal']; ?>", "error");
        </script> 
<?php unset($_SESSION['gagal']); } ?>
<?php }else{
    // direct ke halama home jika role bukan admin dan devloper
    header("location:?page=home");
} ?>