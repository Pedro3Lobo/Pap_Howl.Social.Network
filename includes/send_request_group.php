<?php
$group=$_GET['group'];

if($stmt1 = $mysqli->prepare("SELECT `group`.name,user_account.id_user FROM `group`,`group_user_account`,`user_account` WHERE `group`.type=2 AND `group_user_account`.id_group=$group AND `group_user_account`.id_group=`group`.id_group AND`group_user_account`.member_type=2 AND `group_user_account`.id_user=`user_account`.id_user")) {
	$stmt1->execute();
	$stmt1->store_result();
	$stmt1->bind_result($group_name,$admin);
	$num_rows = $stmt1->num_rows;

	if($num_rows>0) {
		while ($stmt1->fetch()) {
			
			
			
			$sql=("INSERT INTO `notification` (`id_notification`, `text`, `id_user`) VALUES (NULL, '<td class=''warning''><p>$var_name Gostaria de se juntar ao Grupo Privado:$group_name</p><a href=''index.php?page=private_entrar_grupo&group=$group&user=$id''>Aceitar</a><a href=''index.php?page=private_negar_grupo&group=$group&user=$id''>Negar</a></td>', '$admin')");
			$stmp2 = $mysqli->prepare($sql);
			
			$stmp2->execute();
			//echo "$stmp2->affected_rows resgistos inseridos";
			//echo"$group=$group_name       $text  $admin";
		}
	}
}else{
	$text="<td class'danger'>Já esta no grupo</td>";
	$stmt = $mysqli->prepare("INSERT INTO `notification` (`id_notification`, `text`, `id_user`) VALUES (?,?,?)");
	$stmt->bind_param('isi',$var,$text,$id);
	$stmt->execute();
	echo "$stmt->affected_rows resgistos inseridos";
	$stmt->close();
	//echo" falhou";
}
echo"<script> window.location='index.php?page=group'</script>";
?>