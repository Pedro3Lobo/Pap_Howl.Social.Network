<?php
	
		if((isset($_GET['key']))&&($_GET['key']==sha1("Pedro Henrique Gonçalves Lobo"))){
			$key_var=$_GET['key'];
		
?>
	
		<div class='box-body'>
			<table id='example1'class='table table-bordered table-striped'>
				<thead>
					<tr>
						
						<th>Group Name</th>
						<th>Group Type</th>
						<th>Member</th>
						<th>Type of Member</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
				<?php
				include ("../config/config.php");
					if($stmt = $mysqli->prepare("SELECT group.name, group.type,group_user_account.member_type,user_account.name   FROM `group_user_account`,`group`,user_account WHERE group.id_group=group_user_account.id_group AND user_account.id_user=group_user_account.id_user")) {
						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($group_name,$group_type,$type,$name);
						$num_rows = $stmt->num_rows;
						
						if($num_rows>0) {
						
							while ($stmt->fetch()) {
									echo"<tr>
									<td>
										<p>$group_name</p>
									</td>
									<td>";
									if($group_type==1){
										echo"<p>Publico</p>";
									}else{
										echo"<p>Privado</p>";
									}
									echo"</td>
									<td>";
										if($type==1){
											echo"Admin";
										}else if($type==2){
											echo"Member";
										}
									echo"</td>
									<td>
										<p>$name</p>
									</td>
									
									<td>								
										<a href='index.php?page=profile_friend'class='btn btn-danger '><i class='fa fa-ban' aria-hidden='true'></i>Erase</a>
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
	