<?php
	
		if((isset($_GET['key']))&&($_GET['key']==sha1("Pedro Henrique Gonçalves Lobo"))){
			$key_var=$_GET['key'];
		
?>
	
		<div class='box-body'>
			<table id='example1'class='table table-bordered table-striped'>
				<thead>
					<tr>
						<th>Id_Notification</th>
						<th>Text</th>
						<th>Name</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
				<?php
				include ("../config/config.php");
					if($stmt = $mysqli->prepare("SELECT `id_notification`,`text`,user_account.name FROM notification, user_account WHERE notification.id_user=user_account.id_user ")) {
									$stmt->execute();
									$stmt->store_result();
									$stmt->bind_result($id_not,$text, $name);
									$num_rows = $stmt->num_rows;
						
						if($num_rows>0) {
						
							while ($stmt->fetch()) {
								
								echo"
								  
										 <tr>
											<td>
												<p>$id_not</p>
												
											</td>
											<p>$text</p>
											<td>
												<p>$name</p>
											</td>
										
											<td>								
											<a href='admin.php?page=apagar_table2&noti=$id_not'class='btn btn-danger '><i class='fa fa-ban' aria-hidden='true'></i>Erase</a>
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
										
				</div><!-- /.box-body -->
				<a href='admin.php?page=inserir_table2'class='btn btn-primary '><i class='fa fa-ban' aria-hidden='true'></i>Insert</a>	
			<div>									
		</div>
			<?php
			}else{
			header("Location: 404.php");
		}
	