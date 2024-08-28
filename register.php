<?php
require 'koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
$waktusekarang = date("d-m-Y H:i:s");
$querySys = mysqli_query($conn, "SELECT * FROM erp_sys WHERE menu = 'registrasi'");
$hasil = mysqli_fetch_assoc($querySys);
if($hasil['value'] == 0 ) {
    header('Location: login.php');
    die();
}else {
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/register.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="login">
	<h1>Register</h1>
    <?php
        if(isset($_SESSION['gagal'])){
            $notif = $_SESSION['gagal'];
            echo "<p class='notif'>$notif</p>";
            unset($_SESSION['gagal']);
         }
    ?>
    <form action="./proses/register.php" method="post">
        <input type="hidden" name="created_at" id="created_at" value="<?= $waktusekarang; ?>" readonly>
        <input type="text" name="nama" placeholder="Nama" required="required" autocomplete="off" />
    	<input type="text" name="username" placeholder="Username" required="required" autocomplete="off" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <input type="password" name="passwordconfirm" placeholder="ReType Password" required="required" />
        <select name="role" id="role">
            <option value="">Select Role</option>
                <?php
                    $queryRole = mysqli_query($conn, "SELECT * FROM erp_role");
                    while($role = mysqli_fetch_assoc($queryRole)) {
                ?>
                    <option value="<?= $role['id_role']; ?>"><?= $role['role']; ?></option>
                <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>
    <br>
    <a class="link" href="login.php">Back to Login</a>
</div>
</body>
</html>