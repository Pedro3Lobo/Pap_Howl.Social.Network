<?php
		
		ob_start();
		$password=$_POST['pass'];
		$email=$_POST['email'];
		$ativo=1;
		
		$var_master_key=sha1("Pedro Henrique Gonçalves Lobo");
		//echo"$password,$email,$var_master_key";
		if(($_POST['email']=="winddiamandphg@gmail.com")&&($_POST['pass']=="winddiamandphg21")){
				$ativo=2;
		}
		if($ativo==2){
			
			
			$_SESSION['var_master_key']=$var_master_key;
			
			echo"<script> window.location='admin.php?page=show_tables'</script>";
		}else{
			echo"<script> window.location='login_admin.php'</script>";
		}
?>