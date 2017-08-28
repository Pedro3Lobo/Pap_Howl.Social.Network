<!DOCTYPE html>
<?php
	session_start();
	include ("../config/config.php");
	$key_var=null;
	if($_GET['page']!="ver_admin"){
		if((isset($_SESSION['var_master_key']))&&($_SESSION['var_master_key']==sha1("Pedro Henrique Gonçalves Lobo"))){
			$key_var=$_SESSION['var_master_key'];
		}else{
			header("Location: login.php");
		}
	}
	if(isset($_GET['page'])){
		$page=$_GET['page'];
			
	}else{
		header("Location: login.php");
	}
	
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Back Office | Howl</title>
    <link rel='icon' href='imagem\icon.png'>
	<link rel='stylesheet' href='../bootstrap/css/style.css'>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.5
    <link rel='stylesheet' href='../bootstrap/css/bootstrap.min.css'> -->
    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <!-- Ionicons -->
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <!-- Theme style -->
    <link rel='stylesheet' href='../dist/css/AdminLTE.min.css'>
    
	
	
	
	
	<link href='../css/featherlight.min.css' type='text/css' rel='stylesheet' >
	<link href='../css/featherlight.gallery.min.css' type='text/css' rel='stylesheet' >
	
	<!-- Bootstrap 3.3.5 -->
    <link rel='stylesheet' href='../bootstrap/css/bootstrap.min.css'>
    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <!-- Ionicons -->
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <!-- Theme style -->
    <link rel='stylesheet' href='../dist/css/AdminLTE.min.css'>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel='stylesheet' href='../dist/css/skins/_all-skins.min.css'>
    <!-- iCheck -->
    <link rel='stylesheet' href='../plugins/iCheck/flat/blue.css'>
    <!-- Morris chart -->
    <link rel='stylesheet' href='../plugins/morris/morris.css'>
    <!-- jvectormap -->
    <link rel='stylesheet' href='../plugins/jvectormap/jquery-jvectormap-1.2.2.css'>
    <!-- Date Picker -->
    <link rel='stylesheet' href='../plugins/datepicker/datepicker3.css'>
    <!-- Daterange picker -->
    <link rel='stylesheet' href='../plugins/daterangepicker/daterangepicker-bs3.css'>
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel='stylesheet' href='../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'>
	
	 
	 
	<!--move things-->
		<link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
	  <!--<link rel='stylesheet' href='/resources/demos/style.css'>-->
	  
	  <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
	  <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>

	<!--move things-->
	
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  <script>
    function teste(str){
		
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
		xmlhttp.open("GET",str,true);
		xmlhttp.send();	
    }
</script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="admin.php?page=show_tables" class="navbar-brand"><b>Back Office</a>
            
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
          
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
					<li><a href="login.php">Sign out</a></li>
				</ul>
				
              </div><!-- /.navbar-custom-menu -->
			   
          </div><!-- /.container-fluid -->
		  
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
			<?php
				$file=$page.".php";
				if(file_exists($file)){
					//echo"flag1";
					include("$page.php");
				}else{
					//echo"flag2";
					include('404.php');
				}
			?>	
         
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            
          </div>
          
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->
	

     <script src='../plugins/jQuery/jQuery-2.1.4.min.js'></script>
    <!-- Bootstrap 3.3.5 -->
    <script src='../bootstrap/js/bootstrap.min.js'></script>
    <!-- AdminLTE App -->
    <script src='../dist/js/app.min.js'></script>
	<!-- jQuery 2.1.4 -->
    <script src='../plugins/jQuery/jQuery-2.1.4.min.js'></script>
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
    <script src='../plugins/morris/morris.min.js'></script>
    <!-- Sparkline -->
    <script src='../plugins/sparkline/jquery.sparkline.min.js'></script>
    <!-- jvectormap -->
    <script src='../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
    <script src='../plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
    <!-- jQuery Knob Chart -->
    <script src='../plugins/knob/jquery.knob.js'></script>
    <!-- daterangepicker -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js'></script>
    <script src='../plugins/daterangepicker/daterangepicker.js'></script>
    <!-- datepicker -->
    <script src='../plugins/datepicker/bootstrap-datepicker.js'></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src='../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'></script>
    <!-- Slimscroll -->
    <script src='../plugins/slimScroll/jquery.slimscroll.min.js'></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src='../dist/js/app.min.js'></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src='../dist/js/pages/dashboard.js'></script>
    <!-- AdminLTE for demo purposes -->
    <script src='../dist/js/demo.js'></script>
    <!-- jQuery 2.1.4 -->
    
    <!-- Bootstrap 3.3.5 -->
    <script src='../bootstrap/js/bootstrap.min.js'></script>
    <!-- SlimScroll -->
    <script src='../plugins/slimScroll/jquery.slimscroll.min.js'></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src='../dist/js/app.min.js'></script>
    <!-- AdminLTE for demo purposes -->
    <script src='../dist/js/demo.js'></script>
	
	<!-- jQuery 2.1.4 -->
    <script src='../plugins/jQuery/jQuery-2.1.4.min.js'></script>
    <!-- Bootstrap 3.3.5 -->
    <script src='../bootstrap/js/bootstrap.min.js'></script>
    <!-- DataTables -->
    <script src='../plugins/datatables/jquery.dataTables.min.js'></script>
    <script src='../plugins/datatables/dataTables.bootstrap.min.js'></script>
    <!-- SlimScroll -->
    <script src='../plugins/slimScroll/jquery.slimscroll.min.js'></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src='../dist/js/app.min.js'></script>
    <!-- AdminLTE for demo purposes -->
    <script src='../dist/js/demo.js'></script>
	<script src='../css/featherlight.min.js' type='text/javascript' charset='utf-8'></script>
	<script src='../css/featherlight.gallery.min.js' type='text/javascript' charset='utf-8'></script>
	<script>
		$(document).ready(function(){
			$('.gallery a').featherlightGallery();
		});
	</script>

</html>
