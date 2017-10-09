<form method="POST">
	<table>
		<tr><td>rubrik:</td><td><input type="text" name="heading"></td></tr>
		<tr><td>innehåll:</td><td><textarea name="content"></textarea></td></tr>
		<tr><td>kategori:</td><td>
			<select name="cid">
			<?php
				include_once("config.php");
				if($con = connect_db()) {
					$sql = "select cid, name from category";
					if($stmt = $con->prepare($sql)) {
						$stmt->execute();
						$stmt->bind_result($cid,$name);
						while($stmt->fetch()) {
							echo "<option value='$cid'>$name</option>";
 						}
 						$stmt->close();
					}
					$con->close();
				}
			?>
			</select>
		</td></tr>
		<tr><td  colspan="2"><input type="submit" name="sub" value="Lägg till"></td></tr>
	</table>


</form>