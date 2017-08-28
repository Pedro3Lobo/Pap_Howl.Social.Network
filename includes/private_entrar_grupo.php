<?php
$id_group=$_GET['group'];
$user=$_GET['user'];

$var=null;
$var_verify=null;
$name_group=null;

if($stmt = $mysqli->prepare("SELECT  name FROM `group` WHERE  group.id_group=$id_group ")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($name_group);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {

		while ($stmt->fetch()) {
			//echo"ola";
			
		}
		$stmt->close();			
	}		
		
}


if($stmt = $mysqli->prepare("SELECT  id_group FROM `group_user_account` WHERE  group_user_account.id_user=$user AND id_group=$id_group")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_group2);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {

		while ($stmt->fetch()) {
			//echo"ola";
			$var_verify=234324234234324;
		}
		$stmt->close();			
	}		
		
}
 if($var_verify==null){
	
	$sql1=("INSERT INTO `group_user_account`(id_group_user_account,member_type,id_group,id_user)VALUES('$var',1,'$id_group','$user')");
				
		//echo"<br>'$var',2,'$id_group','$id'";
		if ($mysqli->query($sql1) === TRUE) {
			echo "New record created successfully Yeah!!!!!!!!!!!";
			$sql=("INSERT INTO `notification` (`id_notification`, `text`, `id_user`) VALUES (NULL, '<td>Foste Aceite No Grupo:$name_group</td>', '$user')");
			$stmp2 = $mysqli->prepare($sql);
			$stmp2->execute();
				echo "$stmp2->affected_rows resgistos inseridos";
			//echo"$group=$group_name       $text  $admin";
		} else {
			echo "Error: " . $sql1 . "<br>" . $mysqli->error;
		}			
}
	
echo"<script> window.location='index.php?page=notificarion'</script>";
?>