	<?php
	if(isset($_GET['group'])){
		$var_group=$_GET['group'];
	}else{
		echo"<script> window.location='index.php?page=404'</script>";
	}
	$n_post=0;
	$name_random_group=null;
	$desc_random_group=null;
	$group_image_random=null;
	$group_type=null;
	if($stmt = $mysqli->prepare('Select  name, `desc`, type, group_img from `group` where  `group`.id_group='.$var_group.' ')) {

							
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($name_random_group1,$desc,$group_type,$group_image_random1);
		$num_rows = $stmt->num_rows;
							
		if($num_rows>0) {
								
			while ($stmt->fetch()) {
				$name_random_group=$name_random_group1;
				$desc_random_group=$desc;
				$group_image_random=$group_image_random1;
				$group_type=$group_type;
			}
		}
	}else{
		//echo"<script> window.location='index.php?page=404'</script>";
	}
	if($stmt = $mysqli->prepare('Select  id_post from posts where posts.id_user='.$var_group.' Order by id_post DESC')) {

							
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id_post);
		$num_rows = $stmt->num_rows;
							
		if($num_rows>0) {
								
			while ($stmt->fetch()) {
				$n_post++;
				
			}
		}
	}
	
	echo"
	<!-- Content Header (Page header) -->
        <section class='content-header'>
          <h1>
            Perfil $name_random_group
          </h1>
          
        </section>

        <!-- Main content -->
        <section class='content'>

          <div class='row'>
            <div class='col-md-3'>

              <!-- Profile Image -->
              <div class='box box-primary'>
                <div class='box-body box-profile'>
                  <img class='profile-user-img img-responsive img-circle' src='imagem/posts/$group_image_random' alt='User profile picture'>
                  <h3 class='profile-username text-center'>$name_random_group</h3>
                  <p class='text-muted text-center'>$desc_random_group</p>";
				  $npost=0;
					if($stmt1 = $mysqli->prepare("SELECT COUNT(post_group.id_post_group) FROM post_group WHERE post_group.id_group=$var_group")) {
						$stmt1->execute();
						$stmt1->store_result();
						$stmt1->bind_result($count);
						$num_rows = $stmt1->num_rows;
						
						if($num_rows>0) {
							while ($stmt1->fetch()) {
								 $npost=$count;
							}
						}
					}
					
                  echo"<ul class='list-group list-group-unbordered'><li class='list-group-item'>
                      <b>Nº de Publicações</b> <a class='pull-right'>$npost</a>
                    </li>";
						$n_friend=0;
		
			if($stmt1 = $mysqli->prepare("SELECT COUNT(id_group_user_account) FROM group_user_account WHERE  group_user_account.id_group=$var_group ")) {
					$stmt1->execute();
					$stmt1->store_result();
					$stmt1->bind_result($count);
					$num_rows = $stmt1->num_rows;
					
					if($num_rows>0) {
						while ($stmt1->fetch()) {
							$n_friend=$count;
						}
					}
			}
                   echo"<li class='list-group-item'>
                      <b>Membros</b> <a class='pull-right'>$n_friend</a>
                    </li>
                  </ul>";
				  $random=0;
				  
							
					if($stmt = $mysqli->prepare("SELECT group_user_account.id_group FROM group_user_account WHERE group_user_account.id_group=$var_group AND group_user_account.id_user=$id")) {

						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($estado_de_a);
						$num_rows = $stmt->num_rows;
											
						if($num_rows>0) {
												
							while ($stmt->fetch()) {
								
									$random=$estado_de_a;
									echo"<a href='index.php?page=deixar_seguir&friend=$var_group' class='btn btn-danger btn-block'><b>Sair</b></a>";
							}
						
						}
					}else {
						echo"<a href='index.php?page=making_friends&friend=$var_group' class='btn btn-primary btn-block'><b>Juntar-se</b></a>";
					}	
                echo"</div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class='box box-primary'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Sobre o Grupo</h3>
                </div><!-- /.box-header -->";
				echo"<div class='box-body'>
				
				
				  <strong><i class='fa fa-arrow-right margin-r-5'></i> Tipo de Grupo</strong>";
				 if($group_type==2){	
					echo"<p class='text-muted'>Privado</p>";
				}else if($group_type==1){									
					echo"<p class='text-muted'>Publico</p>";
				}
					
				  echo"<hr>
				   <strong><i class='fa fa-book margin-r-5'></i>  Descrição</strong>
				  <p class='text-muted'>$desc_random_group</p>

				</div><!-- /.box-body -->";
				
				
				echo"
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class='col-md-9'>
              <div class='nav-tabs-custom'>
                <ul class='nav nav-tabs'>
                  <li class='active'><a href='#activity' data-toggle='tab'>Publicações</a></li>
                  <li><a href='#timeline' data-toggle='tab'>Galeria</a></li></ul>
                <div class='tab-content'>
                  <div class='active tab-pane' id='activity'>
                    <div>
					<form action='index.php?page=postar_group&group=$var_group'  name='myForm' enctype='multipart/form-data' method='POST'>";
				?>
					<div>
						 
					 </div>
					<div >
						<textarea  class='form-control' rows='3' name='text' id='text' placeholder='Em que estas a pensar...' ></textarea>
					</div>
					<div> 
					 <div class='btn-group'  >
						<input type='file' name='fileToUpload'  class='btn btn-default btn-sm'>
						
						
						<button type='submit' value='Upload Image' class='btn btn-default btn-sm'><i class='fa fa-paper-plane' name='submit' ></i><b> Publicar </b></button>
						</div>
					</div>				</form>

				<?php
				
					$t="";
					$y=0;
					$p=0;
					$name1;
					$ver=0;
					if($stmt = $mysqli->prepare('SELECT post_group.id_post_group,  post_group.post, post_group.text, post_group.data ,post_group.like1 , user_account.name, user_account.user_image FROM post_group, user_account WHERE post_group.id_group='.$var_group.' AND post_group.id_user=user_account.id_user Order by id_post_group DESC')) {

							
							$stmt->execute();
							$stmt->store_result();
							$stmt->bind_result($id_post,$post,$text,$data_post,$likes,$name_user, $img_user);
							$num_rows = $stmt->num_rows;
							
							if($num_rows>0) {
								
								while ($stmt->fetch()) {
								
										echo"
											<div class='box box-widget' id='$id_post ' >
													<div class='box-header with-border'>
													  <div class='user-block'>
														<img class='img-circle' src='$img_user' alt='user image'>
														<span class='username'><a href='#'>$name_user </a></span>
														<span class='description'>publicado à <b>$data_post </b></span>
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
																if($stmt1 = $mysqli->prepare("SELECT comment_group.date, comment_group.text, user_account.name, user_account.user_image From comment_group,user_account WHERE comment_group.id_post_group=$id_post   AND comment_group.id_user=user_account.id_user Order by comment_group.date ASC")) {
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
															
															
																echo"
																 </div><!-- /.box-body -->
																  
																</div><!-- /.col -->
																<div class='box-footer'>
																  <div class='post clearfix'>
																  <form class='form-horizontal' action='index.php?page=comment_group&post=$id_post&group=$var_group' method='POST'>
																	<div class='form-group margin-bottom-none'>
																	  <div class='col-sm-9'>
																		<input type class='form-control input-sm' name='comentario' placeholder='Response'>
																	  </div>                          
																	  <div class='col-sm-3'>
																		<button type='submit' class='btn btn-success pull-right btn-block btn-sm'><i class='fa fa-paper-plane' aria-hidden='true'></i>  Enviar</button>
																	  </div>                          
																	</div>                        
																  </form>
																  <div style='padding_top:100px'>
																 
																	  <a type='submit'class='btn btn-default btn-xs'href='index.php?page=postar&post_group=$id_post'><i class='fa fa-share'></i> Partilhar </a>";
																	  $var_like_ver=0;
																	  $like_count=0;
																	  $sql = "SELECT id_like_group, id_user,id_post_group FROM `like_group` WHERE id_post_group=$id_post ";
																		$result = $mysqli->query($sql);

																		if ($result->num_rows > 0) {
																		 
																		 // output data of each row
																			while($row = $result->fetch_assoc()) {
																				$like_count++;
																				if($id==$row['id_user']){
																					$var_like_ver=1;
																					echo"<a href='index.php?page=like_group&pages_where=$page&post=$id_post&group=$var_group'   class='btn btn-danger btn-xs'><i class='fa fa-thumbs-o-up'></i> Gostar</a>";
																				}
																			}
																		 
																		}else if($var_like_ver==0){
																			echo"<a href='index.php?page=like_group&pages_where=$page&post=$id_post&group=$var_group' class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Gostar</a>
																			";
																		}else{
																			echo"<a href='index.php?page=like_group&pages_where=$page&post=$id_post&group=$var_group' class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Gostar</a>
																			";
																		}
																		
																	  $like_id=0;
																		
																		
																		
																		
																	  
																	  
																	   echo"
																	  <span class='pull-right text-muted'>$like_count gostos - $var_comment_numb comentario</span>
																 
																  </div>
																</div><!-- /.post -->
																</div><!-- /.box-footer -->
															  </div><!-- /.box -->";
										  $y=$id_post;
										  //echo"$id_post,$post,$text,$id_pessoa,$privacy,$id_user,$name,$id_amigo1,$id_amigo2";
									}
									
								}
							}
							
								
						
					
				echo"
				</div>
                    <!-- Post -->
                    


                  </div><!-- /.tab-pane -->
                 <div class='tab-pane' id='timeline'>
                   <div class='container'>
					<div class='row'>
						<div class='col-md-12 gallery'>
							
					";
					// galeria de imagens ..............................................
					$var_contar=0;
					if($stmt = $mysqli->prepare("SELECT  id_post_group,post,`text`,`data`,like1,id_user FROM post_group WHERE post_group.id_group=$var_group  Order by id_post_group  DESC")) {

							
							$stmt->execute();
							$stmt->store_result();
							$stmt->bind_result($id_post,$post,$text,$data_post,$likes,$id_pessoa);
							$num_rows = $stmt->num_rows;
							
							if($num_rows>0) {
								
								while ($stmt->fetch()) {
									if($post!=null){
										$var_contar++;
										echo"<span class='col-lg-2 col-sm-1'>
											<a href='$post'>
												<img width='190px' height='190px' class='thumbnail' src='$post'>   
											</a>
										</span>";
										if($var_contar==3){
											$var_contar=0;
											echo"</div> <div class='row'>";
										}
									}
								}
							}	
						}
					
					if($var_contar<3){
						echo"</div> <!-- end of row -->  ";
					}
					//galeria de imagens.................................................
					?>
					
					</div> <!-- end of container -->
                      
                  </div><!-- /.tab-pane -->