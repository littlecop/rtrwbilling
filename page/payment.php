<?php
    //jika bukan role admin & devloper maka di alihkan ke halaman home. direct halaman home ada di baris paling bawah
    date_default_timezone_set('Asia/Jakarta');
    $waktusekarang = date("d-m-Y H:i:s");
    $role = $_SESSION['id_role'];
    $queryCustomer = mysqli_query($conn, "SELECT erp_kategori_customer.kategori as kategori, erp_customer.harga_paket_kategori as harga_paket_kategori,erp_customer.nama as namacust FROM erp_customer JOIN erp_kategori_customer ON erp_customer.kategori = erp_kategori_customer.id_kategori WHERE id_user = '$_SESSION[id_user]'");
    $customer = mysqli_fetch_assoc($queryCustomer);
    // if($role == "94868ac6-258e-11ef-916f-9009dfabca9c" || $role == "a53ee18e-258e-11ef-916f-9009dfabca9c") {
?>
<style>
                    .draft{
                        background-color:#7f8c8d !important;
                        text-align:center;
                        color:white;
                    }
                    .diproses {
                        background-color:#f1c40f !important;
                        text-align:center;
                        
                    }
                    .ditolak {
                        background-color:#e74c3c !important;
                        text-align:center;
                        color:white;
                    }
                    .selesai {
                        background-color:#2ecc71 !important;
                        text-align:center;
                        color:white;
                    }
                </style>
<link rel="stylesheet" href="./css/customer.css">
<div class="menu">
    <button type="button" class="btn btn-light btn-sm"><i class="fa fa-user" aria-hidden="true"></i> Payment</button>
    <a href="" data-bs-toggle="modal" data-bs-target="#createPayment" class="link-menu">Create Payment</a>
    <a href="" class="link-menu badge bg-primary" data-bs-toggle="modal" data-bs-target="#setAktif"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Payment</a>
    <!-- <a href="" class="link-menu badge bg-danger" data-bs-toggle="modal" data-bs-target="#setNonaktif">Set Nonaktif</a> -->
</div>


<!-- Modal setAktif-->
<div class="modal fade" id="setAktif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Send Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./proses/sendPayment.php" method="post">
        <div class="mb-3 row">
                <!-- <label for="inputPassword" class="col-sm-2 col-form-label">ID</label> -->
                <div class="col-sm-10">
                <input type="hidden" class="form-control form-control-sm" id="id" name="idcust" readonly>
                </div>
            </div>
            <div class="alert alert-info" role="alert">
  Periksa kembali pembayaran anda. Pastikan nominal pembayran yang dimasukan sesuai dengan nominal tagihan. Dan pastikan periode pembayaran sudah benar. Kesalahan input mengakibatkan pembayaran tidak dapat di proses oleh sistem.
</div>

                <input type="hidden" class="form-control form-control-sm" id="nama" name="nama" readonly>

      <!-- Last Name:<input type="text" name="lname" id="lname"><br><br> -->
      <!-- First Name:<input type="text" name="fname" id="fname"><br><br> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" value="1" name="status" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Payment</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- end -->






        <!-- <style>
            table tr:not(:first-child){
                cursor: pointer;transition: all .25s ease-in-out;
            }
            table tr:not(:first-child):hover{background-color: #333 !important;} 
        </style> -->
        
<table id="example" class="table" style="width:100%">
        <thead>
            <tr class="judultable">
                <th>#</th>
                <th>ID Bayar</th>
                <th>Nama</th>
                <th>Paket</th>
                <th>Periode Tagihan</th>
                <th>Harga</th>
                <th>Bayar</th>
                <th>Metode Bayar</th>
                <th>Note</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $query = mysqli_query($conn, "SELECT erp_payment.id_bayar as id,erp_payment.nama as nama,erp_payment.paket as paket,erp_payment.periode_tagihan as periode,erp_payment.harga_paket as harga,erp_payment.bayar as bayar,erp_jenis_payment.jenis_payment as jenis_payment,erp_payment.note as note,erp_payment.status_bayar as status FROM erp_payment JOIN erp_jenis_payment ON erp_payment.metode_bayar = erp_jenis_payment.id_jenis_payment WHERE erp_payment.id_customer = '$_SESSION[id_user]'");
                while($payment = mysqli_fetch_assoc($query)) {
            ?>
            <tr class="pendek">
                <td><center><?= $i; ?></center></td>
                <td><input type="text" class="tempatid" value="<?= $payment['id']; ?>"></td>
                <td><?= $payment['nama']; ?></td>
                <td><?= $payment['paket']; ?></td>
                <td><?= $payment['periode']; ?></td>
                <td><?= $payment['harga']; ?></td>
                <td><?= $payment['bayar']; ?></td>
                <td><?= $payment['jenis_payment']; ?></td>
                <td><?= $payment['note']; ?></td>
                <?php
                    if($payment['status'] == 0) {
                        echo "<td class='draft'>Draft</td>";
                    }if($payment['status'] == 1) {
                        echo "<td class='diproses'>PROSES</td>";
                    }if($payment['status'] == -1) {
                        echo "<td class='ditolak'>PEMBAYARAN DITOLAK</td>";
                    }if($payment['status'] == 2) {
                        echo "<td class='selesai'>SELESAI</td>";
                    }
                ?>
                <td><span class="badge bg-primary edit" data-bs-toggle="modal" data-bs-target="#edit<?= $cust['id']; ?>"><i class="fa fa-cog" aria-hidden="true"></i>  Edit</span></td>
            </tr>
            <?php $i++; ?>
            <?php } ?>
        </tbody>
    </table>
    <script>
        new DataTable('#example', {
            pageLength: 10,
            scrollX: true
        });
        $('#example tbody').on('click', 'tr', function() {
  $('#example tbody > tr').removeClass('selected');
  $(this).addClass('selected');
});
    </script>
    <script>
    
    var table = document.getElementById('example');
    
    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
             //rIndex = this.rowIndex;
            //  document.getElementById("fname").value = this.cells[0].innerHTML;


             document.getElementById("id").value = this.cells[1].innerHTML;
             document.getElementById("nama").value = this.cells[2].innerHTML;
        };
    }

</script>
    <!-- <script>
        const table = new DataTable('#example');
 
 table.on('click', 'tbody tr', (e) => {
     let classList = e.currentTarget.classList;
  
     if (classList.contains('selected')) {
         classList.remove('selected');
     }
     else {
         table.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
         classList.add('selected');
     }
 });
  
 document.querySelector('#button').addEventListener('click', function () {
     table.row('.selected').remove().draw(false);
 });
    </script> -->


<!-- modal create payment -->
<!-- Modal -->
<?php
    $queryCustomer = mysqli_query($conn, "SELECT * FROM erp")
?>
<div class="modal fade" id="createPayment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./proses/payment.php" method="POST">
        <div class="alert alert-primary" role="alert">
        1. Pembayaran yang akan dibayarkan saat ini merupakan tagihan bulan sebelumnya. <br> 2. Perhatikan pengisian <b>periode pembayaran tagihan.</b> Kesalahan input mengakibatkan pembayaran tidak dapat di proses oleh sistem. 
        </div>
                <input type="hidden" class="form-control form-control-sm" name="username" autocomplete="off" value="<?= $_SESSION['username']; ?>" readonly>
                <input type="hidden" class="form-control form-control-sm" name="id_user" autocomplete="off" value="<?= $_SESSION['id_user']; ?>" readonly>
                <input type="hidden" class="form-control form-control-sm" name="nama" autocomplete="off" value="<?= $customer['namacust']; ?>" readonly>
                <input type="hidden" class="form-control form-control-sm" autocomplete="off" name="paket" value="<?= $customer['kategori']; ?>" readonly>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Tagihan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="harga_paket_kategori" autocomplete="off" value="<?= $customer['harga_paket_kategori']; ?>" readonly>
                </div>
            </div>
            <style>
                .penting {
                    color:red;
                    font-weight:bold;
                }
            </style>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Bayar (Rp)</label>
                <div class="col-sm-10">
                <input type="number" name="bayar" class="form-control form-control-sm" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row penting">
                <label for="inputPassword" class="col-sm-2 col-form-label">Periode</label>
                <div class="col-sm-10">
                <input type="date" name="periode_tagihan" class="form-control form-control-sm" autocomplete="off">
                <div id="emailHelp" class="form-text penting"><i>Note :</i> Periode Bayar diisi tanggal terakhir dibulan sebelumnya / bulan tunggakan</div>
                </div>
            </div>
            <!-- <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Periode</label>
                <div class="col-sm-10">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected>Periode Pembayaran (bulan)</option>
                        <?php
                        $bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember");
                        for($bulan=1; $bulan<=12; $bulan++){
                        if($bulan<=9) { echo "<option value='0$bulan'>$bln[$bulan]</option>"; }
                        else { echo "<option value='$bulan'>$bln[$bulan]</option>"; }
                        }
                        ?>
                    </select>
                </div>
            </div> -->
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Metode</label>
                <div class="col-sm-10">
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
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"></textarea>
                <div id="emailHelp" class="form-text">Note wajib diisi, untuk pembayaran tunai maupun transfer. Cth:Trasnsfer ke rek BRI | Tunai: diterima xxx dirumah</div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                <!-- radio -->
                <div class="form-check">
                    <input class="form-check-input" value="0" name="status_bayar" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                    <label class="form-check-label" value="0" for="flexRadioDefault1">
                        Save Draft
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" value="1" name="status_bayar" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Send
                    </label>
                </div>
                 <!-- radio end -->
                  <input type="hidden" name="created_at" id="" value="<?= $waktusekarang; ?>">
                  <input type="hidden" name="harga_paket" id="" value="<?= $customer['harga_paket_kategori']; ?>">
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save & Close</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- end -->





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

<!-- <?php 
//}else{ -->
    // direct ke halama home jika role bukan admin dan devloper
    //header("location:?page=home");
//} ?> -->