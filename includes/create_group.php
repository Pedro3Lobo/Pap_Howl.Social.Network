<?php
$newfilename=null;
$var1="default.png";
$target_dir = "imagem/posts/";
$whatever=$_FILES["fileToUpload"]["name"];
//echo"$whatever";
if(isset($_FILES["fileToUpload"]["name"])){
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


	// Allow certain file formats

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		//echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
		$var1="default.jpeg";
	} else {
		$temp = explode(".", $_FILES["fileToUpload"]["name"]);
		$newfilename = round(microtime(true)) . '.' . end($temp);
		$filesname=$target_dir.$newfilename ;
		//echo"$newfilename";
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filesname) ;
		$var1=$newfilename;	
		
	}

}
	$nome=$_POST['nome'];
	$desc=$_POST['desc'];
	$type=$_POST['type'];
	$var=null;
	
	//echo"nome=$nome,descrição=$desc,tipo de grupo=$type,imagem=$var1";
	$sql=("INSERT INTO `group`(id_group,name,`desc`,type,group_img)VALUES('$var','$nome','$desc','$type','$var1')");
	
	
	if ($mysqli->query($sql) === TRUE) {
  //  echo "New record created successfully Yeah!!!!!!!!!!!";
	} else {
		echo "Error: " . $sql . "<br>" . $mysqli->error;
	}
	

	
	
	
	$id_group=null;
	if($stmt = $mysqli->prepare('SELECT MAX(group.id_group) FROM `group`')) {
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id_g);
		$num_rows = $stmt->num_rows;
		
		if($num_rows>0) {
			while ($stmt->fetch()) {
				$id_group=$id_g;
			}
		}
	}
	
	$sql1=("INSERT INTO `group_user_account`(id_group_user_account,member_type,id_group,id_user)VALUES('$var',2,'$id_group','$id')");
	
	//echo"<br>'$var',2,'$id_group','$id'";
	if ($mysqli->query($sql1) === TRUE) {
	echo "New record created successfully Yeah!!!!!!!!!!!";
	} else {
		echo "Error: " . $sql1 . "<br>" . $mysqli->error;
	}
	echo"<script> window.location='index.php?page=group'</script>";
?>