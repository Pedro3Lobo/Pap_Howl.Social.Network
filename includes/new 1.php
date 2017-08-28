<?php
$var=0;
if($stmt = $mysqli->prepare("SELECT id_user FROM user_account")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_user);
	$num_rows = $stmt->num_rows;
	
	if($num_rows>0) {
	
		while ($stmt->fetch()) {
			$stmt = $mysqli->prepare("INSERT INTO notification VALUES (?,?,?)");
			$stmt->bind_param('isi',$var,$text,$id_user);
			$stmt->execute();
			//echo "$stmt->affected_rows resgistos inseridos";
			$stmt->close();
		}
	}
}
echo"<script> window.location='admin.php?page=show_tables'</script>";
?>
