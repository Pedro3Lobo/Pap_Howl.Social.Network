
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Howl</title>
	<link rel="icon" href="..\imagem\icon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
  
       

<?php
$email=$_GET['email'];
if(isset($_POST['confirmar'])){
	?>
	  <div class="login-box">
      <div class="login-logo">
        <h3 class='box-title'><i class='fa fa-unlock-alt'> </i>Confirmação</h3>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
		
	
	<?php
		echo"<form action='alterar_password.php?email=$email'  name='myForm' enctype='multipart/form-data' method='POST'>"
		?>
			<label>
				<input type="password" name="password" class="form-control" placeholder="Introduza a nova palavra passe: " required>
			</label>
			<label>
				<input type="password" name="repassword" class="form-control" placeholder="Rescreva a nova palavra passe: " required>
			</label>
			<br>
			<label>
				<input type="submit"class="btn btn-default" value="Confirmar">
			</label>
		</form>
	</div>
</div>
	<?php
}else{
?>
 <div class="login-box">
      <div class="login-logo">
        <h3 class='box-title'><i class='fa fa-check-square'> </i>Confirmação</h3>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
		<?php echo"<form action='code_password.php?email=$email'  name='myForm' enctype='multipart/form-data' method='POST'>";?>
			<label>
				<input type="password" name="confirmar" class="form-control" placeholder="Introduze o codigo de confirmação: " required>
			</label>
			<label>
				<input type="submit" class="btn btn-default" value="Confirmar">
			</label>
		</form>
	</div>
</div>
<?php	
}
?>

      

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js"></script>
    
	
    </script>
  </body>
</html>

?>