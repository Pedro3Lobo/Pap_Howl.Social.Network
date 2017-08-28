<?php
$id=$_GET['id_user'];
if($stmt = $mysqli->prepare('Select name, email, full_name, password  FROM user_account WHERE user_account.id_user='.$id.'')) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($name,$email,$full_name,$password);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {
		while ($stmt->fetch()) {
			
	
		}
	}
}

?>

<div class="col-sm-4">
	</div>
	<div class="col-sm-4">
<div class='box box-default'>
	<div class='box-header'>
		<h3 class='box-title'><i class='fa fa-users'> </i> Alterar Informações do Utilizador</h3>
	</div><!-- /.box-header -->
	<div class='box-body'>
		<?php echo"<form action='admin.php?page=update_table&id_user=$id' method='post'>" ; ?>
		<div class="form-group has-feedback">
			<?php echo"<input type='text' class='form-control' placeholder='Nome' name='nome' value='$name' required>";?>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		  </div>
		  <div class="form-group has-feedback">
			<?php echo"<input type='text' class='form-control' placeholder='Nome Completo' name='nome_completo'  value='$full_name' required>";?>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		  </div>
		  <div class="form-group has-feedback">
			<?php echo"<input type='email' class='form-control' placeholder='Email' name='email' value='$email' required>";?>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		  </div>
		  <div class="form-group has-feedback">
			<?php echo"<input type='password' class='form-control' placeholder='Palavra Passe' name='password'  value='' required>";?>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		  </div>
		  <div class="form-group has-feedback">
			<?php echo"<input type='password' class='form-control' placeholder='Rescreve à Password'  name='repassword' value='' required>";?>
			<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		  </div>
		  <div class="row">
			<div class="col-xs-8">
			</div>
			<div class="col-xs-4">
			  <button type="submit" class="btn btn-primary btn-block btn-flat">Alterar</button>
			</div><!-- /.col -->
		  </div>
		</form>
	</div>
</div>
</div>
<div class="col-sm-4">
</div>