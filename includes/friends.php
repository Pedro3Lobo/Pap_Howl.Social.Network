<?php


	$t=0;
	$ativo=1;
	
	
	
		echo"<div class='box'>
					<div class='box-header'>
					  <h3 class='box-title'><i class='fa fa-users'> </i>  Amigos</h3>
					</div><!-- /.box-header -->
					<div class='box-body'>
					  <table id='example1'class='table table-bordered table-striped'>
						<thead>
						  <tr>
							<th>Nome</th>
							<th>Opções</th>							
						  </tr>
						</thead>
						<tbody>";
	if($stmt = $mysqli->prepare("SELECT user_account.id_user,name,user_image,on_off FROM friend ,user_account,friend_user_account WHERE  user_account.id_user=friend_user_account.id_user AND friend_user_account.id_friend=friend.id_friend AND friend_user_account.id_friend=$var_friend AND friend_user_account.friend_state = 2")) {
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($id_user,$name,$user_image,$estado_on_off);
					$num_rows = $stmt->num_rows;
		
		if($num_rows>0) {
		
			while ($stmt->fetch()) {
				
				echo"
				  
						 <tr>
						
							<td><div class='user-panel'>
							<img src='$user_image' class='img-circle' width=40; alt='User Image'>
							<span class='hidden-xs'>$name</span></div>
							</td>
							<td>
							
							<a href='index.php?page=profile_friend&friend=$id_user' class='btn btn-primary '><i class='fa fa-user' aria-hidden='true'></i>Perfil</a>
							
							<a href='index.php?page=block&friend=$id_user'class='btn btn-danger '><i class='fa fa-ban' aria-hidden='true'></i>   Bloquear</a>
							
							<a type='button' href='index.php?page=deixar_seguir&friend=$id_user&var=1'class='btn btn-warning '><i class='fa fa-ban' aria-hidden='true'></i>  Não Seguir</a>
							</td>
						 </tr>
				";
				
				
			}
			
	
			$stmt->close();		
			
		}		
			
	
				
	}
		$t=1;
	echo"</tbody>
				
					  </table>
					  
					</div><!-- /.box-body -->
					<div>
					  
					
					</div>
				  </div><!-- /.box -->
				 
				
				 ";
			
				
	 ?>

