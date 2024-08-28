<?php
    //jika bukan role admin & devloper maka di alihkan ke halaman home. direct halaman home ada di baris paling bawah
    $role = $_SESSION['id_role'];
    if($role == "94868ac6-258e-11ef-916f-9009dfabca9c" || $role == "a53ee18e-258e-11ef-916f-9009dfabca9c") {
?>
<link rel="stylesheet" href="./css/customer.css">
<div class="menu">
    <button type="button" class="btn btn-light btn-sm"><i class="fa fa-user" aria-hidden="true"></i> Master Customer</button>
    <!-- <a href="" data-bs-toggle="modal" data-bs-target="#addCustomer" class="link-menu">Add Customer</a>
    <a href="" class="link-menu">Add Payment</a> -->
    <a href="" class="link-menu badge bg-primary" data-bs-toggle="modal" data-bs-target="#setAktif">Set Aktif</a>
    <a href="" class="link-menu badge bg-danger" data-bs-toggle="modal" data-bs-target="#setNonaktif">Set Nonaktif</a>
</div>


<!-- Modal setNonaktif-->
<div class="modal fade" id="setNonaktif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Customer Nonaktif</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./proses/SetCustNonAktif.php" method="post">
        <div class="mb-3 row">
                <!-- <label for="inputPassword" class="col-sm-2 col-form-label">ID</label> -->
                <div class="col-sm-10">
                <input type="hidden" class="form-control form-control-sm" id="lname" name="idcust" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" id="age" name="nama" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Akhir</label>
                <div class="col-sm-10">
                <input type="date" class="form-control form-control-sm" id="" name="akhir" required>
                </div>
            </div>
      <!-- Last Name:<input type="text" name="lname" id="lname"><br><br> -->
      <!-- First Name:<input type="text" name="fname" id="fname"><br><br> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" value="0" name="status" class="btn btn-danger btn-sm">Set Nonaktif</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- end -->
<!-- Modal setAktif-->
<div class="modal fade" id="setAktif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Customer Aktif</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./proses/setCustAktif.php" method="post">
        <div class="mb-3 row">
                <!-- <label for="inputPassword" class="col-sm-2 col-form-label">ID</label> -->
                <div class="col-sm-10">
                <input type="hidden" class="form-control form-control-sm" id="id" name="idcust" readonly>
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
        <button type="submit" value="1" name="status" class="btn btn-primary btn-sm">Set Aktif</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- end -->





<div class="container container-center">
<center>
  <div class="row">
    <div class="col">
        <div class="card text-black bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header"><i class="fa fa-user" aria-hidden="true"></i> Customer Aktif</div>
                <div class="card-body">
                    <?php 
                        $query = mysqli_query($conn, "SELECT * FROM erp_customer WHERE status_berlangganan = '1'");
                        $custactive = mysqli_num_rows($query);
                    ?>
                    <h5 class="card-title"><?= $custactive; ?></h5>
                        <p class="card-text"></p>
                </div>
        </div>
    </div>
    <div class="col">
    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header"><i class="fa fa-user" aria-hidden="true"></i> Customer Nonaktif</div>
                <div class="card-body">
                    <?php 
                        $query = mysqli_query($conn, "SELECT * FROM erp_customer WHERE status_berlangganan = '0'");
                        $custnonactive = mysqli_num_rows($query);
                    ?>
                    <h5 class="card-title"><?= $custnonactive; ?></h5>
                        <p class="card-text"></p>
                </div>
        </div>
    </div>
    <div class="col">
    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header"><i class="fa fa-user" aria-hidden="true"></i> Total Customer</div>
                <div class="card-body">
                    <?php 
                        $query = mysqli_query($conn, "SELECT * FROM erp_customer");
                        $cust = mysqli_num_rows($query);
                    ?>
                    <h5 class="card-title"><?= $cust; ?></h5>
                        <p class="card-text"></p>
                </div>
        </div>
    </div>
  </div>
  </center>
</div>
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
                <th>ID Pelanggan</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Alamat</th>
                <th>Awal</th>
                <th>Akhir</th> 
                <th>Note</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $query = mysqli_query($conn, "SELECT erp_customer.id_customer as id,erp_customer.id_user as id_user, erp_customer.nama as nama, erp_customer.alamat as alamat, erp_customer.awal as awal, erp_customer.akhir as akhir, erp_customer.status_berlangganan as status_berlangganan, erp_kategori_customer.kategori as kategori,erp_kategori_customer.harga as harga FROM erp_customer JOIN erp_kategori_customer ON erp_customer.kategori = erp_kategori_customer.id_kategori");
                while($cust = mysqli_fetch_assoc($query)) {
            ?>
            <tr class="pendek">
                <td><center><?= $i; ?></center></td>
                <td><input type="text" class="tempatid" value="<?= $cust['id']; ?>"></td>
                <td><?= $cust['nama']; ?></td>
                <?php
                    if($cust['status_berlangganan'] == 1) {
                        echo "<td><span class='badge bg-light text-dark'>Active</span></td>";
                    }else{
                        echo "<td><span class='badge bg-danger text-light'>Inactive</span></td></td>";
                    }
                ?>
                <td><?= $cust['kategori']; ?></td>
                <td><?= $cust['harga']; ?></td>
                <td><?= $cust['alamat']; ?></td>
                <td><?= $cust['awal']; ?></td>
                <td><?= $cust['akhir']; ?></td>
                <td>
                    <?php
                        $tglawal = $cust['awal'];
                        $tglakhir = date("d-m-Y" ,strtotime("-1 month"));
                        // $selisih = date_diff($tglawal, $tglakhir); 
                        $queryTunggakan = mysqli_query($conn, "SELECT * FROM erp_payment WHERE id_customer = '$cust[id_user]'");
                        $hasilTunggakan = mysqli_num_rows($queryTunggakan);
                    ?>
                    <?php echo $tglakhir;
                        // if($hasilTunggakan < 1 ) {
                        //     echo "Punya tunggakan";
                        // }
                    ?>
                </td>
                <td><span class="badge bg-primary edit" data-bs-toggle="modal" data-bs-target="#edit<?= $cust['id']; ?>"><i class="fa fa-cog" aria-hidden="true"></i>  Edit</span></td>
            </tr>
            <?php $i++; ?>
            <?php } ?>
        </tbody>
    </table>
    <!-- <script>
        new DataTable('#example', {
            pageLength: 10
        });
//         $('#example tbody').on('click', 'tr', function() {
//   $('#example tbody > tr').removeClass('selected');
//   $(this).addClass('selected');
// });
    </script> -->
    
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
    
    var table = document.getElementById('example');
    
    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
             rIndex = this.rowIndex;
            //  document.getElementById("fname").value = this.cells[0].innerHTML;
             document.getElementById("lname").value = this.cells[1].innerHTML;
             document.getElementById("age").value = this.cells[2].innerHTML;

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


<!-- Modal -->
<div class="modal fade" id="addCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./proses/addCustomer.php" method="post">
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="nama" id="inputPassword">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                <select class="form-select form-select-sm" name="kategori" aria-label=".form-select-sm example">
                    <option selected>Pilih Kategori</option>
                    <?php
                        $queryKategori = mysqli_query($conn, "SELECT * FROM erp_kategori_customer");
                        while($kat = mysqli_fetch_assoc($queryKategori)) {
                    ?>
                    <option value="<?= $kat['id_kategori']; ?>"><?= $kat['kategori']; ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Awal</label>
                <div class="col-sm-10">
                <input type="date" class="form-control form-control-sm" name="awal" id="inputPassword">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="status" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Aktif
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="status" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Tidak Aktif
                    </label>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- modal edit -->
<?php
    $query = mysqli_query($conn, "SELECT erp_customer.id_customer as id, erp_customer.nama as nama, erp_customer.alamat as alamat, erp_customer.awal as awal, erp_customer.akhir as akhir, erp_customer.status_berlangganan as status_berlangganan, erp_kategori_customer.kategori as kategori FROM erp_customer JOIN erp_kategori_customer ON erp_customer.kategori = erp_kategori_customer.id_kategori");
    while($cust = mysqli_fetch_assoc($query)) {
?>
<div class="modal fade" id="edit<?= $cust['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./proses/editCust.php" method="post">
            <input type="hidden" name="id_customer" id="" value="<?= $cust['id']; ?>">
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="nama" value="<?= $cust['nama']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                <textarea class="form-control form-control-sm" name="alamat" rows="3"><?= $cust['alamat']; ?></textarea>
                </div>
            </div>
            <?php
              $queryCustomer = mysqli_query($conn, "SELECT erp_customer.id_customer as id,erp_kategori_customer.kategori as kategori,erp_kategori_customer.harga as harga,erp_kategori_customer.id_kategori as id_kategori FROM erp_customer JOIN erp_kategori_customer ON erp_customer.kategori = erp_kategori_customer.id_kategori WHERE erp_customer.id_customer = '$cust[id]'");
              $hasil = mysqli_fetch_assoc($queryCustomer);
              // echo $hasil['kategori'];
              $select = "selected";
              
            ?>
          
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Paket</label>
                <div class="col-sm-10">
                <select class="form-select form-select-sm" name="kategori" aria-label=".form-select-sm example" onchange="isi_otomatis()" id="id_kategori">
                    <!-- <option value="<?= $kat['id_kategori']; ?>" selected><?= $hasil['kategori']; ?> - <?= $hasil['harga']; ?></option> -->
                    <?php
                        $queryKategori = mysqli_query($conn, "SELECT * FROM erp_kategori_customer");
                        while($kat = mysqli_fetch_assoc($queryKategori)) {
                    ?>
                    <?php
                        if($hasil['kategori'] == $kat['kategori']) {
                            echo "<option value='$kat[id_kategori]' $select>$kat[kategori] - $kat[harga]</option>";
                        }else{
                            echo "<option value='$kat[id_kategori]'>$kat[kategori] - $kat[harga]</option>";
                        }
                    ?>
                    <!-- <option value="<?= $kat['id_kategori']; ?>"><?= $kat['kategori']; ?> - <?= $kat['harga']; ?></option> -->
                    <?php } ?>
                </select>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php } ?>
<!-- end modal edit -->



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