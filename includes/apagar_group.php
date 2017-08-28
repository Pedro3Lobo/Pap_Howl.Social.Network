<?php
$var=$_GET['group'];
if($stmt = $mysqli->prepare("SELECT `group`.`id_group` FROM `group_user_account`,`group` WHERE `group`.id_group=$var AND group_user_account.id_user=$id AND group_user_account.member_type=2")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_group);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {
		while ($stmt->fetch()) {

			$stmt1 = $mysqli->prepare("DELETE  FROM group_user_account WHERE id_group=? ");
			$stmt1->bind_param('s', $var);
			$stmt1->execute(); 
			$stmt1->close();

			$stmt1 = $mysqli->prepare("DELETE  FROM `group` WHERE id_group=?");
			$stmt1->bind_param('s', $var);
			$stmt1->execute(); 
			$stmt1->close();
	}
		$stmt->close();	
	}
}



echo"<script> window.location='index.php?page=group'</script>";
?>