<?php
    //jika bukan role admin & devloper maka di alihkan ke halaman home. direct halaman home ada di baris paling bawah
    //jika bukan role admin & devloper maka di alihkan ke halaman home. direct halaman home ada di baris paling bawah
    $role = $_SESSION['id_role'];
    if($role == "94868ac6-258e-11ef-916f-9009dfabca9c" || $role == "a53ee18e-258e-11ef-916f-9009dfabca9c") {
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

<link rel="stylesheet" href="./css/reportPayment.css">
<link rel="stylesheet" href="./css/customer.css">
<div class="menu">
    <button type="button" class="btn btn-light btn-sm"><i class="fa fa-user" aria-hidden="true"></i> Report Payment</button>
    <a href="" class="link-menu badge bg-success" data-bs-toggle="modal" data-bs-target="#approvePayment">Approve Payment</a>
    <a href="" class="link-menu badge bg-danger" data-bs-toggle="modal" data-bs-target="#rejectPayment">Reject Payment</a>
</div>


<!-- Modal setAktif-->
<div class="modal fade" id="approvePayment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Approve Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./proses/approvePayment.php" method="post">
        <div class="mb-3 row">
                <!-- <label for="inputPassword" class="col-sm-2 col-form-label">ID</label> -->
                <div class="col-sm-10">
                <input type="hidden" class="form-control form-control-sm" id="id" name="id_bayar" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" id="nama" name="nama" readonly>
                </div>
            </div>
      <!-- Last Name:<input type="text" name="lname" id="lname"><br><br> -->
      <!-- First Name:<input type="text" name="fname" id="fname"><br><br> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" value="2" name="status" class="btn btn-success btn-sm">Approve</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- end -->
<!-- Reject Payment-->
<div class="modal fade" id="rejectPayment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Reject Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./proses/rejectPayment.php" method="post">
        <div class="mb-3 row">
                <!-- <label for="inputPassword" class="col-sm-2 col-form-label">ID</label> -->
                <div class="col-sm-10">
                <input type="hidden" class="form-control form-control-sm" id="id2" name="id_bayar" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" id="nama2" name="nama" readonly>
                </div>
            </div>
      <!-- Last Name:<input type="text" name="lname" id="lname"><br><br> -->
      <!-- First Name:<input type="text" name="fname" id="fname"><br><br> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" value="-1" name="status" class="btn btn-danger btn-sm">Reject</button>
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

    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green">
                <div class="inner">
                    <?php
                        $BulanIni = date('m');
                        $CekBulanLalu = $BulanIni - 1;
                        $bulanLalu = "0$CekBulanLalu";
                        // 
                        $tahunIni = date("Y");
                        $querySum = mysqli_query($conn, "SELECT SUM(bayar) as total FROM erp_payment WHERE bulan_tagihan='$bulanLalu' AND tahun_tagihan='$tahunIni' AND status_bayar='2'");
                        $hasil = mysqli_fetch_assoc($querySum);
                    ?>
                    <h3> <?php echo "Rp " . number_format($hasil['total'], 0, ",", "."); ?> </h3>
                    <p> Pembayaran Diterima </p>
                </div>
                <div class="icon">
                    <i class="fa fa-money" aria-hidden="true"></i>
                </div>
                <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-blue">
                <div class="inner">
                    <?php
                        $queryCustomer = mysqli_query($conn, "SELECT * FROM erp_customer WHERE status_berlangganan = '1'");
                        $totalCustomer = mysqli_num_rows($queryCustomer);
                    ?>
                    <h3> <?= $totalCustomer; ?> </h3>
                    <p> Total Customer </p>
                </div>
                <div class="icon">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                </div>
                <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
                <div class="inner">
                    <?php
                        $querySudahBayar = mysqli_query($conn, "SELECT * FROM erp_customer JOIN erp_payment ON erp_customer.id_user = erp_payment.id_customer WHERE erp_payment.bulan_tagihan='$bulanLalu' AND erp_payment.tahun_tagihan='$tahunIni' AND erp_payment.status_bayar = '2'");
                        $totalSudahBayar = mysqli_num_rows($querySudahBayar);
                    ?>
                    <h3> <?= $totalSudahBayar; ?> </h3>
                    <p> Sudah Bayar </p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </div>
                <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
                <div class="inner">
                    <?php
                        $belumBayar = $totalCustomer - $totalSudahBayar;
                    ?>
                    <h3> <?= $belumBayar; ?> </h3>
                    <p> Belum Bayar </p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="#" data-bs-toggle="modal" data-bs-target="#belumBayar" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>


<table id="example" class="table" style="width:100%">
        <thead>
            <tr class="judultable">
                <th>#</th>
                <th>Status</th>
                <th>ID Bayar</th>
                <th>Nama</th>
                <th>Paket</th>
                <th>Periode (M)</th>
                <th>Periode (Y)</th>
                <th>Tagihan</th>
                <th>Bayar</th>
                <th>Note</th> 
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $query = mysqli_query($conn, "SELECT erp_payment.id_bayar as id,erp_payment.bulan_tagihan as bulan,erp_payment.tahun_tagihan as tahun,erp_payment.nama as nama,erp_payment.paket as paket,erp_payment.periode_tagihan as periode,erp_payment.harga_paket as harga,erp_payment.bayar as bayar,erp_jenis_payment.jenis_payment as jenis_payment,erp_payment.note as note,erp_payment.status_bayar as status FROM erp_payment JOIN erp_jenis_payment ON erp_payment.metode_bayar = erp_jenis_payment.id_jenis_payment WHERE erp_payment.status_bayar IN ('1','2','-1') ORDER BY erp_payment.created_at DESC");
                while($payment = mysqli_fetch_assoc($query)) {
            ?>
            <tr onclick="callme(this)" class="pendek">
                <td><center><?= $i; ?></center></td>
                <?php
                    if($payment['status'] == 0) {
                        echo "<td class='draft'>DRAFT</td>";
                    }if($payment['status'] == 1) {
                        echo "<td class='diproses'>PROSES</td>";
                    }if($payment['status'] == -1) {
                        echo "<td class='ditolak'>DITOLAK</td>";
                    }if($payment['status'] == 2) {
                        echo "<td class='selesai'>SELESAI</td>";
                    }
                ?>
                <td><input type="text" class="tempatid" value="<?= $payment['id']; ?>"></td>
                
                <td><?= $payment['nama']; ?></td>
                <td><?= $payment['paket']; ?></td>
                <td><?= $payment['bulan']; ?></td>
                <td><?= $payment['tahun']; ?></td>
                <td><?= $payment['harga']; ?></td>
                <td><?= $payment['bayar']; ?></td>
                <td>
            <?= substr($payment['note'], 0, 15); ?>..</td>
                
                <td><span class="badge bg-primary edit" data-bs-toggle="modal" data-bs-target="#edit<?= $cust['id']; ?>"><i class="fa fa-cog" aria-hidden="true"></i>  Edit</span></td>
            </tr>
            <?php $i++; ?>
            <?php } ?>
        </tbody>
        <tfoot>
        <tr>
                <th>#</th>
                <th>Status</th>
                <th>ID Bayar</th>
                <th>Nama</th>
                <th>Paket</th>
                <th>Periode (M)</th>
                <th>Periode (Y)</th>
                <th>Tagihan</th>
                <th>Bayar</th>
                <th>Note</th>
                
                <th>Option</th>
            </tr>
        </tfoot>
    </table>
    <script>
        $(document).ready( function () {
  var table = $('#example').DataTable();
  
  $('#example tbody').on('click', 'tr', function (event) {
    console.log('td click event');
    table.$('tr.selected').removeClass('selected');
    $(this).addClass('selected');
    
    event.stopPropagation();
  });
  
  $('body').on('click', function () {
    console.log('body click event');
    table.$('tr.selected').removeClass('selected');
  });
  
} );
    </script>
    <script>
        function callme(e)
{
  var tds=e.getElementsByTagName('td');
  document.getElementById("id").value = tds[2].innerHTML.trim();
  document.getElementById("nama").value = tds[3].innerHTML.trim();

  document.getElementById("id2").value = tds[2].innerHTML.trim();
  document.getElementById("nama2").value = tds[3].innerHTML.trim();

}
    </script>
    <script>
        new DataTable('#example', {
            scrollX:true,
    initComplete: function () {
        this.api()
        .columns("1,3,4,5,6")
            .every(function () {
                let column = this;
 
                // Create select element
                let select = document.createElement('select');
                select.add(new Option(''));
                column.footer().replaceChildren(select);
 
                // Apply listener for user change in value
                select.addEventListener('change', function () {
                    column
                        .search(select.value, {exact: true})
                        .draw();
                });
 
                // Add list of options
                column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                        select.add(new Option(d));
                    });
            });
    }
});
    </script>
    <!-- <script>
        $(document).ready( function () {
  var table = $('#example').DataTable();
  
  $('#example tbody').on('click', 'tr', function (event) {
    console.log('td click event');
    table.$('tr.selected').removeClass('selected');
    $(this).addClass('selected');
    
    event.stopPropagation();
  });
  
  $('body').on('click', function () {
    console.log('body click event');
    table.$('tr.selected').removeClass('selected');
  });
  
} );
    </script> -->
    <!-- <script>
        new DataTable('#example', {
    initComplete: function () {
        this.api()
            .columns("1,3,4,5,6")
            .every(function () {
                let column = this;
 
                // Create select element
                let select = document.createElement('select');
                select.add(new Option(''));
                column.footer().replaceChildren(select);
 
                // Apply listener for user change in value
                select.addEventListener('change', function () {
                    column
                        .search(select.value, {exact: true})
                        .draw();
                });
 
                // Add list of options
                column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                        select.add(new Option(d));
                    });
            });
    }
});
    </script> -->
    <!-- <script> 
    var table = document.getElementById('example');
    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
            //  rIndex = this.rowIndex;
            //  document.getElementById("fname").value = this.cells[0].innerHTML;
             document.getElementById("id").value = this.cells[2].innerHTML;
             document.getElementById("nama").value = this.cells[3].innerHTML;
             document.getElementById("id2").value = this.cells[2].innerHTML;
             document.getElementById("nama2").value = this.cells[3].innerHTML;
        };
    }

</script> -->
    
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
        <form action="./proses/payment.php" method="post">
        <div class="alert alert-primary" role="alert">
        Pembayaran yang akan dibayarkan saat ini merupakan tagihan bulan sebelumnya.
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
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Bayar (Rp)</label>
                <div class="col-sm-10">
                <input type="number" name="bayar" class="form-control form-control-sm" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Periode</label>
                <div class="col-sm-10">
                <input type="date" name="periode_tagihan" class="form-control form-control-sm" autocomplete="off">
                <div id="emailHelp" class="form-text">Periode Bayar diisi tanggal terakhir dibulan sebelumnya.</div>
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
                    <input class="form-check-input" value="0" name="status_bayar" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Save Draft
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" value="1" name="status_bayar" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Send
                    </label>
                </div>
                 <!-- radio end -->
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

<!-- modal belum bayar -->
<div class="modal fade" id="belumBayar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Belum Bayar (Periode) <?php echo date("M-Y",strtotime("-1 month")); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table id="example1" class="table" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Customer</th>
                <th>Nama</th>
                <th>Bayar</th>
                <th>Status</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $queryBelumBayar = mysqli_query($conn, "SELECT id_user,nama,harga_paket_kategori as harga,status_berlangganan as status FROM erp_customer WHERE status_berlangganan = '1' AND id_user NOT IN (SELECT id_customer FROM erp_payment WHERE bulan_tagihan ='$bulanLalu' AND tahun_tagihan = '$tahunIni')");
                while($listBelumBayar = mysqli_fetch_assoc($queryBelumBayar)) {
            ?>      
            <tr>
                <td><?= $i; ?></td>
                <td><?= $listBelumBayar['id_user']; ?></td>
                <td><?= $listBelumBayar['nama']; ?></td>
                <td><?php echo "Rp " . number_format($listBelumBayar['harga'], 0, ",", "."); ?></td>
                <td><?= $listBelumBayar['status']; ?></td>
                <td></td>
            </tr>
            <?php $i++; ?>
            <?php } ?>
    </table>
    <script>
        new DataTable('#example1');
    </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
<?php }else{
    // direct ke halama home jika role bukan admin dan devloper
    header("location:?page=home");
} ?>