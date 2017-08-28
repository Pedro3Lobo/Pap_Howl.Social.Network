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
	
	<script>
	
		function test(){
			alert("Volta para traz");
		}
	
	</script>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Howl</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Admin Login</p>
		
        <form action='admin.php?page=ver_admin' method='post'>
		<div class='form-group has-feedback'>
			<center><p class="btn btn-danger" onclick="test()"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Este Local é Unicamente para o Admin <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></p>
		
        </div>
          <div class='form-group has-feedback'>
            <input type='email' class='form-control' placeholder='Email do Utilizador' name='email'>
            <span class='glyphicon glyphicon-user form-control-feedback'></span>
          </div>
          <div class='form-group has-feedback'>
            <input type='password' class='form-control' placeholder='Palavra Passe' name='pass'>
            <span class='glyphicon glyphicon-lock form-control-feedback'></span>
          </div>
          <div class='row'>
           
            <div class='col-xs-4'>
              <button type='submit' class='btn btn-primary btn-block btn-flat'>Entrar</button>
            </div><!-- /.col -->
          </div>
        </form>
        <a href="#">Esqueci-me da Palavra Passe</a><br>
        <a href="register.php" class="text-center">Registar-se como novo membro</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
