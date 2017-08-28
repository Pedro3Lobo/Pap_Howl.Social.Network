<?php
$var=$_GET['friend'];

if($stmt = $mysqli->prepare("SELECT `friend_user_account`.`id_friend` FROM `friend_user_account`,friend WHERE `friend`.id_user=$id  AND friend_user_account.id_user=$var")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_group);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {
		while ($stmt->fetch()) {
			//echo"pedro";
			$stmt1 = $mysqli->prepare("DELETE  FROM friend_user_account WHERE id_friend=? AND id_user=?");
			$stmt1->bind_param('ss', $var_friend,$var);
			$stmt1->execute(); 
			$stmt1->close();
			
			

	}
		$stmt->close();	
	}
}
//echo"$var_friend, $var, $id";
if($stmt = $mysqli->prepare("SELECT `friend_user_account`.`id_friend` FROM `friend_user_account`,friend WHERE `friend`.id_user=$var  AND friend_user_account.id_user=$id ")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_friend);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {
		while ($stmt->fetch()) {

			
			//echo"pedro $id_friend";
			$stmt2 = $mysqli->prepare("DELETE  FROM friend_user_account  WHERE id_friend=? AND id_user=?");
			$stmt2->bind_param('ss', $id_friend,$id);
			$stmt2->execute(); 
			$stmt2->close();

	}
		$stmt->close();	
	}
}

if(isset($_GET['var'])){
	echo"<script> window.location='index.php?page=friends'</script>";
}else{
	echo"<script> window.location='index.php?page=profile_group&group=$var'</script>";
}
?>