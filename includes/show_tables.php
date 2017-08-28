<div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Menu Table
              
            </h1>
           
          </section>

          <!-- Main content -->
          <section class="content">
            
           
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Features</h3>
              </div>
              <div class="box-body">
                <select class="btn btn-primary" onchange="teste(this.value);" role="menu">
					<option >Choose the table <i class="fa fa-user" ></i></option>
                    <?php
					if(isset($_GET['cod'])){
						$cod=$_GET['cod'];
					}else{
						$cod=0;
					}
					if($cod==1){
						echo"<option selected value='table.php?key=$key_var'>Users <i class='fa fa-user' ></i></option>";
					}else{
						echo"<option value='table.php?key=$key_var'>Users <i class='fa fa-user' ></i></option>";
					}
					if($cod==2){
						echo"<option selected value='table4.php?key=$key_var'>Posts <i class='fa fa-picture-o' ></i></option>";
					}else {
						echo"<option value='table4.php?key=$key_var'>Posts <i class='fa fa-picture-o' ></i></option>";
					} 
					
					if($cod==3){
						echo"<option selected value='table5.php?key=$key_var'>Friends <i class='fa fa-users' ></i></option>";
					}else{
						echo"<option value='table5.php?key=$key_var'>Friends <i class='fa fa-users' ></i></option>";
					}
					if($cod==4){
						echo"<option selected value='table6.php?key=$key_var'>Groups <i class='fa fa-users' ></i></option>";
					}else{
						echo"<option  value='table6.php?key=$key_var'>Groups <i class='fa fa-users' ></i></option>";
					}
					if($cod==5){
						echo"<option selected value='table3.php?key=$key_var'>Comment <i class='fa fa-commenting' ></i></option>";
					}else{
						echo"<option value='table3.php?key=$key_var'>Comment <i class='fa fa-commenting' ></i></option>";
					}
					if($cod==6){
						echo"<option selected value='table2.php?key=$key_var'>Notifications <i class='fa fa-flag' ></i></option>";
					}else{
						echo"<option value='table2.php?key=$key_var'>Notifications <i class='fa fa-flag' ></i></option>";
					}
					?>
				</select>
				<div id='txtHint'></div>		

				
              </div><!-- /.box-body -->
            </div><!-- /.box -->
			 </section><!-- /.content -->
        </div><!-- /.container -->