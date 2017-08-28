<?php
$var=$_GET['friend'];

if($stmt = $mysqli->prepare("SELECT `friend_user_account`.`id_friend` FROM `friend_user_account`,friend WHERE `friend`.id_user=$id  AND friend_user_account.id_user=$var")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_group);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {
		while ($stmt->fetch()) {
			
			$stmt2 = $mysqli->prepare("UPDATE friend_user_account SET friend_user_account.friend_state =3 WHERE friend_user_account.id_user =? AND `friend_user_account`.id_friend=?");
			$stmt2->bind_param("ss", $var, $var_friend);
			$stmt2->execute();
			
			

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
			
			$stmt2 = $mysqli->prepare("UPDATE friend_user_account SET friend_user_account.friend_state =3 WHERE friend_user_account.id_user =? AND `friend_user_account`.id_friend=?");
			$stmt2->bind_param("ss", $id, $id_friend);
			$stmt2->execute();
			
			

	}
		$stmt->close();	
	}
}

if(isset($_GET['var'])){
	echo"<script> window.location='index.php?page=friends'</script>";
}else{
	echo"<script> window.location='index.php?page=profile_friend&friend=$var'</script>";
}
?>