<?php
		if(isset($_GET['group'])){
			$group=$_GET['group'];
			
		}else{
			echo"<script> window.location='index.php?page=404'</script>";
		}
		$like_post=$_GET['post'];
		$page_to_send=$_GET['pages_where'];
		
		$sql = "SELECT id_like_group, id_user,id_post_group FROM `like_group` WHERE id_post_group=$like_post AND id_user=$id ";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
		 
		 // output data of each row
			while($row = $result->fetch_assoc()) {
				
				if($id==$row['id_user']){
					$sql1=("DELETE  FROM `like_group` WHERE id_post_group=$like_post AND id_user=$id");
					//echo"<br>'$var',2,'$id_group','$id'";
					if ($mysqli->query($sql1) === TRUE) {
					//echo "New record created successfully Yeah!!!!!!!!!!!";
					} else {
						//echo "Error: " . $sql1 . "<br>" . $mysqli->error;
					}
				}
			}
		 
		}else{
			$sql1=("INSERT INTO `like_group`(id_like_group,`id_user`,id_post_group)VALUES('','$id','$like_post')");
			//echo"<br>'$var',2,'$id_group','$id'";
			if ($mysqli->query($sql1) === TRUE) {
			//echo "New record created successfully Yeah!!!!!!!!!!!";
			} else {
				//echo "Error: " . $sql1 . "<br>" . $mysqli->error;
			}
		}
		
			echo"<script> window.location='index.php?page=$page_to_send&group=$group#$like_post'</script>";
		
		
	  
?>