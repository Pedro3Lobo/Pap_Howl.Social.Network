      	<?php
		$id_chat=null;
		$name=null;
		$id_user=$_GET['user'];
		
		if($stmt1 = $mysqli->prepare("SELECT user_account.id_user,name,user_image,on_off,id_chat FROM friend ,user_account,`chat` WHERE  user_account.id_user=$id_user AND user_account.id_user=chat.id_user")) {
			$stmt1->execute();
			$stmt1->store_result();
			$stmt1->bind_result($id_user,$name,$user_image,$estado_on_off,$id_chat);
			$num_rows = $stmt1->num_rows;
			
			if($num_rows>0) {
				while ($stmt1->fetch()) {
					
				}
			}
		}
	?>
	<div class="row">
            
              <!-- DIRECT CHAT PRIMARY -->
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <?php echo"<h4 class='box-title'> $name</h4>";?>
                  <div class="box-tools pull-right">
                    
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body"  style=" height: 500px; overflow-y: scroll;">
                  <!-- Conversations are loaded here -->
						<?php echo"<div id='show_$id_chat'></div>";?>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <form id="myForm" action="includes/userInfo.php" method="post">
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Escreve Messagem ..." class="form-control">
                      <span class="input-group-btn">
                        <input type="button" class="btn btn-primary btn-flat" id="sub" value="enviar ">
						<?php echo"
						<input type='hidden' value='$id' name='id'>
						<input type='hidden' value='$id_chat' name='chat'>
						<input type='hidden' value='$id_user' name='user'>";?>
                      </span>
                    </div>
                  </form>
                </div><!-- /.box-footer-->
              </div><!--/.direct-chat -->
           

            
          </div><!-- /.row -->

	
	
	</form>
	 
	<span id="result"></span>
	
	<?php
		echo"
		
		<script type='text/javascript'>
			
		
		$(document).ready(function() {
			setInterval(function () {
				//alert('includes/data.php?id=$id&user=$id_user&chat1=$id_chat&name=$var_name&name2=$name');
				$('#show_$id_chat').load('includes/data.php?id=$id&user=$id_user&chat1=$id_chat&chat2=$var_chat&name=$var_name&name2=$name&image=$var_img&image2=$user_image')
			}, 3000);
			
			
		});
		</script>";
	?>
