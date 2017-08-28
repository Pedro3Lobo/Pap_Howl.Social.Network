<?php
	
		if((isset($_GET['key']))&&($_GET['key']==sha1("Pedro Henrique Gonçalves Lobo"))){
			$key_var=$_GET['key'];
		
?>
	
		<div class='box-body'>
			<table id='example1'class='table table-bordered table-striped'>
				<thead>
					<tr>
						<th>ID Post</th>
						<th>Post</th>
						<th>Text</th>
						<th>Date</th>
						<th>Privacy</th>
						<th>User</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
				<?php
				include ("../config/config.php");
					if($stmt = $mysqli->prepare("SELECT post.id_post,post.post,post.text,post.data,post.privacy,post.like1,user_account.id_user,user_account.name FROM post,user_account WHERE user_account.id_user=post.id_user")) {
						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($id_post,$post,$text,$date,$privaci,$like,$id_user,$name);
						$num_rows = $stmt->num_rows;
						
						if($num_rows>0) {
						
							while ($stmt->fetch()) {
								
								echo"
								  
										 <tr>
											<td>
												<p>$id_post</p>
											</td>
											<td>
												<p>$post</p>
											</td>
											<td>
												<p>$text</p>
											</td>
											<td>
												<p>$date</p>
											</td>
											<td>";
											if($privaci==1){
												echo"<p>Publico</p>";
											}else if($privaci==2){
												echo"<p>Amigos</p>";
											}else if($privaci==3){
												echo"<p>Apenas Eu</p>";
											}else {
												echo"<p>Esta privacidade esta errada</p>";
											}
											echo"</td>
											<td>
												<p>$name</p>
											</td>
											<td>								
											<a href='admin.php?page=apagar_table4&id=$id_post'class='btn btn-danger '><i class='fa fa-ban' aria-hidden='true'></i>Erase</a>
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
			<div>									
		</div>
			<?php
			}else{
			header("Location: 404.php");
		}
	