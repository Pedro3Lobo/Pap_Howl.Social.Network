	<?php
		$comment_post=0;
		$n_post_count=0;
		$default_n_post=10;
		$var_post_awesome=0;
		if(isset($_POST['n_post'])){
			$default_n_post=$_POST['n_post'];
		}
		
		
	?>

	<div class="box box-success" >
	
                <div class="box-header">
					<i class="fa fa-globe"></i>
					<h3 class="box-title">Feed</h3>
					
                </div>
				<div>
				
				<form action='index.php?page=postar'  name='myForm' enctype='multipart/form-data' onsubmit='return validateForm()' method='POST'>
				
					<div>
						 
					 </div>
					<div >
						<textarea  class='form-control' rows='3' name='text' id='text' placeholder='Em que estas a pensar...' ></textarea>
					</div>
					<div> 
					 <div class='btn-group'  >
						<input type='file' class="btn btn-default" name='fileToUpload'  >
						</div>
						
						<select name='privaci' class='btn btn-default btn-sm'><i class='fa fa-folder-open' ></i>
							<option selected value='1'>Publico</option>
							<option value='2'>Amigos</option>
							<option value='3'>Apenas Eu</option>
						</select>
						<button type='submit' value='Upload Image' class='btn btn-default btn-sm'><i class='fa fa-paper-plane' name='submit' ></i><b> Publicar </b></button>
						</div>
					</div>
				</form>
				</div>
				<div >
				<?php
					$t="";
					$y=0;
					$p=0;
					$name1;
					$ver=0;
					$veri="imagem/posts/";
					if($stmt = $mysqli->prepare("SELECT  DISTINCT post.id_post, post.post, post.text, post.data ,post.like1,user_account.name,user_account.user_image FROM post, user_account, friend,friend_user_account WHERE friend.id_friend=$var_friend AND friend.id_friend=friend_user_account.id_friend AND post.id_user=friend_user_account.id_user AND friend.id_friend=friend_user_account.id_friend AND post.id_user=user_account.id_user OR post.id_user=$id AND user_account.id_user=post.id_user Order by id_post DESC")) {

							
							$stmt->execute();
							$stmt->store_result();
							$stmt->bind_result($id_post,$post,$text,$data_post,$likes,$name,$image_user_post);
							$num_rows = $stmt->num_rows;
							
							if($num_rows>0) {
								
								while ($stmt->fetch()) {
								
										echo"
											<div class='box box-widget' id='$id_post' >
													<div class='box-header with-border'>
													  <div class='user-block'>
														<img class='img-circle' src='$image_user_post' alt='user image'>
														<span class='username'><a href='#'>$name</a></span>
														<span class='description'>publicado à <b>$data_post</b></span>
													  </div><!-- /.user-block -->
													  <div class='box-tools'>
														<button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
													  </div><!-- /.box-tools -->
													</div><!-- /.box-header -->
													<div class='box-body'>";
													if($post!=null){
													  echo"<img class='img-responsive pad' src='$post' alt='Photo'>";
													}
													 echo" <p><b>$text</b></p>
													</div><!-- /.box-body -->
													 <div class='box box-primary collapsed-box box-solid'>
													<div class='box-header with-border'>
													  <h3 class='box-title'>Comentarios</h3>
													  <div class='box-tools pull-right'>
														<button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button></div><!-- /.box-tools -->
														</div><!-- /.box-header -->
														<div class='box-body'>";
													
																$var2=null;
																$var_comment_numb=0;
																if($stmt1 = $mysqli->prepare('SELECT comment.date, comment.text, user_account.name, user_account.user_image From comment,user_account WHERE comment.id_post='.$id_post.'   AND comment.id_user=user_account.id_user
																Order by comment.date ASC')) {
																	$stmt1->execute();
																	$stmt1->store_result();
																	$stmt1->bind_result($data,$text,$name1,$user_image_comment);
																	$num_rows = $stmt1->num_rows;
																													
																	if($num_rows>0) {
																		while ($stmt1->fetch()) {
																			//if($id_user_comment==$user2){
																				$var_comment_numb++;
																				echo"
																				<div class='box-footer box-comments'>
																					<div class='box-comment'>
																						<!-- User image -->
																						<img class='img-circle img-sm' src='$user_image_comment' alt='user image'>
																						<div class='comment-text'>
																							<span class='username'>
																								$name1
																								<span class='text-muted pull-right'>$data</span>
																							</span><!-- /.username -->
																							 $text
																						</div><!-- /.comment-text -->
																					</div><!-- /.box-comment -->
																				</div><!-- /.box-footer -->";
																				
																			//}
																																			
																		}
																	}
																}
															$data_comentar=date("Y-m-d h:i:sa");
															
																echo"
																 </div><!-- /.box-body -->
																  
																</div><!-- /.col -->
																<div class='box-footer'>
																  <div class='post clearfix'>
																  <form class='form-horizontal' action='index.php?page=comments&post=$id_post' method='POST'>
																	<div class='form-group margin-bottom-none'>
																	  <div class='col-sm-9'>
																		<input type class='form-control input-sm' name='comentario' placeholder='Response'>
																	  </div>                          
																	  <div class='col-sm-3'>
																		<button type='submit' class='btn btn-success pull-right btn-block btn-sm'><i class='fa fa-paper-plane' aria-hidden='true'></i>  comentar</button>
																	  </div>                          
																	</div>                        
																  </form>
																  <div style='padding_top:100px'>
																 
																	  <a type='submit'class='btn btn-default btn-xs'href='index.php?page=postar&post=$id_post'><i class='fa fa-share'></i> Partilhar </a>";
																	  $var_like_ver=0;
																	  $like_count=0;
																	  $sql = "SELECT id_like, id_user,id_post FROM `like` WHERE id_post=$id_post ";
																		$result = $mysqli->query($sql);

																		if ($result->num_rows > 0) {
																		 
																		 // output data of each row
																			while($row = $result->fetch_assoc()) {
																				$like_count++;
																				if($id==$row['id_user']){
																					$var_like_ver=1;
																					echo"<a href='index.php?page=like&pages_where=$page&post=$id_post'   class='btn btn-danger btn-xs'><i class='fa fa-thumbs-o-up'></i> Gostar</a>";
																				}else{
																					echo"<a href='index.php?page=like&pages_where=$page&post=$id_post' class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Gostar</a>";
																				}
																			}
																		 
																		}else if($var_like_ver==0){
																			echo"<a href='index.php?page=like&pages_where=$page&post=$id_post' class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Gostar</a>
																			";
																		}else{
																			echo"<a href='index.php?page=like&pages_where=$page&post=$id_post' class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Gostar</a>
																			";
																		}
																		
																	  $like_id=0;
																		
																		
																		
																		
																	  
																	  
																	   echo"<span class='pull-right text-muted'>$like_count gostos - $var_comment_numb comentario</span>
																 
																  </div>
																</div><!-- /.post -->
																</div><!-- /.box-footer -->
															  </div><!-- /.box -->";
										  $y=$id_post;
										  
										 if($n_post_count==$default_n_post){
												$var_unique=$default_n_post+30;
												echo"<form action='index.php?page=feed#$p' enctype='multipart/form-data' method='POST'><center><button type='submit' name='n_post' value='$var_unique' class='btn btn-primary'><i class='fa fa-plus' name='submit' ></i><b>  Continuar </b></button></i></a><form>";
										 
										} 
									
									
								}
							}
							
								
						}
						
					echo"</div>
					</div><!-- /.box (chat box) -->"
?>
<script type="text/javascript">
	var var3="";
	function validateForm() {
		var x = document.forms["myForm"]["text"].value;
		if (x == "") {
			alert("Porfavor Preencha Este Campo");
			return false;
		}
		if (x.includes()==true) {
			alert("Porfavor Preencha Este Campo");
			return false;
		}
	}
</script>
<div>