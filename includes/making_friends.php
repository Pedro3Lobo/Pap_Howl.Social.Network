<?php
if(isset($_GET['friend'])){
		$var_person_id=$_GET['friend'];
}else{
		echo"<script> window.location='index.php?page=404'</script>";
}
$var=null;
$var1=null;
$var2='2';
$friend=null;

// First row  of friends
if($stmt = $mysqli->prepare("SELECT id_friend FROM friend WHERE friend.id_user=$var_person_id")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_friend);
	$num_rows = $stmt->num_rows;
		
	if($num_rows>0) {
		while ($stmt->fetch()) {
			$friend=$id_friend;
		}
	}
}
		
$stmt = $mysqli->prepare('INSERT INTO friend_user_account VALUE(?,?,?,?)') ;
$stmt->bind_param('iiii',$var,$var2,$friend,$id);
$stmt->execute();
//echo "$stmt->affected_rows resgistos inseridos";
$stmt->close();
		
// Second row of friends 
if($stmt = $mysqli->prepare("SELECT id_friend FROM friend WHERE friend.id_user=$id")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_friend);
	$num_rows = $stmt->num_rows;
		
	if($num_rows>0) {
		while ($stmt->fetch()) {
			$friend=$id_friend;
		}
	}
}
	
$stmt = $mysqli->prepare('INSERT INTO friend_user_account VALUE(?,?,?,?)') ;
$stmt->bind_param('iiii',$var,$var2,$friend,$var_person_id);
$stmt->execute();
//echo "$stmt->affected_rows resgistos inseridos";
$stmt->close();

echo"<script> window.location='index.php?page=profile_friend&friend=$var_person_id'</script>";
?>