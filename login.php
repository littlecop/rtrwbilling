<?php
require 'koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
$waktusekarang = date("d-m-Y H:i:s");
?>
<?php
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
 
if (isset($_POST['submit'])) {
    $last_login = $_POST['last_login'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256
    
    // $sql = "SELECT * FROM erp_user JOIN erp_role WHERE username='$username' AND password='$password'";
    $sql = "SELECT erp_user.active as active, erp_user.username as username, erp_user.password as password, erp_role.id_role as id_role,erp_user.id_user as id_user FROM erp_user JOIN erp_role ON erp_user.role = erp_role.id_role WHERE erp_user.username = '$username' AND erp_user.password = '$password'";
    $result = mysqli_query($conn, $sql);
    $cekStatus = mysqli_query($conn, "SELECT * FROM erp_user WHERE username = '$username'");
    $hasil = mysqli_fetch_assoc($cekStatus);
    if($hasil['active'] == 0 ) {
        $_SESSION['nonaktif'] = "user tidak terdaftar/dinonaktifkan";
        header("Location: login.php");
        die();
    }
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['id_role'] = $row['id_role'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['update_last_login'] = "Login Berhasil";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['gagal'] = "Username/Password Salah";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP Login</title>
</head>
<body>
<div class="login">
	<h1>Login</h1>
    <?php
        if(isset($_SESSION['ok'])){
            $notif = $_SESSION['ok'];
            echo "<p class='notif'>$notif</p>";
            unset($_SESSION['ok']);
         }
    ?>
    <?php
        if(isset($_SESSION['gagal'])){
            $notif = $_SESSION['gagal'];
            echo "<p class='notif'>$notif</p>";
            unset($_SESSION['gagal']);
         }
    ?>
    <?php
        if(isset($_SESSION['nonaktif'])){
            $notif = $_SESSION['nonaktif'];
            echo "<p class='notif'>$notif</p>";
            unset($_SESSION['nonaktif']);
         }
    ?>
    <form action="" method="post">
        <input type="text" name="last_login" id="last_login" value="<?= $waktusekarang; ?>" readonly>
    	<input type="text" name="username" placeholder="Username" autocomplete="off" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>
    <br>
    <a class="link" href="register.php">Create Account Here.</a>
</div>
</body>
</html>