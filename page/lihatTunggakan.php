<link rel="stylesheet" href="./css/reportPayment.css">
<link rel="stylesheet" href="./css/customer.css">
<div class="menu">
    <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-user" aria-hidden="true"></i> Report Tunggakan</button>
    <a href="" class="link-menu badge bg-success" data-bs-toggle="modal" data-bs-target="#approvePayment">Menu 1</a>
    <a href="" class="link-menu badge bg-danger" data-bs-toggle="modal" data-bs-target="#rejectPayment">Menu 2</a>
</div>
<?php
$id_user = $_POST['id_user'];
$now = date("d-m-Y");

$query = mysqli_query($conn, "SELECT * FROM erp_customer WHERE id_user = '$id_user'");
$cust = mysqli_fetch_assoc($query);
// awal jOIN
$awal = date("d-m-Y",strtotime($cust['awal']));
$awal2 = date("d-m-Y", strtotime("+1 months, $awal"));
$awalBulan = date("m",strtotime($cust['awal']));
$awalTahun = date("Y",strtotime($cust['awal']));

// waktu sekarang
$now = date("d-m-Y");
$now2 = date("d-m-Y", strtotime("-1 months, $now"));
$nowMonth = date('m', strtotime($now));
$nowYear = date('Y', strtotime($now));

// bulansekarang - 1 bulan
$bulanPeriode = $nowMonth;
$xx = date('m', strtotime("-1 Month"));
?>

id cust : <?= $cust['id_user']; ?><br>
nama : <?= $cust['nama']; ?><br>
<!-- bulan tagihan : <?= $cust['bulan_tagihan']; ?><br> -->
<hr>
awal ditambah 1 bulan: <?= $awal; ?><br>
awal(Bulan) : <?= $awalBulan; ?><br>
awal(Tahun) : <?= $awalTahun; ?><br>
<hr>
today : <?= $now; ?> <br>
today Month : <?= $nowMonth; ?> <br>
today Year : <?= $nowYear; ?> <br>
<br>
bulan periode : <?= $xx; ?>
<hr>
<?php
    // $query = mysqli_query($conn, "SELECT * FROM erp_payment WHERE id_customer = '$id_customer'");
    // $ada = mysqli_num_rows($query);
    // echo $ada;
?>
<!--  -->
  
<hr>

<?php
$start    = new DateTime($awal);
$start->modify('first day of this month');
$end      = new DateTime($now2);
$end->modify('first day of next month');
$interval = DateInterval::createFromDateString('1 month');
$period   = new DatePeriod($start, $interval, $end);

foreach ($period as $dt) {
    echo $dt->format("Y-m") . "<br>\n";
}
?>


<table class="table">
    <tr>
        <th>#</th>
        <th>Bulan Tagihan</th>
        <th>Tahun Tagihan</th>
        <th>Bayar</th>
    </tr>
    <?php
        $i = 1; 
        foreach ($period as $dt) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <?php 
                $periode = $dt->format("m");
            ?>
            <?= $periode; ?>
        </td>
        <td>
            <?php 
                $periodeT = $dt->format("Y");
            ?>
            <?= $periodeT; ?>
        </td>
        
            <?php
                $query = mysqli_query($conn, "SELECT * FROM erp_payment WHERE id_customer='$id_user' AND status_bayar = '2'");
                $cekData = mysqli_num_rows($query);
                while($hasil = mysqli_fetch_assoc($query)) {
            ?>
            <?php
                if($periode == $hasil['bulan_tagihan']) {
                    echo "<td>Sudah Bayar</td>";
                }
            ?>
            <?php } ?>
        
        <td>
        <!-- <?php
            // $query = mysqli_query($conn, "SELECT * FROM erp_payment WHERE id_customer='$id_user'");
            // $cekData = mysqli_num_rows($query);
            // if($cekData < 1) {
            //     echo "Belum Bayar";
            // }
            ?> -->
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
