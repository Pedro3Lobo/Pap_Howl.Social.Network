<div class='box'>
	<div class='box-header'>
		 <h3 class='box-title'><i class="fa fa-bell-o" aria-hidden="true"></i> Notificações</h3>
	</div><!-- /.box-header -->
	<div class='box-body'>
		 <table id='example1'class='table table-bordered table-striped'>
			<thead>
				<tr>
					<th>Notificação:</th>	
					<th></th>						
				</tr>
			</thead>
			<tbody>
			<?php
				$t=0;
				$ativo=1;
				if($stmt = $mysqli->prepare("SELECT  id_notification,text FROM notification  WHERE id_user=$id Order by id_notification DESC ")) {
								$stmt->execute();
								$stmt->store_result();
								$stmt->bind_result($notification,$text);
								$num_rows = $stmt->num_rows;
					
					if($num_rows>0) {
					
						while ($stmt->fetch()) {
							echo"
								<tr>
									
									$text
									<td><a href='index.php?page=apagar_noti&not=$notification' ><i class='fa fa-times' aria-hidden='true'></i></a></td>
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
		<a href='index.php?page=apagar_not' class='btn btn-warning'>Apagar Todos<i class='fa fa-times' aria-hidden='true'></i></a>		
	</div><!-- /.box-body -->
	
 </div><!-- /.box -->
						 
						

