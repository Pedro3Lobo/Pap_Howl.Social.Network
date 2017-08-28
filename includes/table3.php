<?php
	
		if((isset($_GET['key']))&&($_GET['key']==sha1("Pedro Henrique Gonçalves Lobo"))){
			$key_var=$_GET['key'];
		
?>
	
		<div class='box-body'>
			<table id='example1'class='table table-bordered table-striped'>
				<thead>
					<tr>
						
						<th>Text</th>
						<th>Date</th>
						<th>User</th>
						<th>Post</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
				<?php
				include ("../config/config.php");
					if($stmt = $mysqli->prepare("SELECT comment.id_comment, comment.text,comment.date,comment.id_user, comment.id_post,user_account.name FROM comment, user_account WHERE user_account.id_user=comment.id_user")) {
									$stmt->execute();
									$stmt->store_result();
									$stmt->bind_result($id_comment, $text,$date,$id_user,$id_post,$name);
									$num_rows = $stmt->num_rows;
						
						if($num_rows>0) {
						
							while ($stmt->fetch()) {
								
								echo"
								  
										 <tr>
											<td>
												<p>$text</p>
											</td>
											<td>
												<p>$date</p>
											</td>
											<td>
												<p>$name</p>
											</td>
											<td>
												<p>$id_post</p>
											</td>
											
										
											<td>								
											<a href='admin.php?page=apagar_table3&id=$id_comment'class='btn btn-danger '><i class='fa fa-ban' aria-hidden='true'></i>Erase</a>
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
			<div>									
		</div>
			<?php
			}else{
			header("Location: 404.php");
		}
	