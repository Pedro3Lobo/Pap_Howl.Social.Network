<?php
if(isset($GET['not'])){
	$var=$_GET['not'];
	$sql_u="DELETE  FROM notification WHERE id_notification=$var ";
}else{
	$sql_u="DELETE  FROM notification WHERE id_user=$id";
}
$sql=($sql_u);
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

echo"<script> window.location='index.php?page=notificarion'</script>";

?>