<?php
if(isset($_POST['confirmar'])){
}else{
?>

<div class='box'>
	<div class='box-header'>
		<h3 class='box-title'><i class='fa fa-users'> </i>Confirmação</h3>
	</div><!-- /.box-header -->
	<div class='box-body'>
		<form action='index.php?page=main_infor'  name='myForm' enctype='multipart/form-data' method='POST'>
			<input type="text" name="confirmar" placeholder="Introduza à Palavra Passe: " required>
			<input type="submit" value="Confirmar">
		</form>
	</div>
</div>

<?php
}
if(isset($_POST['confirmar'])){
$name=null;
$email=null;
$full_name=null;
$pass_word=null;

if($stmt = $mysqli->prepare('Select name, email, full_name, password  FROM user_account WHERE user_account.id_user='.$id.'')) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($name,$email,$full_name,$password);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {
		while ($stmt->fetch()) {
			$var_pass=$_POST['confirmar'];
			$hash=password_verify($var_pass,$password);
			if($hash==0){
				echo"<script> window.location='index.php?page=profile'</script>";				
			}
	
		}
	}
}

?>


<div class='box'>
	<div class='box-header'>
		<h3 class='box-title'><i class='fa fa-users'> </i> Alterar Informações do Utilizador</h3>
	</div><!-- /.box-header -->
	<div class='box-body'>
		<form action="index.php?page=update_infor" method="post">
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
<?php 
	} 
?>  