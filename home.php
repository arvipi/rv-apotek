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
  <title>Transaction - Apotek</title>

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
	        <li class="active"><a href="#">Transaction <span class="sr-only">(current)</span></a></li>
	        <li><a href="obat.php">Medicine</a></li>
					<li><a href="penjualan.php">Sales</a></li>
					<li><a href="contact.php">Contact</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

  <div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Input Transaction</h3>
			</div>
			<div class="panel-body">
				<div id="dis"></div>
				<?php
								require_once 'config.php';

								$stmt = $db_con->prepare("SELECT * FROM Obat");
								$stmt->execute();
								$option = "";
								$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
								foreach ($result as $obat) {
								    $id = $obat['kodeobat'];
								    $option.='<option value="'.$id.'">'.$id.'</option>';
								}
								?>
				<form method=post class="form-horizontal" id="FormTransaksi">
				    <div class="form-group">
							<!-- <input type="hidden" class="form-control" id="id" name="id" > -->
							<label for="select" class="col-lg-2 control-label">Medicine's Code</label>
				      <div class="col-lg-10">
				        <select class="form-control" id="kodeobat" name="kodeobat" style="height:auto" autofocus>
									<option>Choose Medicine's Code</option>
				          <?php echo $option ?>
				        </select>
							</div>
				    </div>
						<div class="form-group">
							<label for="inputTanggal" class="col-lg-2 control-label">Date</label>
							<div class="col-lg-10">
								<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Date">
							</div>
						</div>
						<div class="form-group">
							<label for="inputNamaDokter" class="col-lg-2 control-label">Doctor</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="namadokter" name="namadokter" placeholder="Doctor">
							</div>
						</div>
						<div class="form-group">
							<label for="inputJumalahObat" class="col-lg-2 control-label">Pieces</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="jumlahobat" name="jumlahobat" placeholder="Pieces">
							</div>
						</div>
						<div class="form-group">
							<label for="inputBiaya" class="col-lg-2 control-label">Total</label>
							<div class="col-lg-10">
								<input type="hidden" id="namaobat" name="namaobat" />
								<input type="hidden" id="hargaobat" disabled="disabled" />
								<input type="text" class="form-control" id="biaya" name="biaya" />
								<!-- <div id="biaya"></div> -->
							</div>
						</div>
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
			<?php include 'tampiltransaksi.php'; ?>
		</div>
</div>
</div>
  </div>

	<script type="text/javascript" src="crud.js"></script>
	<script>
	$(document).ready(function() {

		$('#kodeobat').on('change',function(){
			var kodeobat = $(this).val();

				if (kodeobat == ""){
			    $("#hargaobat").val("");
					$("#namaobat").val("");
			  } else {
					$.ajax({
						type: "POST",
						data: { 'kodeobat': kodeobat },
						dataType: "json",
						url: "getdata.php",
						success: function(json) {
							alert(json);
							$("#hargaobat").val(json["hargaobat"]);
							$("#namaobat").val(json["namaobat"]);
						}
					});
			  }
			});

			$('#jumlahobat').change(function() {
			    $('#biaya').val($(this).val() * $('#hargaobat').val() + ($('#hargaobat').val() * 0.15));
			});

		});


	</script>
</body>
</html>
