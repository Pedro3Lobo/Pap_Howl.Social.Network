

	<div class='box box-default'>
	<div class='box-header'>
		<h3 class='box-title'><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Inserir Notificação</h3>
	</div><!-- /.box-header -->
	<div class='box-body'>
		<?php echo"<form action='admin.php?page=insert_table2' method='post'>" ; ?>
		
		<div class="form-group has-feedback">
            <input type="text" class="form-control"  placeholder="Message" name="mensagem" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
         
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Inserir</button>
            </div><!-- /.col -->
          </div>
        </form>
	</div>
</div>