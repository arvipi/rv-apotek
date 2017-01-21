<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Medicine / Drugs</h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
            <th data-field="Code">Code</th>
            <th data-field="Medicine Name">Medicine Name</th>
            <th data-field="Type">Type</th>
            <th data-field="Dosis">Dosis</th>
            <th data-field="Price">Price</th>
        </tr>
      </thead>
      <?php
              require_once 'config.php';

              $stmt = $db_con->prepare("SELECT * FROM Obat ORDER BY kodeobat ASC");
              $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC))
          {
            ?>
      <tbody>
        <tr>
          <td><?php echo $row['kodeobat']; ?></td>
          <td><?php echo $row['namaobat']; ?></td>
          <td><?php echo $row['jenisobat']; ?></td>
          <td><?php echo $row['takaranobat']; ?></td>
          <td><?php echo $row['hargaobat']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
  </div>
</div>
