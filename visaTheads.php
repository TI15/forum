<section id="threads">
<?php
	$cid = "all";
	if(isset($_GET['cid'])) {
		$cid = htmlentities($_GET['cid']);
	}
	include_once("config.php");
	if($con = connect_db()) {
		if($cid == "all") {
			$sql = "select tid, heading, content uname from thread,user where thread.uid = user.id order by tid desc limit 10";
			if($stmt = $con->prepare($sql)) {
				$stmt->execute();
				$stmt->bind_result($tid,$heading,$content,$uname);
				while($stmt-fetch()) {
					echo "<h3>$heading</h3>";
					echo "<p>$content</p>";
					echo "<p>skapad av: $uname</p>";
					echo "<p><a href='svara.php?tid=$tid'>svara på tråd</a></p>";
					echo "<hr>";
				}
				$stmt->close();
			}
		}


		else {
			$sql = "select thread.tid, heading, content uname from thread,user, belong where thread.uid = user.id and belong.tid = thread.tid and belong.cid = ? order by thread.tid desc";
			if($stmt->prepare($sql)) {
				$stmt->bind_param("i",$cid);
				$stmt->execute();
				$stmt->bind_result($tid,$heading,$content,$uname);
				while($stmt->fetch()) {
					echo "<h3>$heading</h3>";
					echo "<p>$content</p>";
					echo "<p>skapad av: $uname</p>";
					echo "<p><a href='svara.php?tid=$tid'>svara på tråd</a></p>";
					echo "<hr>";
				}
			}
		}
	}	
	

?>

</section>