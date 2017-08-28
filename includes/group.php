<h3>Grupos</h3>

<div class="tab">
  <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'London')">Grupos</a>
  <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Paris')">Meus Grupos</a>
  <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Tokyo')">Criar Grupo</a>
</div>
<div class='box'>
					
<div id="London" class="tabcontent">
  <div class='box-body'>
			<table id='example1'class='table table-bordered table-striped'>
				<thead>
					<tr>
						
						<th>Nome do Grupo</th>
						<th>Tipo De Grupo</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
				<?php
			
					if($stmt = $mysqli->prepare("SELECT `group`.`id_group`, `group`.`name`,`group`.`type`,`group`.`group_img` FROM `group` ")) {
									$stmt->execute();
									$stmt->store_result();
									$stmt->bind_result($id_group,$group_name,$group_type,$group_img);
									$num_rows = $stmt->num_rows;
						
						if($num_rows>0) {
						
							while ($stmt->fetch()) {
								$var_verify=null;
									echo"<tr>
									<td>
										<p>$group_name</p>
									</td>
									<td>";
										if($group_type==1){
											echo"Publico";
										}else if($group_type==2){
											echo"Privado";
										}
									echo"</td>
									
									
									
									<td>
									";	
									if($group_type==1){									
										echo"<a href='index.php?page=profile_group&group=$id_group'class='btn btn-info '> Pagina do Grupo <i class='fa fa-users' aria-hidden='true'></i></a>";
										
									}
									if($stmt1 = $mysqli->prepare("SELECT  id_group FROM `group_user_account` WHERE  group_user_account.id_user=$id AND id_group=$id_group")) {
										$stmt1->execute();
										$stmt1->store_result();
										$stmt1->bind_result($id_group2);
										$num_rows = $stmt1->num_rows;

										if($num_rows>0) {

											while ($stmt1->fetch()) {
												//echo"ola";
												$var_verify=234324234234324;
												if($group_type==2){	
													echo"<a href='index.php?page=profile_group&group=$id_group'class='btn btn-info '> Pagina do Grupo <i class='fa fa-users' aria-hidden='true'></i></a>";
												}
												
											}
											
											$stmt1->close();			
										}		
										
									}
									if($var_verify==null){
										if($group_type==2){	
											echo"<a href='index.php?page=send_request_group&group=$id_group'class='btn btn-warning '> Enviar Pedido <i class='fa fa-paper-plane' aria-hidden='true'></i></a>";
										}else if($group_type==1){									
											echo"<a href='index.php?page=entrar_grupo&group=$id_group'class='btn btn-success '>Entrar no Grupo <i class='fa fa-users' aria-hidden='true'></i></a>";
										}
									}
										
									
									echo"
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
</div>

<div id="Paris" class="tabcontent">
<div class='box-body'>
			<table id='example1'class='table table-bordered table-striped'>
				<thead>
					<tr>
						
						<th>Nome de Grupo</th>
						<th>Tipo de Grupo</th>
						<th>Tipo de Membro</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
					if($stmt = $mysqli->prepare("SELECT `group`.id_group, `group`.name, `group`.type,`group_user_account`.member_type,user_account.name   FROM `group_user_account`,`group`,user_account WHERE `group`.id_group=group_user_account.id_group AND user_account.id_user=group_user_account.id_user AND group_user_account.id_user=$id")) {
									$stmt->execute();
									$stmt->store_result();
									$stmt->bind_result($id_group,$group_name,$group_type,$type,$name);
									$num_rows = $stmt->num_rows;
						
						if($num_rows>0) {
						
							while ($stmt->fetch()) {
									echo"<tr>
									<td>
										<p>$group_name</p>
									</td>
									<td>";
										if($group_type==1){
											echo"Publico";
										}else if($group_type==2){
											echo"Privado";
										}
									echo"
									</td>
									<td>";
										if($type==2){
											echo"Admistrador";
										}else if($type==1){
											echo"Membro";
										}
									echo"</td>
									
									
									<td>
									<a type='button' href='index.php?page=profile_group&group=$id_group'class='btn btn-info '>Ir para Pagina <i class='fa fa-users' aria-hidden='true'></i></a>";
										if($type==1){
											echo"<a href='index.php?page=sair_grupo&group=$id_group'class='btn btn-danger '>Sair do Grupo <i class='fa fa-sign-out' aria-hidden='true'></i></a>";
										}else if($type==2){
											echo"<a href='index.php?page=apagar_group&group=$id_group'class='btn btn-danger '>Apagar Grupo <i class='fa fa-trash' aria-hidden='true'></i></a>";
										}
									echo"
									
									
									
									
									</td>
									</tr>
									";
								}
									
							
									$stmt->close();		
									
								}	
							
							}else{
								echo"<tr><td>Não tens nenhum grupo nem és membro </td></tr>";
							}
								
							
						$t=1;
						?>
						</tbody>			
					</table>
					
				</div><!-- /.box-body -->

</div>

<div id="Tokyo" class="tabcontent">
	<div class='box-body'>
			<form action="index.php?page=create_group" enctype='multipart/form-data'  method="post">
		<div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nome do Grupo" maxlength="255" name="nome" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Descição do Grupo" name="desc" required>
            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <select  class="btn btn-default"  name="type" required>
				<option value="1">Publico  <span class="glyphicon glyphicon-unlock"></span></option>
				<option value="2">Privado <span class="glyphicon glyphicon-lock"></span></option>
			</select>
          </div>
          <div class='form-group'>
			<label for='inputSkills' class='col-sm-2 control-label'>Imagem do Grupo:</label>
			
			  <input type="file" name="fileToUpload"   class='btn btn-default btn-sm'>
			
		  </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Criar Grupo <i class="fa fa-plus-square" aria-hidden="true"></i></button>
            </div><!-- /.col -->
          </div>
        </form>
	</div><!-- /.box-body -->
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>