<?php
include ("../config/config.php");
$var=$_GET['email'];
if($stmt = $mysqli->prepare("SELECT email,`password` FROM user_account WHERE user_account.email='$var'")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($email,$password);
	$num_rows = $stmt->num_rows;
	if($num_rows>0) {
		while ($stmt->fetch()) {
			$key=sha1($email);
			$to = "$var";
			$subject = "Howl Palavra Passe";
			$txt = "Utilize este link para mudar a sua palavra passe e use este codigo:$key http://howl.uphero.com/includes/code_password.php?email=$var ";
			$headers = "From: winddiamandphg@gmail.com" . "\r\n";
			echo
			mail($to,$subject,$txt,$headers);
		}
	}
}else{
	$to = "$var";
	$subject = "Howl Conta";
	$txt = "Este email não corresponde a nenhuma conta.";
	$headers = "From: winddiamandphg@gmail.com" . "\r\n";

	mail($to,$subject,$txt,$headers);
}
header("Location: login.php");
?>