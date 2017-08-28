
<?php
$ativo;

		
if($ativo==2){
	$id_post=$_GET['post'];
	$var=null;
	$stmt = $mysqli->prepare("INSERT INTO comment VALUES (?,?,?,?,?)");
	$stmt->bind_param('iiiss',$var,$id,$id_post,date("Y-m-d h:i:sa"),$_POST['comentario']);
	$stmt->execute();
	echo "$stmt->affected_rows resgistos inseridos";
	$stmt->close();
	sleep(5);

	echo"<script> window.location='http://localhost/howl2/index.php?page=feed#$id_post'</script>";
		
?>