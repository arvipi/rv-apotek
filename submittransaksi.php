<?php
require_once 'config.php';

	if($_POST)
	{
		$kodeobat = $_POST['kodeobat'];
		$namaobat = $_POST['namaobat'];
		$tanggal = $_POST['tanggal'];
		$namadokter = $_POST['namadokter'];
		$jumlahobat = $_POST['jumlahobat'];
		$biaya = $_POST['biaya'];

		try{

			$stmt = $db_con->prepare("INSERT INTO Transaksi(kodeobat,namaobat,tanggal,namadokter,jumlahobat,biaya) VALUES(:akodeobat, :anamaobat, :atanggal, :anamadokter,:ajumlahobat, :abiaya)");
			$stmt->bindParam(":akodeobat", $kodeobat);
			$stmt->bindParam(":anamaobat", $namaobat);
			$stmt->bindParam(":atanggal", $tanggal);
			$stmt->bindParam(":anamadokter", $namadokter);
			$stmt->bindParam(":ajumlahobat", $jumlahobat);
			$stmt->bindParam(":abiaya", $biaya);

			if($stmt->execute())
			{
				echo "Input Data Success";
 			}
			else{
				echo "Failed To Input Data";
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>
