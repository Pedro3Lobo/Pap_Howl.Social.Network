<?php
 
		$like_post=$_GET['post'];
		$page_to_send=$_GET['pages_where'];
		
		$sql = "SELECT id_like, id_user,id_post FROM `like` WHERE id_post=$like_post AND id_user=$id ";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
		 
		 // output data of each row
			while($row = $result->fetch_assoc()) {
				
				if($id==$row['id_user']){
					$sql1=("DELETE  FROM `like` WHERE id_post=$like_post AND id_user=$id");
					//echo"<br>'$var',2,'$id_group','$id'";
					if ($mysqli->query($sql1) === TRUE) {
					//echo "New record created successfully Yeah!!!!!!!!!!!";
					} else {
						//echo "Error: " . $sql1 . "<br>" . $mysqli->error;
					}
				}
			}
		 
		}else{
			$sql1=("INSERT INTO `like`(id_like,`id_user`,id_post)VALUES('','$id','$like_post')");
			//echo"<br>'$var',2,'$id_group','$id'";
			if ($mysqli->query($sql1) === TRUE) {
			//echo "New record created successfully Yeah!!!!!!!!!!!";
			} else {
				//echo "Error: " . $sql1 . "<br>" . $mysqli->error;
			}
		}
		
		if(isset($_GET['friend'])){
			$friend=$_GET['friend'];
			//echo"index.php?page=$page_to_send&friend=$friend#$like_post";
			echo"<script> window.location='index.php?page=$page_to_send&friend=$friend#$like_post'</script>";
		}else{
			echo"<script> window.location='index.php?page=$page_to_send#$like_post'</script>";
		}
		
	  
?>