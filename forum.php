<?php
	if(session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	$title = "Forum";
	$webmaster = "Harald Liljedahl";
	if(isset($_SESSION['id']) && isset($_SESSION['uname']) && isset($_SESSION['name'])) {
		//forum
		include("header.php");
		include("forumTop.php");
		include("kategorier.php");
		include("user.php");
		include("showThreads.php");
		echo "<p><a href='makeThread.php'>Skapa Tråd</a></p>";
		//include("makeThread.php");

		

		include ("footer.php");
	}
	else {
		header("location:index.php");
	}
	
?>