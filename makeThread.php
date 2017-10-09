<?php
	if(session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	//session_start();
	if(isset($_SESSION['id'])) {
		$title= "skapa tråd";
		$webmaster = "Harald Liljedahl";
		include("header.php");
		echo "<header><h1>Skapa tråd</h1></header>";
		if(isset($_POST['heading']) && isset($_POST['content']) && isset($_POST['cid'])) {
			include_once("config.php");
			$h = htmlentities($_POST['heading']);
			$c = htmlentities($_POST['content']);
			$uid = htmlentities($_SESSION['id']);
			$cid = htmlentities($_POST['cid']);
			if($con = connect_db()) {
				$sql1 = "insert into thread values (0,?,?,?)";
				$sql2 = "insert into belong values ((select tid from thread order by tid desc limit 1),?)";
				if($stmt = $con->prepare($sql1)) {
					$stmt->bind_param("ssi", $h,$c,$uid);
					$stmt->execute();
					$stmt->close();
				}
				if($stmt = $con->prepare($sql2)) {
					$stmt->bind_param("i",$cid);
					$stmt->execute();
					$stmt->close();
				}
				$con->close();
				header("location:forum.php");
				//echo "klart";
			}
		}
		else {
			include("makeThreadForm.php");
		}
	}
	else {
		header("location:index.php");
	}
?>
	

<?php
	include("footer.php");
?>