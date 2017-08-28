<?php

	
	
if(isset($_GET['post'])){
	if(isset($_POST['comentario'])){
		if(isset($_GET['group'])){
		$group=$_GET['group'];
		$var=null;
		$var_comment=$_POST['comentario'];
		$date_post=date("Y-m-d h:i:sa");
		$id_post=$_GET['post'];
		//echo"<p>$var,$id,$id_post,$date_post,</p>";
		//echo"$var,$var_comment,$date_post,$id,$id_post,$group";
		$stmt = $mysqli->prepare('INSERT INTO comment_group VALUE(?,?,?,?,?,?)') ;
		$stmt->bind_param('issiii',$var,$var_comment,$date_post,$id,$id_post,$group);
		$stmt->execute();
		//echo "$stmt->affected_rows resgistos inseridos";
		$stmt->close();
		echo"<script> window.location='index.php?page=profile_group&group=$group#$id_post'</script>";
		}
	}
}
		
?>