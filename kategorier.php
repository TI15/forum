<?php
	include_once("config.php");
	if($con = connect_db()) {
		$sql= "select cid, name from category";
		echo "<h2>Kategorier</h2><ul>";

		if($stmt = $con->prepare($sql)) {
			$stmt->execute();
			$stmt->bind_result($cid, $cname);
			while($stmt->fetch()) {
				echo "<li><a href='showThreads.php?cid=$cid'>$cname</a></li>";
			}
		}
		echo "</ul>";

	}

?>