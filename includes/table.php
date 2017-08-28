<?php
	
		if((isset($_GET['key']))&&($_GET['key']==sha1("Pedro Henrique Gonçalves Lobo"))){
			$key_var=$_GET['key'];
		
?>
	
		<div class="row" style=" width: 1100px; overflow-x: scroll;">
			<div class='box-body'>
				<table id='example1'class='table table-bordered table-striped'>
					<thead>
						<tr>
							
							<th>Name</th>
							<th>Pass</th>
							<th>Email</th>
							<th>Full Name</th>	
							<th>Quote</th>
							<th>Edu</th>
							<th>Loc</th>
							<th>Notes</th>
							<th>Image User</th>
							<th>ON/OFF</th>
							<th>Opções</th>
						</tr>
					</thead>
					<tbody>
					<?php
					include ("../config/config.php");
						if($stmt = $mysqli->prepare("SELECT * FROM user_account")) {
							$stmt->execute();
							$stmt->store_result();
							$stmt->bind_result($id_user, $name, $password, $email, $full_name, $quote, $educacion, $localization, $notes, $user_image, $on_off);
							$num_rows = $stmt->num_rows;
							
							if($num_rows>0) {
							
								while ($stmt->fetch()) {
									
									echo"
									  
											 <tr>
												
												<td>
													<p>$name</p>
												</td>
												<td>
													<p>$password</p>
												</td>
												<td>
													<p>$email</p>
												</td>
												<td>
													 <p>$full_name</p>
												</td>
												<td>
													<p>$quote</p>
												</td>
												<td>
													<p>$educacion</p>
												</td>
												<td>
													<p>$localization</p>
												</td>
												<td>
													 <p>$notes</p>
												</td>
												
												<td><div class='user-panel'>
												<img src='../$user_image' class='img-circle' width=40; alt='User Image'>
												</div>
												</td>
												<td>";
												if($on_off==1){
													echo"<a href='#' title='Mudar para Offline'><i class='fa fa-circle text-success'></i> Online</a>
													";
												}else if($on_off==0){
													echo"<a href='#' title='Mudar para Online'><i class='fa fa-circle text-danger'></i> Offline</a>
													";
												}
												echo"
												</td>
												<td>								
												<a href='admin.php?page=apagar_table&id_user=$id_user'class='btn btn-danger '><i class='fa fa-ban' aria-hidden='true'></i>Erase</a>
												
												<a type='button' href='admin.php?page=alterar_table&id_user=$id_user'class='btn btn-warning '><i class='fa fa-ban' aria-hidden='true'></i>Update</a>
												</td>
											 </tr>
									";
									
									
								}
								
						
								$stmt->close();		
								
							}		
								
						
									
						}
							$t=1;
							?>
							</tbody>			
						</table>
												
						</div>
					</div>
			<?php
		  echo"<a href='admin.php?page=inserir_table&id_user=$id_user'class='btn btn-primary '><i class='fa fa-ban' aria-hidden='true'></i>Insert</a>";
			
			}else{
			header("Location: 404.php");
		}
	