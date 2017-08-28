<?php
	$sql=('UPDATE user_account SET on_off = 0 WHERE user_account.id_user ='.$id);
		$stmp2 = $mysqli->prepare($sql);
		$stmp2->execute();
		echo"<script> window.location='includes/login.php'</script>";
?>