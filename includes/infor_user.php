<?php

	if(isset($_FILES["fileToUpload"]["name"])){
		$target_dir = "imagem/posts/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				//echo "File is not an image.";
				$uploadOk = 0;
			}
		}


		// Check if file already exists
		if (file_exists($target_file)) {
			//echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			//echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			$temp = explode(".", $_FILES["fileToUpload"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			$filesname=$target_dir.$newfilename ;
			//echo"$newfilename";
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filesname) ;
			$var1=$newfilename;	
			
		}

	}
			
			if($uploadOk==0){
				if($stmt = $mysqli->prepare('SELECT quote,user_image FROM user_account WHERE id_user='.$id.'')) {
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($quote2,$user_img_page);
					$num_rows = $stmt->num_rows;
					
					if($num_rows>0) {
						while ($stmt->fetch()){ 
								$var1= $user_img_page;
						}	
					}
				}		
			}else if($uploadOk!=0){
				$var1=$filesname;
				
			}

			$var=null;
			$texto=null;
			
			if(isset($_POST['text'])){
				$texto=$_POST['text'];
				//echo"<p>entra $texto</p>";
			}
			if(isset($_POST['privaci'])){
				$privaci=$_POST['privaci'];
				//echo"<p>entra $privaci</p>";
			}
			$quote=$_POST['quote'];
			$edu=$_POST['edu'];
			$local=$_POST['local'];
			$notas=$_POST['notas'];
			//echo"$quote,$edu,$local,$notas,$var1";
		$sql2=("UPDATE user_account SET quote ='$quote' ,educacion='$edu',localization='$local',notes='$notas',user_image='$var1' WHERE user_account.id_user =$id");
			$stmp2 = $mysqli->prepare($sql2);
			$stmp2->execute();
			
			if($stmt = $mysqli->prepare('SELECT quote,user_image FROM user_account WHERE id_user='.$id.'')) {

			
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($quote2,$user_img_page);
			$num_rows = $stmt->num_rows;
			
			if($num_rows>0) {
				while ($stmt->fetch()) {
						$_SESSION['var_quote'] = $quote2;
						$_SESSION['var_img'] = $user_img_page;
					}
					
				}
			}
			
				
		
			
		echo"<script> window.location='index.php?page=profile'</script>";


?>