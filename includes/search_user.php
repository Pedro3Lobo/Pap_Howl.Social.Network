<?php


	$t=0;
	$ativo=1;
	$search=null;
	if(isset($_POST['procurar'])){
		$search=$_POST['procurar'];	
		//echo"pedro Lobo1";		
	}
	
	
		echo"<div class='box'>
					<div class='box-header'>";
					if($search==null){
						echo"<h3 style='color:Red'><i class='fa fa-warning'> </i>Porfavor insira algo nome para  poder procurar!!!<i class='fa fa-warning'></i></h3>";
					}else{
						echo"<h3 class='box-title'><i class='fa fa-search'> </i> Resultado da Procurar: $search</h3>";
					}
					echo"</div><!-- /.box-header -->
					<div class='box-body'>
					  <table id='example1'class='table table-bordered table-striped'>
						<thead>
						  <tr>
							<th>Nome</th>
							<th>Opções</th>							
						  </tr>
						</thead>
						<tbody>";
						
							if($stmt = $mysqli->prepare("Select id_user,name,user_image from user_account where name LIKE '%$search%' and id_user<>$id")) {
								$stmt->execute();
								$stmt->store_result();
								$stmt->bind_result($id_user,$user,$user_image_search);
								$num_rows = $stmt->num_rows;
								if($num_rows>0) {
									while ($stmt->fetch()) {
										if($search!=null){
											echo"
												 <tr>
													<td><div class='user-panel'>
													<img src='$user_image_search' class='img-circle' width=40; alt='User Image'>
													<span class='hidden-xs'>$user</span></div>
													</td>
													<td>
													<a href='index.php?page=profile_friend&friend=$id_user' class='btn btn-primary '><i class='fa fa-user' aria-hidden='true'></i>Perfil</a>
													<a href='index.php?page=profile_friend'class='btn btn-danger '><i class='fa fa-ban' aria-hidden='true'></i>   Bloquear</a>
													</td>
												 </tr>";
										}
										
									}
									
							
									$stmt->close();		
									
								}		
									
							
										
							}else{
								echo"
								<h3 style='color:red'>Não foi encontrado nenhum user com esse nome</h3>";
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

