<?php
	$title="Inlogg";
	$webmaster ="Harald Liljedahl";
	include("header.php");
	if(isset($_GET['fel'])) {
		$fel = $_GET['fel'];
		if($fel == 1)
			echo "<p>Du måste ange både användarnamn och lösenord för att logga in</p>";
		if($fel == 2)
			echo "<p>Fel användarnamn eller lösenord!</p>";
	}
	if(isset($_GET['skapad'])) {
		echo "<p>konot skapat var god logga in</p>";
	}
	
?>
		<h1>Logga in till hemliga sida</h1>
		<form action="checkInlogg.php" method="post">
			<table>
				<tr><td>Användarnamn:</td><td><input type="text" name="uname"></td></tr>
				<tr><td>Lösenord:</td><td><input type="password" name="passw"></td></tr>
				<tr><td colspan="2"><input type="submit" value="Logga in"></td></tr>
			</table>
		</form>
		<p>För att skapa ett konto tryck <a href="skapaKonto.php">här</a></p>
<?php
	include("footer.php");
?>