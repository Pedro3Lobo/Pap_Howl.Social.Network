<?php
$ativo;
$post_ex=null;
$var=null;
$var1=null;
$texto=null;
$privaci=null;	
if(isset($_GET['post'])){
	$post_ex=$_GET['post'];
	echo"SELECT post.post, post.text FROM post WHERE post.id_post='$post_ex'";
	if($stmt1 = $mysqli->prepare("SELECT post.post, post.text FROM post WHERE post.id_post='$post_ex'")) {
		$stmt1->execute();
		$stmt1->store_result();
		$stmt1->bind_result($post,$text);
		$num_rows = $stmt1->num_rows;
				
		if($num_rows>0) {
			while ($stmt1->fetch()) {
				//echo"$text,$post";
				$texto=$text;
				$var1=$post;
				$privaci=2;
				
			}
		}
	}
						
}else if(isset($_GET['post_group'])){
	$var_group=$_GET['post_group'];
	if($stmt1 = $mysqli->prepare("SELECT post_group.post, post_group.text FROM post_group WHERE post_group.id_post_group='$var_group'")) {
		$stmt1->execute();
		$stmt1->store_result();
		$stmt1->bind_result($post,$text);
		$num_rows = $stmt1->num_rows;
				
		if($num_rows>0) {
			while ($stmt1->fetch()) {
				
				$texto=$text;
				$var1=$post;
				$privaci=2;
				//echo"hahhahahhahahahaxd";
			}
		}
	}
}else{
	$uploadOk=0;
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
	
			$var=null;
			$texto=null;
			
			if(isset($_POST['text'])){
				$texto=$_POST['text'];
				if(strcmp($texto,"<script>")==true){
					$texto = str_replace("<script>","script",$texto);
				}

				if(strcmp($texto,"<script>")==true){
					$texto = str_replace("<script >","script",$texto);
				}
			}
			if(isset($_POST['privaci'])){
				$privaci=$_POST['privaci'];
				//echo"<p>entra $privaci</p>";
			}
		}	
			
			
		
			
			$privaci=2;

			$var2=0;
			$date_post=date("Y-m-d h:i:sa");
			$stmt = $mysqli->prepare("INSERT INTO post VALUES (?,?,?,?,?,?,?)");
			$stmt->bind_param('isssiii',$var,$var1,$texto,$date_post,$privaci,$var2,$id);
			$stmt->execute();
			//echo "$stmt->affected_rows resgistos inseridos";
			$stmt->close();
			
			//echo"<p>,$var,$var1,$texto,$date_post,$privaci,$var2,$id</p>";
			echo"<script> window.location='index.php?page=feed#$post_ex'</script>";
		
?>