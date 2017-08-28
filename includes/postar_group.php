<?php
$ativo;
$post_ex=null;
$var=null;
$var1=null;
$texto=null;		
$privaci=null;	
$post_group=null;
if(isset($_GET['group'])){
	$post_group=$_GET['group'];
}else{
	echo"<script> window.location='index.php?page=group'</script>";
}
if(isset($_GET['post'])){
	
	
	if($stmt1 = $mysqli->prepare("SELECT post_group.post, post_group.text FROM post_group WHERE post_group.id_post_group='$post_ex'")) {
		$stmt1->execute();
		$stmt1->store_result();
		$stmt1->bind_result($post,$text);
		$num_rows = $stmt1->num_rows;
				
		if($num_rows>0) {
			while ($stmt1->fetch()) {
				
				$texto=$text;
				$var1=$post;
				$privaci=2;
				
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

				if(strcmp($texto,"</script>")==true){
					$texto = str_replace("<script >","script",$texto);
				}
			}
			if(isset($_POST['privaci'])){
				$privaci=$_POST['privaci'];
				//echo"<p>entra $privaci</p>";
			}
		}	
			if(isset($_GET['post'])){
				$post_ex=$_GET['post'];
				if($stmt = $mysqli->prepare('Select id_post, post,text from posts where id_post='.$post_ex.'')) {
					
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($id_post,$post,$text);
					$num_rows = $stmt->num_rows;
				
					
					if($num_rows>0) {
						while ($stmt->fetch()) {
							//echo"aqui objetivo: $post_ex";
							$texto=$text;
							$var1=$post;
							$privaci=2;
							//echo" aqui objetivo e os valores de Texto = $text, url da imagem do post = $post";
						}	}
				}
			
			}
			
		
			//echo"<p>$var,$var1,$texto,".date("Y-m-d h:i:sa").",$privaci,$var,$id</p>";
			

			$var2=0;
			$date_post=date("Y-m-d h:i:sa");
			$stmt = $mysqli->prepare("INSERT INTO post_group VALUES (?,?,?,?,?,?,?)");
			$stmt->bind_param('isssiii',$var,$var1,$texto,$date_post,$var2,$id,$post_group);
			$stmt->execute();
			//echo "$stmt->affected_rows resgistos inseridos";
			$stmt->close();
			
			//echo"<p>,$var,$var1,$texto,$date_post,$privaci,$var2,$id</p>";
			echo"<script> window.location='index.php?page=profile_group&group=$post_group'</script>";
		
?>