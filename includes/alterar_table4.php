<div class="col-sm-4">
</div>
<div class="col-sm-4">
	
		<?php
		
		$id_post=$_GET['post'];
		$id_user1=$_GET['user'];	
		echo"<form action='admin.php?page=update_table4&id=$id_post'  name='myForm' enctype='multipart/form-data'  method='POST'>
		<select name='user' class='btn btn-default btn-sm'><i class='fa fa-folder-open' ></i>";
		if($stmt = $mysqli->prepare("SELECT * FROM user_account")) {
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($id_user, $name, $password, $email, $full_name, $quote, $educacion, $localization, $notes, $user_image, $on_off);
			$num_rows = $stmt->num_rows;
			
			if($num_rows>0) {
				while ($stmt->fetch()) {
					if($id_user==$id_user1){
						echo"<option selected value='$id_user'>$name</option>";
					}else{
						echo"<option value='$id_user'>$name</option>";
					}
				}
			}
		}
		
		$post=null;
		$text=null;
		$date=null;
		$privaci=null;
		if($stmt3 = $mysqli->prepare("SELECT post.post,post.text,post.privacy FROM post WHERE post.id_post=$id_post")) {
			$stmt3->execute();
			$stmt3->store_result();
			$stmt3->bind_result($post,$text,$privaci);
			$num_rows = $stmt3->num_rows;
			if($num_rows>0) {
				while ($stmt3->fetch()) {
				
		?>
		</select>
		<div >
			<?php echo"<textarea  class='form-control' value='$text' rows='3' name='text' id='text' placeholder='' ></textarea>";?>
		</div>
		
		<div> 
		 <div class='btn-group'  >
			<input type='file' class="btn btn-default" name='fileToUpload'  >
			</div>
			
			<select name='privaci' class='btn btn-default btn-sm'><i class='fa fa-folder-open' ></i>
				<?php
							if($privaci==1){
								echo"<option selected value='1'>Publico</option>";
							}else{
								echo"<option value='1'>Publico</option>";
							}
							if($privaci==2){
								echo"<option selected value='2'>Amigos</option>";
							}else{
								echo"<option value='2'>Amigos</option>";
							}
							if($privaci==3){
								echo"<option selected value='3'>Apenas Eu</option>";
							}else{
								echo"<option value='3'>Apenas Eu</option>";
							}
						}
					}
				}
				?>
			</select>
		
			<button type='submit' value='Upload Image' class='btn btn-default btn-sm'><i class='fa fa-paper-plane' name='submit' ></i><b> Publicar </b></button>
			</div>
		</div>
	</form>
</div>
<div class="col-sm-4">
</div>	