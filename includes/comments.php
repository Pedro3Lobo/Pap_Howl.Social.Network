<?php
if(isset($_GET['post'])){
	if(isset($_POST['comentario'])){
		$var=null;
		$var_comment=$_POST['comentario'];
		$date_post=date("Y-m-d h:i:sa");
		$id_post=$_GET['post'];
		//echo"<p>$var,$id,$id_post,$date_post,</p>";
		//echo"$id_post you should be dying";
		$stmt = $mysqli->prepare('INSERT INTO comment VALUE(?,?,?,?,?)') ;
		$stmt->bind_param('issii',$var,$var_comment,$date_post,$id,$id_post);
		$stmt->execute();
		//echo "$stmt->affected_rows resgistos inseridos";
		$stmt->close();
		echo"<script> window.location='index.php?page=feed#$id_post'</script>";
	}
}

?>