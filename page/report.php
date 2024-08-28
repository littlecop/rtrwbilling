<div class="container">
  <div class="row">
    <div class="col">
      Column
    </div>
    <div class="col">
      Column
    </div>
    <div class="col">
      Column
    </div>
  </div>
</div>
<table id="example" class="table" style="width:100%">
        <thead>
            <tr class="judultable">
                <th>#</th>
                <th>ID Customer</th>
                <th>Nama</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $query = mysqli_query($conn, "SELECT id_user as id, nama as nama FROM erp_customer WHERE status_berlangganan = '1'");
                while($report = mysqli_fetch_assoc($query)) {
            ?>
            <tr class="pendek">
                <td><center><?= $i; ?></center></td>
                <td><input type="text" class="tempatid" value="<?= $report['id']; ?>"></td>
                <td><?= $report['nama']; ?></td>
                <td>

                    <?php
                        $cekPembayaran = mysqli_query($conn, "SELECT * FROM erp_payment WHERE id_customer = '$report[id]'");
                        if(mysqli_num_rows($cekPembayaran) > 0 ) {
                            echo "Sudah bayar";
                        }else {
                            echo "belum Bayar";
                        }
                    ?>


                </td>
            </tr>
            <?php $i++; ?>
            <?php } ?>
        </tbody>
    </table>
    <script>
        new DataTable('#example', {
            pageLength: 50,
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