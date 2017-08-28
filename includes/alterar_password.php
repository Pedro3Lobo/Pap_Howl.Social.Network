<?php
include ("../config/config.php");
if((isset($_GET['email']))&&(isset($_POST['password']))&&(isset($_POST['repassword']))){
	$email=$_GET['email'];
	if($_POST['password']==$_POST['repassword']){
		$password=$_POST['password'];
		$encrypte= password_hash($password, PASSWORD_DEFAULT);
		
		$sql2=("UPDATE user_account SET  password='$encrypte'WHERE user_account.email ='$email'");
		$stmp2 = $mysqli->prepare($sql2);
		$stmp2->execute();
	}else{
		echo"<script> window.location='code_password.php?email=$email'</script>";	
	}
}
echo"<script> window.location='login.php'</script>";
?>