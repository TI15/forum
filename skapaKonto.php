<?php
		$title = "Skapa konto";
		$webmaster ="Harald Liljedahl";
		include("header.php");
		if(isset($_POST['uname']) && isset($_POST['passw'])  && isset($_POST['namn']))  {
			include_once ("config.php");
			$un = htmlentities($_POST['uname']);
			$pw = htmlentities($_POST['passw']);
			$n = htmlentities($_POST['namn']);
			
			$pw = hasha($pw.$peppar);
			$sql = "insert into user values (0,?,?,?)";
			if($mysqli = connect_db()) {
				
				if($stmt = $mysqli->prepare($sql)) {
						
					$stmt->bind_param("sss", $un,$pw,$n);
					$stmt->execute();
					$stmt->close();
				}
				$mysqli->close();
				header("location:index.php?skapad");
			}
		}
		else {
			include("skapaKontoForm.php");
		}
		include("footer.php");
?>
	