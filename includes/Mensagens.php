
<?php
$id=$_GET['id'];
	$t=0;
	$ativo=1;
	
	
	
		echo"<div class='box'>
					<div class='box-header'>
					  <h3 class='box-title'>Mensagens</h3>
					</div><!-- /.box-header -->
					<div class='box-body'>
					  <table id='example1'class='table table-bordered table-striped'>
						<thead>
						  <tr>

							<th>Nome</th>
							<th>Mensagens</th>
							<th>Opções</th>
							<th>Opções</th>
						  </tr>
						</thead>
						<tbody>";
	if($stmt = $mysqli->prepare('Select id_mens,mensagem,id_envio,id_receber,data,id_user,name from mensagens,login where mensagens.id_envio=login.id_user and id_receber= '.$id.'')) {


		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id_mens,$mensagem,$id_enviar,$id_receber,$data,$id_user,$user);
		$num_rows = $stmt->num_rows;
		
		if($num_rows>0) {
		
			while ($stmt->fetch()) {
				echo"
				  
						 <tr>
						
							<td>$user</td>
							<td>$mensagem</td>
							<td><a href='index.php?page=chat&id=$id&id2=$id_enviar'><h3><b>Responder</b></h3></td>
							<td><a href='includes/apagar.php?id=$id&id2=$id_enviar'><h3><b>Apagar</b></h3></td>
						 </tr>
				";
				
				
			}
			
	
			$stmt->close();		
			
		}		
	}
		$t=1;
	echo"</tbody>
				<tfoot>
						  <tr>
					
							<th>Nome</th>
							<th>Mensagens</th>
							<th>Opções</th>
							<th>Opções</th>
						  </tr>
						</tfoot>
					  </table>
					  
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				</div><!-- /.col -->";
			
				
	 ?>
