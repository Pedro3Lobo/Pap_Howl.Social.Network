<?php
$stat=$_GET['stat'];
$id_user1=$_GET['user'];

$sql = "SELECT  id_user2 FROM `stat` WHERE id_user2=$id AND id_user=$id_user1 ";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
		 
		 // output data of each row
			while($row = $result->fetch_assoc()) {
				
				
					$sql1=("UPDATE `stat` SET stats=$stat WHERE id_user=$id_user1 AND id_user2=$id");
					//echo"<br>'$var',2,'$id_group','$id'";
					if ($mysqli->query($sql1) === TRUE) {
					//echo "New record created successfully Yeah!!!!!!!!!!!";
					} else {
						//echo "Error: " . $sql1 . "<br>" . $mysqli->error;
					}
				
			}
		 
		}else{
			$sql1=("INSERT INTO `stat`(id_person_type,stats,id_user,id_user2)VALUES('','$stat','$id_user1','$id')");
			//echo"<br>'$var',2,'$id_group','$id'";
			if ($mysqli->query($sql1) === TRUE) {
				echo "New record created successfully Yeah!!!!!!!!!!!";
			} else {
				echo "Error: " . $sql1 . "<br>" . $mysqli->error;
			}
		}
		echo"<script> window.location='index.php?page=profile_friend&friend=$id_user1#stat'</script>";
?>