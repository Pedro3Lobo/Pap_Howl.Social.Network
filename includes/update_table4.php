<?php
$user=$_POST['user'];
$var=$_GET['id'];

$text= $_POST['text'];
$privacy=$_POST['privaci'];
$data=date("Y-m-d h:i:sa");
if(isset($_POST['fileToUpload'])){
	$uploadOk=0;
	$sql_code="UPDATE `post` SET `post` = '$post',text='$text',data='$data', privacy='$privacy' WHERE `post`.`id_post` = $var";
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


		
		
		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {	
			$temp = explode(".", $_FILES["fileToUpload"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			$filesname=$target_dir.$newfilename ;
			//echo"$target_file, $target_dir ";
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filesname) ;
			$var1=$newfilename;	
		}

	}
			
			if($uploadOk==0){
				$var1=null;
				//echo"what now 1 ".date("Y-m-d h:i:sa");
			}
			if($uploadOk!=0){
				if($target_file!="imagem/posts/"){
					$var_infinite=basename($_FILES["fileToUpload"]["name"]);
					$var1="imagem/posts/$newfilename";
					//echo"what now 2 $var1".date("Y-m-d h:i:sa");
				}else{
					$var1=null;
				}
			}
}else{
	if($stmt3 = $mysqli->prepare("SELECT post.post FROM post WHERE post.id_post=$var")) {
		$stmt3->execute();
		$stmt3->store_result();
		$stmt3->bind_result($post);
		$num_rows = $stmt3->num_rows;
		if($num_rows>0) {
			while ($stmt3->fetch()) {
				
				$sql_code="UPDATE `post` SET `post` = '$post',text='$text',data='$data', privacy='$privacy' WHERE `post`.`id_post` = $var";
			}
		}
	}
}
echo"UPDATE `comment` SET id_user=$user WHERE id_post=$var";
$sql=("UPDATE `comment` SET id_user=$user WHERE id_post=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("$sql_code");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

echo"<script> window.location='admin.php?page=show_tables'</script>";
?>