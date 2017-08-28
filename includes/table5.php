<?php
	
		if((isset($_GET['key']))&&($_GET['key']==sha1("Pedro Henrique Gonçalves Lobo"))){
			$key_var=$_GET['key'];
		
?>
	
		<div class='box-body'>
			<table id='example1'class='table table-bordered table-striped'>
				<thead>
					<tr>
						
						<th>Name</th>
						<th>Friends Name</th>
						<th>Friendship State</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				include ("../config/config.php");
					if($stmt = $mysqli->prepare("SELECT DISTINCT friend.id_friend , user_account.name,  friend_user_account.id_friend_user_account, friend_user_account.friend_state FROM user_account, friend, friend_user_account WHERE user_account.id_user=friend.id_user AND   friend_user_account.id_friend=friend.id_friend")) {
						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($id_friend,$name,$friend,$statefriend);
						$num_rows = $stmt->num_rows;
						
						if($num_rows>0) {
							while ($stmt->fetch()) {
								echo"<tr>
									<td>
										<p>$name</p>
									</td>";
								
								if($stmt1 = $mysqli->prepare("SELECT user_account.name From user_account,friend_user_account WHERE user_account.id_user=friend_user_account.id_user AND friend_user_account.id_friend_user_account=$friend")) {
									$stmt1->execute();
									$stmt1->store_result();
									$stmt1->bind_result($friends_name);
									$num_rows = $stmt1->num_rows;
						
									if($num_rows>0) {
									
										while ($stmt1->fetch()) {
											echo"
												<td>
													<p>$friends_name</p>
												</td>
												<td>
													<p>$statefriend</p>
												</td>
												
											 </tr>
											";
										}
									$stmt1->close();		
									}	
								}
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
	