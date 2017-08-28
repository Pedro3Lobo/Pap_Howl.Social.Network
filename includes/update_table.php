<?php
$ativo=0;
$id=$_GET['id_user'];
$encrypte=null;
$password=null;
$password=$_POST['password'];
//echo"1 $password";
if($stmt = $mysqli->prepare('Select password ,email FROM user_account WHERE id_user<>'.$id.' ')) {		
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($pass,$email);
	$num_rows = $stmt->num_rows;
	
	if($num_rows>0) {
		while ($stmt->fetch()) {
			//echo"3 $password";
			if($_POST['password']!=null){	
				//echo"2 $password";
				$encrypte= password_hash($password,PASSWORD_DEFAULT);
				//echo"$encrypte";
				if($_POST['password']!=$_POST['repassword']){	
					$ativo=2;
					
				}
			}else{
				$encrypte=$pass;
			}
			if($_POST['email']=="$email"){	
				//echo"email iguais";
				$ativo=2;
			}
			
		}
	}
						
}
		
if($ativo==2){
	echo"<script> window.location='index.php?page=main_infor'</script>";
}else{
	$nome=$_POST['nome'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$full_name=$_POST['nome_completo'];
	
	
	//echo"name ='$nome' ,password='$pass',email='$email',full_name='$full_name'";
	$sql2=("UPDATE user_account SET name ='$nome' ,password='$encrypte',email='$email',full_name='$full_name'
	WHERE user_account.id_user =$id");
	$stmp2 = $mysqli->prepare($sql2);
	$stmp2->execute();
	
	echo"<script> window.location='admin.php?page=show_tables'</script>";
}
?>