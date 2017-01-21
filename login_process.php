<?php
	session_start();
	require_once 'config.php';

	if(isset($_POST['btn-login']))
	{
		$username = $_POST['username'];
		$password = trim($_POST['password']);

		$password = md5($password);

		try
		{

			$stmt = $db_con->prepare("SELECT * FROM Petugas WHERE userpetugas=:username");
			$stmt->execute(array(":username"=>$username));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();

			if($row['passpetugas']==$password){

				echo "ok"; // log in
				$_SESSION['user_session'] = $row['kodepetugas'];
			}
			else{

				echo "username or password does not exist"; // wrong details
			}

		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>
