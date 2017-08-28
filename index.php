<?php
session_start();
	$id=0;
	$var_img=0;
	$var_name=0;
	$var_quote=0;
	$year=date("Y");
	if(isset($_GET['problem'])){
		echo '<script language="javascript">';
		echo 'alert("Aconteceu um Erro.")';
		echo '</script>';
	}
	//echo"$id="+$_SESSION['id_user']+"; $var_img="+$_SESSION['var_img'];+" $var_name="+$_SESSION['var_name'];"";
		include ("config/config.php");

		if(isset($_GET['page'])){
			$page=$_GET['page'];
			
		}else{
			header("Location: includes/login.php");
		}
	if($_GET['page']!="auth"){
		if(isset($_SESSION['id_user'])){
			$id=$_SESSION['id_user'];
			$var_img=$_SESSION['var_img'];
			$var_name=$_SESSION['var_name'];
			$var_quote=$_SESSION['var_quote'];
			$var_friend=$_SESSION['var_friend'];
			$var_chat=$_SESSION['var_chat'];
		}else{
			echo"<script> window.location='includes/login.php'</script>";
		}
		
	
 ?>
<!DOCTYPE html>

<html>
  <head>
  	<!--




												  `-.`'.-'
											   `-.        .-'.
											`-.    -./\.-    .-'
												-.  /_|\  .-
											`-.   `/____\'   .-'.
										 `-.    -./.-""-.\.-      '
											`-.  /< (()) >\  .-'
										  -   .`/__`-..-'__\'   .-
										,...`-./___|____|___\.-'.,.
										   ,-'   ,` . . ',   `-,
										,-'   ________________  `-,
										   ,'/____|_____|_____\
										  / /__|_____|_____|___\
										 / /|_____|_____|_____|_\
										' /____|_____|_____|_____\
									  .' /__|_____|_____|_____|___\
									 ,' /|_____|_____|_____|_____|_\
		,,---''--...___...--'''--.. /../____|_____|_____|_____|_____\ ..--```--...___...--``---,,
								   '../__|_____|_____|_____|_____|___\
			  \    )              '.:/|_____|_____|_____|_____|_____|_\               (    /
			  )\  / )           ,':./____|_____|_____|_____|_____|_____\             ( \  /(
			 / / ( (           /:../__|_____|_____|_____|_____|_____|___\             ) ) \ \
			| |   \ \         /.../|_____|_____|_____|_____|_____|_____|_\           / /   | |
		 .-.\ \    \ \       '..:/____|_____|_____|_____|_____|_____|_____\         / /    / /.-.
		(=  )\ `._.' |       \:./ _  _ ___  ____ ____ _    _ _ _ _ _  _ ___\        | `._.' /(  =)
		 \ (_)       )       \./  											 \       (       (_) /
		  \    `----'         """"""""""""""""""""""""""""""""""""""""""""""""       `----'    /
		   \   ____\__         												       __/____   /
			\ (=\     \        													    /     /-) /
			 \_)_\     \     												     /     /_(_/
				  \     \                                                        /     /
				   )     )  _                                                _  (     (
				  (     (,-' `-..__                                    __..-' `-,)     )
				   \_.-''          ``-..____                  ____..-''          ``-._/
					`-._                    ``--...____...--''                    _.-'
						`-.._                                                _..-'
							 `-..__         	LOBO KNOWS ALL      __..-'
								   ``-..____                  ____..-''
											``--...____...--''

		-->
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Howl</title>
	<link rel='icon' href='imagem\icon.png'>
	<link rel='stylesheet' href='bootstrap/css/style.css'>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.5 -->
    <link rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>
    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <!-- Ionicons -->
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <!-- Theme style -->
    <link rel='stylesheet' href='dist/css/AdminLTE.min.css'>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel='stylesheet' href='dist/css/skins/_all-skins.min.css'>
	 <link rel='stylesheet' href='bootstrap/css/style_mine.css'>
	<!--chat stuff-->
	<script src='bower_components/angular/angular.js'></script>
	<script src='bower_components/rltm/web/rltm.js'></script>
	<script src='angular-chat.js'></script>
	<!--chat stuff-->
	<!--<script src="js/java_help"></script>-->
	
	
	
	<link href='css/featherlight.min.css' type='text/css' rel='stylesheet' >
	<link href='css/featherlight.gallery.min.css' type='text/css' rel='stylesheet' >
	<link rel='stylesheet' href='css/css.css'>
	<!-- Bootstrap 3.3.5 -->
    <link rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>
    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <!-- Ionicons -->
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <!-- Theme style -->
    <link rel='stylesheet' href='dist/css/AdminLTE.min.css'>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel='stylesheet' href='dist/css/skins/_all-skins.min.css'>
    <!-- iCheck -->
    <link rel='stylesheet' href='plugins/iCheck/flat/blue.css'>
    <!-- Morris chart -->
    <link rel='stylesheet' href='plugins/morris/morris.css'>
    <!-- jvectormap -->
    <link rel='stylesheet' href='plugins/jvectormap/jquery-jvectormap-1.2.2.css'>
    <!-- Date Picker -->
    <link rel='stylesheet' href='plugins/datepicker/datepicker3.css'>
    <!-- Daterange picker -->
    <link rel='stylesheet' href='plugins/daterangepicker/daterangepicker-bs3.css'>
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel='stylesheet' href='plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'>
	
	 
	 
	<!--move things-->
		<link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
	  <!--<link rel='stylesheet' href='/resources/demos/style.css'>-->
	  
	  <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
	  <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>

	<!--move things-->
	
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'></script>
        <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
	
  </head>
  <body class='hold-transition skin-purple layout-boxed sidebar-mini '>
    <!-- Site wrapper -->
    <div class='wrapper'>

      <header class='main-header'>
        <!-- Logo -->
        <a href='index.php?page=feed' class='logo'>
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class='logo-mini'><b>Howl</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class='logo-lg'><b>Howl</b> </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class='navbar navbar-static-top' role='navigation'>
          <!-- Sidebar toggle button-->
          <a href='#' class='sidebar-toggle' data-toggle='offcanvas' role='button'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </a>
          <div class='navbar-custom-menu'>
            <ul class='nav navbar-nav'>
              <!-- Messages: style can be found in dropdown.less-->
              
                
              <!-- Notifications: style can be found in dropdown.less -->
              <li class='dropdown notifications-menu'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                  <i class='fa fa-bell-o'></i>
					<!--  <span class='label label-warning'>0</span>-->
                </a>
                <ul class='dropdown-menu'>
                  <li class='header'>Notificações:</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class='menu'><?php

					if($stmt = $mysqli->prepare("SELECT  text FROM notification  WHERE id_user='$id' Order by id_notification DESC LIMIT 8")) {

						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($text_notification);
						$num_rows = $stmt->num_rows;
						
						if($num_rows>0) {
							while ($stmt->fetch()) {			
								echo"<li><a href='#'>$text_notification</a></li>";
							}
						}
					}else{
						echo"<li><a href='#'>Não Tem Nenhuma Notificação</a></li>";
					}
                    echo"</ul>
                  </li>
                  <li class='footer'><a href='index.php?page=notificarion'>Ver Todas</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class='dropdown user user-menu'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                  <img src='$var_img' class='user-image' alt='User Image'>
                  <span class='hidden-xs'>$var_name</span>
                </a>
                <ul class='dropdown-menu'>
                  <!-- User image -->
                  <li class='user-header'>
                    <img src='$var_img' class='img-circle' alt='User Image'>
                    <p>
                      $var_name - $var_quote
                    
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class='user-body'>
                    <div class='col-xs-4 text-center'>
                      <a href='index.php?page=friends'>Amigos</a>
                    </div>
                    <div class='col-xs-4 text-center'>
                      
                    </div>
                    <div class='col-xs-4 text-center'>
                      <a href='index.php?page=profile#settings'>Opções</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class='user-footer'>
                    <div class='pull-left'>
                      <a href='index.php?page=profile' class='btn btn-default btn-flat'>Perfil</a>
                    </div>
                    <div class='pull-right'>
                      <a href='index.php?page=sair'  class='btn btn-default btn-flat'>Sair</a>
						</script>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href='#' data-toggle='control-sidebar'><i class='fa fa-comment' aria-hidden='true'></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class='main-sidebar'>
        <!-- sidebar: style can be found in sidebar.less -->
        <section class='sidebar'>
          <!-- Sidebar user panel -->
          <div class='user-panel'>
            <div class='pull-left image'>
           <img src='$var_img' class='img-circle' alt='User Image'> 
            </div>
            <div class='pull-left info'>
               <p>$var_name</p>
			   <div class'tooltip'>";
			  
				if($stmt1 = $mysqli->prepare('Select on_off from user_account where user_account.id_user='.$id.' ')) {
					$stmt1->execute();
					$stmt1->store_result();
					$stmt1->bind_result($estado_on_off);
					$num_rows = $stmt1->num_rows;
					
					if($num_rows>0) {
						while ($stmt1->fetch()) {
							$page_on_off=$_GET['page'];
							if($estado_on_off==1){
								echo"<a href='index.php?page=change&case=0&page_where=$page_on_off' title='Mudar para Offline'><i class='fa fa-circle text-success'></i> Online</a>
								";
							}else if($estado_on_off==0){
								echo"<a href='index.php?page=change&case=1&page_where=$page_on_off' title='Mudar para Online'><i class='fa fa-circle text-danger'></i> Offline</a>
								";
							}
						}
					}
				}
			echo"</div>
			</div>
          </div>
          <!-- search form -->
          <form action='index.php?page=search_user' method='POST' class='sidebar-form'>
            <div class='input-group'>
              <input type='text' name='procurar' class='form-control' placeholder='Procurar...'>
              <span class='input-group-btn'>
                <button type='submit'  id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class='sidebar-menu'>
            <li class='header'><b>MENU DE NAVEGAÇÃO</b></li>
            <li><a href='index.php?page=feed'><i class='fa fa-globe'></i> <span>Feed</span> </a></li>
            <li><a href='index.php?page=friends'><i class='fa fa-user'></i> <span>Amigos</span></a></li>
            <li><a href='index.php?page=group'><i class='fa fa-users'></i> <span>Grupos</span> </a></li>
            <li><a href='index.php?page=tabela4'><i class='fa fa-exclamation-circle' aria-hidden='true'></i> <span> Questionario</span></a></li> 
          </ul>
		  
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Include serve para introduzir conteudo na pagina -->
	  <!-- Content Wrapper. Contains page content -->
      <div class='content-wrapper'>
        <!-- Content Header (Page header) -->
        <section class='content-header'>
        <!-- Main content -->
	<section class='content'>
	

	";}
				$file="includes/" .$page.".php";
				if(file_exists($file)){
					//echo"flag1";
					include("includes/$page.php");
				}else{
					//echo"flag2";
					include('includes/404.php');
				}
			//echo"$file;";	
	if($_GET['page']!="auth"){
	echo "
      <!-- =============================================== -->
	  
	   </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class='main-footer'>
        <div class='pull-right hidden-xs'>
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright Pedro Lobo nº11  2016-$year </strong> Todos os Direitos reservados .
      </footer>

      <!-- Control Sidebar -->
      <aside class='control-sidebar control-sidebar-dark'>
        <!-- Create the tabs -->
		
      
        <!-- Tab panes -->
        <div class='tab-content'>
          <div class='box-body'>
		  <form action='#' method='get' class='sidebar-form'>
            <div class='input-group'>
              <input type='text' name='q' class='form-control' placeholder='Procurar...'>
              <span class='input-group-btn'>
                <button type='submit' name='search' id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i></button>
              </span>
            </div>
			
          </form>";
		 
		$n_friend=0;
		
			if($stmt1 = $mysqli->prepare("SELECT user_account.id_user,name,user_image,on_off,id_chat FROM friend ,user_account,friend_user_account,`chat` WHERE  user_account.id_user=friend_user_account.id_user AND friend_user_account.id_friend=friend.id_friend AND friend_user_account.id_friend=$var_friend AND friend_state<>3 AND chat.id_user=user_account.id_user")) {
					$stmt1->execute();
					$stmt1->store_result();
					$stmt1->bind_result($id_user,$name,$user_image,$estado_on_off,$id_chat);
					$num_rows = $stmt1->num_rows;
					
					if($num_rows>0) {
						while ($stmt1->fetch()) {
							echo"
								 <div class='box box-primary collapsed-box box-solid'>
									<div class='box-header with-border'>
										  <div class='user-panel  '>
											<div class='pull-left image'>
												<img src='$user_image' class='img-circle' alt='User Image'> 
											</div>
											<div class='pull-left info'>
											
											   <p>$name</p>";
											   if($estado_on_off==1){
													echo"<a href='#'><i class='fa fa-circle text-success'></i> Online</a>";
											   } else if($estado_on_off==0){
													echo"<a href='#'><i class='fa fa-circle text-danger'></i> Offline</a>";
											   }
											   ?>
											</div>
										  </div>
											  <div class='box-tools pull-right'>
												<?php
													echo"<a class='btn btn-box-tool' href='index.php?page=chat1&user=$id_user' target='_blank' ><i class='fa fa-plus'></i></a></div><!-- /.box-tools -->
													</div><!-- /.box-header -->"
												?>
											</div>
											<hr>
									<?php
						}
					}
			}
		 
		?>
		 
        </div>
		</div>
      </aside><!-- /.control-sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->
	
	<!--my_script-->
	<script src='js/my_script.js' type='text/javascript'></script>
    <!-- Bootstrap 3.3.5 -->
    <script src='bootstrap/js/bootstrap.min.js'></script>
    <!-- AdminLTE App -->
    <script src='dist/js/app.min.js'></script>
	<!-- jQuery 2.1.4 -->
    <script src='plugins/jQuery/jQuery-2.1.4.min.js'></script>
    <!-- jQuery UI 1.11.4 -->
    <script src='https://code.jquery.com/ui/1.11.4/jquery-ui.min.js'></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src='bootstrap/js/bootstrap.min.js'></script>
    <!-- Morris.js charts -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js'></script>
    <script src='plugins/morris/morris.min.js'></script>
    <!-- Sparkline -->
    <script src='plugins/sparkline/jquery.sparkline.min.js'></script>
    <!-- jvectormap -->
    <script src='plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
    <script src='plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
    <!-- jQuery Knob Chart -->
    <script src='plugins/knob/jquery.knob.js'></script>
    <!-- daterangepicker -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js'></script>
    <script src='plugins/daterangepicker/daterangepicker.js'></script>
    <!-- datepicker -->
    <script src='plugins/datepicker/bootstrap-datepicker.js'></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src='plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'></script>
    <!-- Slimscroll -->
    <script src='plugins/slimScroll/jquery.slimscroll.min.js'></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src='dist/js/app.min.js'></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src='dist/js/pages/dashboard.js'></script>
    <!-- AdminLTE for demo purposes -->
    <script src='dist/js/demo.js'></script>
    <!-- jQuery 2.1.4 -->
    
    <!-- Bootstrap 3.3.5 -->
    <script src='bootstrap/js/bootstrap.min.js'></script>
    <!-- SlimScroll -->
    <script src='plugins/slimScroll/jquery.slimscroll.min.js'></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src='dist/js/app.min.js'></script>
    <!-- AdminLTE for demo purposes -->
    <script src='dist/js/demo.js'></script>
	
	<!-- jQuery 2.1.4 -->
    <script src='plugins/jQuery/jQuery-2.1.4.min.js'></script>
    <!-- Bootstrap 3.3.5 -->
    <script src='bootstrap/js/bootstrap.min.js'></script>
    <!-- DataTables -->
    <script src='plugins/datatables/jquery.dataTables.min.js'></script>
    <script src='plugins/datatables/dataTables.bootstrap.min.js'></script>
    <!-- SlimScroll -->
    <script src='plugins/slimScroll/jquery.slimscroll.min.js'></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src='dist/js/app.min.js'></script>
    <!-- AdminLTE for demo purposes -->
    <script src='dist/js/demo.js'></script>
	<script src='css/featherlight.min.js' type='text/javascript' charset='utf-8'></script>
	<script src='css/featherlight.gallery.min.js' type='text/javascript' charset='utf-8'></script>
	<script>
		$(document).ready(function(){
			$('.gallery a').featherlightGallery();
		});
	</script>
	
	
	<script src="js/my_script.js" type="text/javascript"></script>
	
	<script>
      $(function () {
        $('#example1').DataTable();
        $('#example2').DataTable({
          'paging': true,
          'lengthChange': false,
          'searching': false,
          'ordering': true,
          'info': true,
          'autoWidth': false
        });
      });
   
	</script>
  </body>
</html>
<?php
	}
?>