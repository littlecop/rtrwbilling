<?php
require 'koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
$waktusekarang = date("d-m-Y H:i:s");
if(isset($_SESSION['update_last_login'])) {
    $sql2 = mysqli_query($conn, "UPDATE erp_user SET last_login = '$waktusekarang' WHERE username = '$_SESSION[username]'");
}if(mysqli_affected_rows($conn) > 0 ) {
    unset($_SESSION['update_last_login']);
}
?>
<!-- jika tidak ada session login by username, maka tendang ke halaman login -->
<?php
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>




<!DOCTYPE html>
<html>
<title>ERP</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="./css/menu.css">
<!-- css sidebar -->
<link rel="stylesheet" href="./assets/sidebar-css-w3scool/w3.css">
<link rel="stylesheet" href="./assets/font-awesome/font-awesome.min.css">
<!-- end css sidebar -->
<!-- bootstrap 5 -->
<link rel="stylesheet" href="./assets/bootstrap5/bootstrap.min.css">
<script src="./js/bootstrap.bundle.min.js"></script>
<!-- end bootstrap 5 -->
<!-- autofill js-->
<script src="./assets/autofill/jquery.min.js"></script>
<!-- end autofill js -->

<body>
<div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:160px;">
<p><center><img src="assets/img/logo3.png" class="logo" width="120"></center></p>
  <a href="?page=home" class="w3-bar-item w3-button">Homepage</a>

  <?php
    $role = $_SESSION['id_role'];
    if($role == "94868ac6-258e-11ef-916f-9009dfabca9c" || $role == "a53ee18e-258e-11ef-916f-9009dfabca9c") {
  ?>
  <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
  Master <i class="fa fa-caret-down"></i>
  </button>
  <div id="demoAcc" class="w3-hide w3-white w3-card">
    <a href="?page=customer" class="w3-bar-item w3-button dropmenu">Customer All</a>
    <a href="#" class="w3-bar-item w3-button dropmenu">Customer Real</a>
    <a href="#" class="w3-bar-item w3-button dropmenu">Product/Package</a>
  </div>
<?php } ?>

  <button class="w3-button w3-block w3-left-align" onclick="myTransaction()">
  Transaction <i class="fa fa-caret-down"></i>
  </button>
  <div id="transaction" class="w3-hide w3-white w3-card">
    <a href="?page=payment" class="w3-bar-item w3-button dropmenu">Payment (user)</a>
      <?php
        $role = $_SESSION['id_role'];
        if($role == "94868ac6-258e-11ef-916f-9009dfabca9c" || $role == "a53ee18e-258e-11ef-916f-9009dfabca9c") {
      ?>
    <a href="?page=createPayment" class="w3-bar-item w3-button dropmenu">Create Payment</a>
  <?php } ?>
  </div>
  <button class="w3-button w3-block w3-left-align" onclick="reportPayment()">
  Report <i class="fa fa-caret-down"></i>
  </button>
  <div id="reportPayment" class="w3-hide w3-white w3-card">
    <?php
        $role = $_SESSION['id_role'];
        if($role == "94868ac6-258e-11ef-916f-9009dfabca9c" || $role == "a53ee18e-258e-11ef-916f-9009dfabca9c") {
      ?>
    <a href="?page=reportPayment" class="w3-bar-item w3-button dropmenu">Report Payment</a>
    <a href="?page=report" class="w3-bar-item w3-button dropmenu">Report All</a>
    <?php } ?>
    <a href="?page=tunggakan" class="w3-bar-item w3-button dropmenu">Tunggakan</a>
  </div>


  <button class="w3-button w3-block w3-left-align" onclick="myAdministrator()">
  Administrator <i class="fa fa-caret-down"></i>
  </button>
  <div id="myAdministrator" class="w3-hide w3-white w3-card">
    <a href="#" class="w3-bar-item w3-button dropmenu">Change Password</a>
    <a href="?page=usrmngmnt" class="w3-bar-item w3-button dropmenu">User Management</a>
    <a href="?page=sitemngmnt" class="w3-bar-item w3-button dropmenu">Site Management</a>
  </div>

  <a href="?page=test" class="w3-bar-item w3-button">Test Page</a>
  <a href="logout.php" class="w3-bar-item w3-button" data-bs-toggle="modal" data-bs-target="#modalLogout">Logout (<?php echo $_SESSION['username']; ?>)</a>
</div>

<div class="w3-container" style="margin-left:160px">
<!-- datatable -->
<!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="./assets/datatable/dataTables.bootstrap5.css">
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<!-- end datatable -->
<!-- sweatalaert -->
<link rel="stylesheet" href="./assets/sweatalert/sweetalert2.min.css">
<script src="./js/sweetalert2.min.js"></script>
<!-- end sweatalert -->
<?php
    @$page = $_GET['page'];
    if(!empty($page)) {

        switch ($page) {
            case 'home':
            include "page/home.php";
            break;
            case 'sitemngmnt':
            include "page/sitemngmnt.php";
            break;
            case 'lihatTunggakan':
            include "page/lihatTunggakan.php";
            break;
            case 'tunggakan':
            include "page/tunggakan.php";
            break;
            case 'createPayment':
            include "page/createPayment.php";
            break;
            case 'test':
            include "page/test.php";
            break;
            case 'reportPayment':
            include "page/reportPayment.php";
            break;
            case 'report':
            include "page/report.php";
            break;
            case 'usrmngmnt':
            include "page/usrmngmnt.php";
            break;
            case 'payment':
            include "page/payment.php";
            break;
            case 'customer':
            include "page/customer.php";
            break;
            default:
            include "page/home.php";
            break;
        }
    }else{
        include "page/home.php";
    }
?>

</div>

<script>
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}
function myTransaction() {
  var x = document.getElementById("transaction");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}
function reportPayment() {
  var x = document.getElementById("reportPayment");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}
function myAdministrator() {
  var x = document.getElementById("myAdministrator");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}
</script>

</body>
</html>




<!-- Modal Logout-->
<div class="modal fade" id="modalLogout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Want to Logout?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"><center>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      <a href="logout.php" class="btn btn-danger">Logout</a></center>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>