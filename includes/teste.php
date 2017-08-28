<?php
//$id=$_GET['id'];
//$id2=$_GET['id2'];
$id=2;
$id2=1;
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
							<th>Mensagens</th>	
						  </tr>
						</thead>
						<tbody>";
	if($stmt = $mysqli->prepare('Select id_mens,mensagem,id_envio,id_receber,data,id_user,name from mensagens,login where mensagens.id_envio=login.id_user Order By id_mens DESC')) {


		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id_mens,$mensagem,$id_enviar,$id_receber,$data,$id_user,$user);
		$num_rows = $stmt->num_rows;
		
		if($num_rows>0) {
		
			/*while ($stmt->fetch()) {
				if(($_GET['id']==$id_enviar)or($_GET['id2']==$id_enviar)){
					if(($_GET['id']==$id_receber)or($_GET['id2']==$id_receber)){
						switch($id_enviar){
							case $_GET['id'] :
								echo"			  
										 <tr>
											<td><b>Voce:</b> $mensagem</td>
										 </tr>
								";
							break;
							case $_GET['id2'] :
								echo"			  
										 <tr>
											<td><b>Outro:</b> $mensagem</td>
										 </tr>
								";
							break;
						}
					}
				}/*/
				
			//}
			
	
			$stmt->close();		
			
		}		
	}
		$t=1;
	echo"</tbody>
				
					  </table>
					  
					</div><!-- /.box-body -->
					<div>
					 <form method='post' action='includes/enviar.php?id=$id&id2=$id2'>
						<textarea rows='4' cols='125' name='mens' placeholder='Escreva a sua Mensagem!!!'>
					  </textarea>
					  <input type='submit'  class='btn btn-info' value='enviar'>
					  
					
					</div>
				  </div><!-- /.box -->
				 
				</div><!-- /.col -->
				 ";
			
				
	 ?>

