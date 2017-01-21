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
	        <li class="active"><a href="#">Medicine <span class="sr-only">(current)</span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

  <div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Input Medicine / Drugs</h3>
			</div>
			<div class="panel-body">
				<div id="dis"></div>
				<form method="post" enctype="multipart/form-data" class="form-horizontal" id="FormObat" action="#">
				    <div class="form-group">
				      <label for="inputKodeObat" class="col-lg-2 control-label">Code</label>
				      <div class="col-lg-10">
				        <input type="text" class="form-control" id="kodeobat" name="kodeobat" placeholder="Code">
				      </div>
				    </div>
						<div class="form-group">
							<label for="inputJenisObat" class="col-lg-2 control-label">Name</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="namaobat" name="namaobat" placeholder="Name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputJenisObat" class="col-lg-2 control-label">Type</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="jenisobat" name="jenisobat" placeholder="Type">
							</div>
						</div>
						<div class="form-group">
							<label for="inputTakaranDokter" class="col-lg-2 control-label">Dosis</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="takaranobat" name="takaranobat" placeholder="Dosis">
							</div>
						</div>
						<div class="form-group">
							<label for="inputHargaObat" class="col-lg-2 control-label">Price</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="hargaobat" name="hargaobat" placeholder="Price">
							</div>
						</div>
						<!-- <div class="form-group">
							<label for="inputImgObat" class="col-lg-2 control-label">Image</label>
							<div class="col-lg-10">
								<input type="file" class="form-control" id="imgobat" name="imgobat" accept="image/*" />
							</div>
						</div> -->
				    <div class="form-group">
				      <div class="col-lg-10 col-lg-offset-2">
				        <button type="reset" class="btn btn-default">Cancel</button>
				        <button type="submit" class="btn btn-primary">Submit</button>
				      </div>
				    </div>
				</form>
			</div>
		</div>
		<div id="panel">
			<?php include 'tampilobat.php'; ?>
		</div>
</div>
</div>
  </div>

  <script type="text/javascript" src="crud.js"></script>
</body>
</html>
