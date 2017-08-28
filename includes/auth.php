<?php
		
		ob_start();
		
		$ativo=1;
		$id;
		$var_img=null;
		$var_name=null;
		$var_quote=null;
		$var_friend=null;
		$var_chat=null;
		if($stmt = $mysqli->prepare('SELECT user_account.id_user,name,password,email,quote,user_image, id_friend, id_chat FROM user_account, friend , chat WHERE friend.id_user=user_account.id_user AND user_account.id_user=chat.id_user AND chat.id_user=friend.id_user')) {

			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($id_user,$name,$password,$email,$quote,$user_img_page,$id_friend,$id_chat);
			$num_rows = $stmt->num_rows;
			
			if($num_rows>0) {
				while ($stmt->fetch()) {
					$var_pass=$_POST['pass'];
					$hash=password_verify($var_pass,$password);
					if($_POST['email']=="$email"){	
					
						 if($hash==0){
							 
						 }else{
							$ativo=2;
							$id=$id_user;
							$var_img=$user_img_page;
							$var_name=$name;
							$var_quote=$quote;
							$var_friend=$id_friend;
							$var_chat=$id_chat;
						 }
					}
					
				}
			}
			
				
		}
		if($ativo==2){
			
			$_SESSION['var_img']=$var_img;
			$_SESSION['var_name']=$var_name;
			$_SESSION['id_user']=$id;
			$_SESSION['var_quote']=$var_quote;
			$_SESSION['var_friend']=$var_friend;
			$_SESSION['var_chat']=$var_chat;
			//echo"$id_chat";
			$sql=('UPDATE user_account SET on_off = 1 WHERE user_account.id_user ='.$id);
			$stmp2 = $mysqli->prepare($sql);
			$stmp2->execute();
			
			
			echo"<script> window.location='index.php?page=feed'</script>";
		}else{
			echo"<script> window.location='includes/login.php'</script>";
		}
?>