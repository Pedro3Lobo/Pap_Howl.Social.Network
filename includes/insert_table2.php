<?php
$var=0;
$text="<td>".$_POST['mensagem']."</td>";
if($stmt1 = $mysqli->prepare("SELECT DISTINCT id_user FROM user_account")) {
	$stmt1->execute();
	$stmt1->store_result();
	$stmt1->bind_result($id_user);
	$num_rows = $stmt1->num_rows;
	
	if($num_rows>0) {
	
		while ($stmt1->fetch()) {
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
