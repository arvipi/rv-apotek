<?php
require_once 'config.php';

$kodeobat = $_POST['kodeobat'];
$stmt = $db_con->prepare("SELECT kodeobat, namaobat, hargaobat FROM Obat WHERE kodeobat='".$kodeobat."'");
$stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
 if($kodeobat == $row['kodeobat']){
   /*<input type="text" id="hargaobat" value="<?php echo $hargaobat; ?>" disabled="disabled" />*/
   echo json_encode($row);
 }
} ?>
