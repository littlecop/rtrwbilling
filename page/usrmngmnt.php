<?php
    //jika bukan role admin & devloper maka di alihkan ke halaman home. direct halaman home ada di baris paling bawah
    date_default_timezone_set('Asia/Jakarta');
    $waktusekarang = date("d-m-Y");
    $role = $_SESSION['id_role'];
    if($role == "94868ac6-258e-11ef-916f-9009dfabca9c" || $role == "a53ee18e-258e-11ef-916f-9009dfabca9c") {
?>
<link rel="stylesheet" href="./css/customer.css">
<div class="menu">
    <button type="button" class="btn btn-light btn-sm"><i class="fa fa-user" aria-hidden="true"></i> User Management</button>
    <a href="" data-bs-toggle="modal" data-bs-target="#addCustomer" class="link-menu">Create User</a>
    <a href="" class="link-menu">Add Payment</a>
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
                <th>Username</th>
                <th>Status</th>
                <th>Role</th>
                <th>Created</th>
                <th>Last Login</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $query = mysqli_query($conn, "SELECT erp_user.id_user as id,erp_user.username as username, erp_user.nama as nama,erp_role.role as role,erp_user.created_at as created_at,erp_user.last_login as last_login, erp_user.active as active FROM erp_user JOIN erp_role ON erp_user.role = erp_role.id_role");
                while($cust = mysqli_fetch_assoc($query)) {
            ?>
            <tr class="pendek">
                <td><center><?= $i; ?></center></td>
                <td><input type="text" class="tempatid" value="<?= $cust['id']; ?>"></td>
                <td><?= $cust['nama']; ?></td>
                <td><?= $cust['username']; ?></td>
                <?php
                    if($cust['active'] == 1) {
                        echo "<td><span class='badge bg-light text-dark'>Active</span></td>";
                    }else{
                        echo "<td><span class='badge bg-danger text-light'>Inactive</span></td></td>";
                    }
                ?>
                <td><?= $cust['role']; ?></td>
                <td><?= $cust['created_at']; ?></td>
                <td><?= $cust['last_login']; ?></td>
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
        <h5 class="modal-title" id="staticBackdropLabel">Create User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./proses/addUser.php" method="post">
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="nama" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="username" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control form-control-sm" name="password" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Retype</label>
                <div class="col-sm-10">
                <input type="password" class="form-control form-control-sm" name="passwordconfirm" placeholder="Retype Password">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                <select class="form-select form-select-sm" name="role" aria-label=".form-select-sm example">
                    <option selected>Pilih Role</option>
                    <?php
                        $queryRole = mysqli_query($conn, "SELECT * FROM erp_role");
                        while($role = mysqli_fetch_assoc($queryRole)) {
                    ?>
                    <option value="<?= $role['id_role']; ?>"><?= $role['role']; ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Paket</label>
                <div class="col-sm-10">
                <select class="form-select form-select-sm" name="kategori" aria-label=".form-select-sm example" onchange="isi_otomatis()" id="id_kategori">
                    <option selected>Pilih Paket</option>
                    <?php
                        $queryKategori = mysqli_query($conn, "SELECT * FROM erp_kategori_customer");
                        while($kat = mysqli_fetch_assoc($queryKategori)) {
                    ?>
                    <option value="<?= $kat['id_kategori']; ?>"><?= $kat['kategori']; ?> - <?= $kat['harga']; ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
                <input type="hidden" class="form-control form-control-sm" name="created_at" value="<?= $waktusekarang; ?>">
                <input type="hidden" class="form-control form-control-sm" name="harga_paket_kategori" id="harga">
            <!-- <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="active" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Aktif
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="active" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Tidak Aktif
                    </label>
                    </div>
                </div>
            </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="active" class="btn btn-primary" value="1">Understood</button>
      </div>
    </div>
  </div>
</div>
</form>
<script type="text/javascript">
            function isi_otomatis(){
                var id_kategori = $("#id_kategori").val();
                $.ajax({
                    url: './page/autofillcust.php',
                    data:"id_kategori="+id_kategori ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#harga').val(obj.harga);
                    // $('#jeniskelamin').val(obj.jeniskelamin);
                    // $('#jurusan').val(obj.jurusan);
                    // $('#notelp').val(obj.notelp);
                    // $('#email').val(obj.email);
                    // $('#alamat').val(obj.alamat);
                });
            }
        </script>
<!-- modal edit -->
<?php
    $query = mysqli_query($conn, "SELECT erp_customer.id_customer as id, erp_customer.nama as nama, erp_customer.alamat as alamat, erp_customer.awal as awal, erp_customer.akhir as akhir, erp_customer.status_berlangganan as status_berlangganan, erp_kategori_customer.kategori as kategori FROM erp_customer JOIN erp_kategori_customer ON erp_customer.kategori = erp_kategori_customer.id_kategori");
    while($cust = mysqli_fetch_assoc($query)) {
?>
<div class="modal fade" id="edit<?= $cust['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
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