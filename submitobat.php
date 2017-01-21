<?php
require_once 'config.php';

	if($_POST)
	{
		$kodeobat = $_POST['kodeobat'];
		$namaobat = $_POST['namaobat'];
		$jenisobat = $_POST['jenisobat'];
		$takaranobat = $_POST['takaranobat'];
		$hargaobat = $_POST['hargaobat'];

		try{

			$stmt = $db_con->prepare("INSERT INTO Obat(kodeobat,namaobat,jenisobat,takaranobat,hargaobat) VALUES(:akodeobat, :anamaobat, :ajenisobat, :atakaranobat,:ahargaobat)");
			$stmt->bindParam(":akodeobat", $kodeobat);
			$stmt->bindParam(":anamaobat", $namaobat);
			$stmt->bindParam(":ajenisobat", $jenisobat);
			$stmt->bindParam(":atakaranobat", $takaranobat);
			$stmt->bindParam(":ahargaobat", $hargaobat);

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
