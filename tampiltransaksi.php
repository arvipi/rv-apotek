<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Transaction</h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
            <th data-field="Medicine's Name">Medicine's Name</th>
            <th data-field="Date">Date</th>
            <th data-field="Doctor">Doctor</th>
            <th data-field="Pieces">Pieces</th>
            <th data-field="Total">Total</th>
        </tr>
      </thead>
      <?php
              require_once 'config.php';

              $stmt = $db_con->prepare("SELECT * FROM Transaksi ORDER BY id ASC");
              $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC))
          {
            ?>
      <tbody>
        <tr>
          <td><?php echo $row['namaobat']; ?></td>
          <td><?php echo $row['tanggal']; ?></td>
          <td><?php echo $row['namadokter']; ?></td>
          <td><?php echo $row['jumlahobat']; ?></td>
          <td><?php echo $row['biaya']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
  </div>
</div>
