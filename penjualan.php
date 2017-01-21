<?php
session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: index.php");
}

include_once 'config.php';

$stmt = $db_con->prepare("SELECT * FROM Petugas WHERE kodepetugas=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Medicine - Apotek</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
	<link rel="stylesheet" href="https://bootswatch.com/lumen/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="jquery-2.2.4.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Apotek</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="home.php">Transaction</a></li>
	        <li><a href="obat.php">Medicine</a></li>
					<li class="active"><a href="#">Sales <span class="sr-only">(current)</span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

  <div class="container">
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Sales</h3>
	  </div>
	  <div class="panel-body">
	    <table class="table table-striped table-hover ">
	      <thead>
	        <tr>
	            <th data-field="Transaction ID">Transaction ID</th>
	            <th data-field="Profit">Profit</th>
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
	          <td><?php echo $row['id']; ?></td>
	          <td>15%</td>
	          <td><?php echo $row['biaya']; ?></td>
	        </tr>
	      </tbody>
	      <?php } ?>
				<tfooter>
					<tr>
						<td></td>
						<td></td>
						<td><?php echo count($row['biaya']); ?></td>
				</tfooter>
	    </table>
	  </div>
	</div>

  </div>

  <script type="text/javascript" src="crud.js"></script>
</body>
</html>
