<?php

$id_group=$_GET['group'];
$user=$_GET['user'];

$var=null;
$var_verify=null;
$name_group=null;

if($stmt = $mysqli->prepare("SELECT  name FROM `group` WHERE  group.id_group=$id_group ")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($name_group);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {

		while ($stmt->fetch()) {
			//echo"ola";
			
		}
		$stmt->close();			
	}		
		
}
$text="<td>Foi lhe Negado o Acesso ao Grupo:$name_group</td>";

$stmt = $mysqli->prepare("INSERT INTO `notification` (`id_notification`, `text`, `id_user`) VALUES (?,?,?)");
$stmt->bind_param('isi',$var,$text,$user);
$stmt->execute();
echo "$stmt->affected_rows resgistos inseridos";
$stmt->close();

echo"<script> window.location='index.php?page=notificarion'</script>";
?>