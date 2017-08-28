<?php
$ativo=0;
include ("../config/config.php");
if($stmt = $mysqli->prepare('Select email from user_account ')) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($email);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {
		while ($stmt->fetch()) {
			if($_POST['email']=="$email"){	
			 //echo"email iguais";
			$ativo=2;
			}	
			if($_POST['password']!=$_POST['repassword']){	
			  //echo"palavras passes diferente";
			$ativo=2;
			}	
		}
	}	
}
		
if($ativo==2){
			header('Location: register.php');
		}else{
			$var=null;
			$var_quote="Hello world" ;
			$var_edu="";
			$var_skill="";
			$var_country="";
			$var_img_new="imagem/new_user.png";
			$var_on_off=0;
			$id=null;
			$password=$_POST['password'];
			$encrypte= password_hash($password, PASSWORD_DEFAULT);
			
			$stmt = $mysqli->prepare("INSERT INTO user_account VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param('isssssssssi',$var,$_POST['nome'],$encrypte,$_POST['email'],$_POST['nome_completo'],$var_quote,$var_edu,$var_country,$var_skill,$var_img_new,$var_on_off);
			$stmt->execute();
			echo "$stmt->affected_rows resgistos inseridos";
			$stmt->close();
				$stmt->execute();
			
			if($stmt = $mysqli->prepare('SELECT MAX(user_account.id_user) FROM user_account')) {
				$stmt->store_result();
				$stmt->bind_result($id_p);
				$num_rows = $stmt->num_rows;
				
				if($num_rows>0) {
					while ($stmt->fetch()) {
						$id=$id_p;
					}
				}
			}
			
			$stmt = $mysqli->prepare("INSERT INTO friend VALUES (?,?)");
			$stmt->bind_param('ii',$var,$id);
			$stmt->execute();
			echo "$stmt->affected_rows resgistos inseridos";
			$stmt->close();
			
			$stmt = $mysqli->prepare("INSERT INTO chat VALUES (?,?)");
			$stmt->bind_param('ii',$var,$id);
			$stmt->execute();
			echo "$stmt->affected_rows resgistos inseridos";
			$stmt->close();

			header('Location: login.php');
		}
?>