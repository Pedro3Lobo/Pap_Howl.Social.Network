

	<div class='box box-default'>
	<div class='box-header'>
		<h3 class='box-title'><i class='fa fa-users'> </i> Inserir Utilizador</h3>
	</div><!-- /.box-header -->
	<div class='box-body'>
		<?php echo"<form action='admin.php?page=insert_table' method='post'>" ; ?>
		
		<div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nome" name="nome" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nome Completo" name="nome_completo" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Palavra Passe" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Rescreve à Password" name="repassword"required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>
	</div>
</div>