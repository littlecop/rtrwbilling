
<link rel="stylesheet" href="./css/reportPayment.css">
<link rel="stylesheet" href="./css/customer.css">
<div class="menu">
    <button type="button" class="btn btn-info btn-sm"><i class="fa fa-user" aria-hidden="true"></i> Report Pembayaran</button>
    <a href="" class="link-menu badge bg-success" data-bs-toggle="modal" data-bs-target="#approvePayment">Menu 1</a>
    <a href="" class="link-menu badge bg-danger" data-bs-toggle="modal" data-bs-target="#rejectPayment">Menu 2</a>
</div>
<?php 
if($_SESSION['id_role'] == '94868ac6-258e-11ef-916f-9009dfabca9c') {
?>
<table class="table">
    <tr>
        <th>No</th>
        <th>nama</th>
        <th>tgl awal</th>
        <th>tgl akhir</th>
        <th>Status</th>
    </tr>
    <?php
        $i = 1;
        $query = mysqli_query($conn, "SELECT * FROM erp_customer WHERE status_berlangganan ='1'");
        while($cust = mysqli_fetch_assoc($query)) {
    ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $cust['nama']; ?></td>
        <td><?= $cust['awal']; ?></td>
        <td></td>
        <?php
            $query2 = mysqli_query($conn, "SELECT * FROM erp_payment WHERE id_customer='$cust[id_user]'");
            $hasil = mysqli_num_rows($query2);
        ?>
        <?php if($hasil < 1) {
            echo "<td><form action='./?page=lihatTunggakan' method='post' target='_blank'>
                <input type='hidden' name='id_user' value='$cust[id_user]'>
                <button type='submit'>Show</button>
            </form></td>";
        }else{
            echo "<td><form action='./?page=lihatTunggakan' method='post' target='_blank'>
                <input type='hidden' name='id_user' value='$cust[id_user]'>
                <button type='submit'>Lihat</button>
            </form></td>";
        }
        
        ?>
    </tr>
    <?php $i++; ?>
    <?php } ?>
</table>
<hr>
<input type="text" id="id_type" />
<input type="text" id="event_category" />
<input type="text" id="description" />
<table id="example" class="table" style="width:100%">
        <thead>
            <tr onclick="callme(this)">
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        $query = mysqli_query($conn, "SELECT * FROM erp_customer WHERE status_berlangganan ='1'");
        while($cust = mysqli_fetch_assoc($query)) {
        ?>
            <tr onclick="callme(this)">
                <td><?= $i; ?></td>
                <td><?= $cust['nama']; ?></td>
                <td><?= $cust['awal']; ?></td>
                <td>61</td>
                <td>2011-04-25</td>
                <?php
            $query2 = mysqli_query($conn, "SELECT * FROM erp_payment WHERE id_customer='$cust[id_user]'");
            $hasil = mysqli_num_rows($query2);
        ?>
        <?php if($hasil < 1) {
            echo "<td><form action='./?page=lihatTunggakan' method='post' target='_blank'>
                <input type='hidden' name='id_user' value='$cust[id_user]'>
                <button type='submit'>Show</button>
            </form></td>";
        }else{
            echo "<td><form action='./?page=lihatTunggakan' method='post' target='_blank'>
                <input type='hidden' name='id_user' value='$cust[id_user]'>
                <button type='submit'>Lihat</button>
            </form></td>";
        }
        
        ?>
            </tr>
            <?php $i++; ?>
             <?php } ?>
        </tbody>
        <tfoot>
            <tr onclick="callme(this)">
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
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
  document.getElementById("id_type").value = tds[0].innerHTML.trim();
  document.getElementById("event_category").value = tds[1].innerHTML.trim();
  document.getElementById("description").value = tds[2].innerHTML.trim();

}
    </script>
    <script>
        new DataTable('#example', {
            scrollX:true,
    initComplete: function () {
        this.api()
            .columns()
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
<?php } else {
?>

<?php
$id_user = $_SESSION['id_user'];
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
        <th>ea</th>
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
        <td>
            <?php
                $query = mysqli_query($conn, "SELECT * FROM erp_payment WHERE id_customer='$id_user'");
                $cekData = mysqli_num_rows($query);
                $belum = "Belum Bayar";
                $sudah = "Sudah Bayar";
                while($hasil = mysqli_fetch_assoc($query)) {
            ?>
            <?php
                if($periode == $hasil['bulan_tagihan']) {
                    echo "$sudah";
                }else{
                    echo "$belum";
                }
            ?>
            <?php } ?>
        </td>
        <td>
        <?php
            $query = mysqli_query($conn, "SELECT * FROM erp_payment WHERE id_customer='$id_user'");
            $cekData = mysqli_num_rows($query);
            $belum = "Belum Bayar";
            $sudah = "Sudah Bayar";
            if($cekData < 1) {
                echo "$belum";
            }else{
                echo "-";
            }
            ?>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
<?php
$date1 = $start;
$date2 = $end; 
$interval = date_diff($date1, $date2); 
$seharusnya = $interval->m; 
echo "$seharusnya";

?>

<?php
$query3 = mysqli_query($conn, "SELECT * FROM erp_payment WHERE id_customer='$_SESSION[id_user]'");
$hasilHitung = mysqli_num_rows($query3);

echo $hasilHitung;
?><br>


jumlah pembayran seharusnya ada <?= $seharusnya; ?> Kali <br>
namun pembayaran yang sudah dilakukan ada <?= $hasilHitung; ?> Kali <br>

<?php
if($hasilHitung < $seharusnya) {
    echo "<span class='badge bg-danger'>Anda Masih Punya Tunggakan Pembayaran</span>";
}else {
    echo "";
}
?>
<?php } ?>

