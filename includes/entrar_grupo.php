<?php
$id_group=$_GET['group'];
$var=null;
$var_verify=null;
if($stmt = $mysqli->prepare("SELECT  id_group FROM `group_user_account` WHERE  group_user_account.id_user=$id AND id_group=$id_group")) {
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
	
	$sql1=("INSERT INTO `group_user_account`(id_group_user_account,member_type,id_group,id_user)VALUES('$var',1,'$id_group','$id')");
				
		//echo"<br>'$var',2,'$id_group','$id'";
		if ($mysqli->query($sql1) === TRUE) {
	  //  echo "New record created successfully Yeah!!!!!!!!!!!";
		} else {
			echo "Error: " . $sql1 . "<br>" . $mysqli->error;
		}			
}	
	echo"<script> window.location='index.php?page=group'</script>";
?>