	<?php
	echo"
	<!-- Content Header (Page header) -->
        <section class='content-header'>
          <h1>
            Perfil $var_name
          </h1>
          
        </section>

        <!-- Main content -->
        <section class='content'>

          <div class='row'>
            <div class='col-md-3'>

              <!-- Profile Image -->
              <div class='box box-primary'>
                <div class='box-body box-profile'>
                  <img class='profile-user-img img-responsive img-circle' src='$var_img' alt='User profile picture'>
                  <h3 class='profile-username text-center'>$var_name</h3>
                  <p class='text-muted text-center'>$var_quote</p>

                  <ul class='list-group list-group-unbordered'>";
				  $n_post=0;
				 if($stmt1 = $mysqli->prepare("SELECT COUNT(post.id_post) FROM post WHERE post.id_user=$id")) {
										$stmt1->execute();
										$stmt1->store_result();
										$stmt1->bind_result($count);
										$num_rows = $stmt1->num_rows;
										
										if($num_rows>0) {
											while ($stmt1->fetch()) {
												 $n_post=$count;
											}
										}
					}
                    echo"<li class='list-group-item'>
                      <b>Nº de Publicações</b> <a class='pull-right'>$n_post</a>
                    </li>";
						$n_friend=0;
		
			if($stmt1 = $mysqli->prepare("SELECT COUNT(id_friend_user_account) FROM friend,friend_user_account,user_account WHERE  friend_user_account.id_friend=friend.id_friend AND  friend.id_user=$id AND user_account.id_user=friend_user_account.id_user AND friend_state= 2")) {
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
                      <b>Amigos</b> <a class='pull-right'>$n_friend </a>
                    </li>
                  </ul>
				  </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class='box box-primary'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Sobre Mim</h3>
                </div><!-- /.box-header -->";
				
				if($stmt = $mysqli->prepare('Select  educacion,localization,notes from user_account where user_account.id_user='.$id.'')) {

					
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($edu,$loc,$notes);
					$num_rows = $stmt->num_rows;
					
					if($num_rows>0) {
						while ($stmt->fetch()) {
							echo"<div class='box-body'>
							  <strong><i class='fa fa-book margin-r-5'></i>  Educação</strong>
							  <p class='text-muted'>
								$edu
							  </p>

							  <hr>

							  <strong><i class='fa fa-map-marker margin-r-5'></i> Localização</strong>
							  <p class='text-muted'>$loc</p>

							  <hr>

							  

							  <strong><i class='fa fa-file-text-o margin-r-5'></i> Notas Sobre Mim</strong>
							  <p>$notes</p>
							</div><!-- /.box-body -->";
						}
					}
				}
				
				echo"
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class='col-md-9'>
              <div class='nav-tabs-custom'>
                <ul class='nav nav-tabs'>
                  <li class='active'><a href='#activity' data-toggle='tab'>Publicações</a></li>
                  <li><a href='#timeline' data-toggle='tab'>Galeria</a></li>
				  <li><a href='#stat' data-toggle='tab'>Estatisticas</a></li>
				  <li><a href='#settings' data-toggle='tab'> Alterar Informações</a></li>
				  </ul>
                <div class='tab-content'>
                  <div class='active tab-pane' id='activity'>
                    <div >";
				
					$t="";
					$y=0;
					$p=0;
					$name1;
					$ver=0;
					if($stmt = $mysqli->prepare("SELECT post.id_post, post.post, post.text, post.data ,post.like1 FROM post, user_account WHERE post.id_user=$id AND post.id_user=user_account.id_user Order by id_post DESC")) {

							
							$stmt->execute();
							$stmt->store_result();
							$stmt->bind_result($id_post,$post,$text,$data_post,$likes);
							$num_rows = $stmt->num_rows;
							
							if($num_rows>0) {
								
								while ($stmt->fetch()) {
								
										echo"
											<div class='box box-widget' id='$id_post '   >
													<div class='box-header with-border'>
													  <div class='user-block'>
														<img class='img-circle' src='$var_img' alt='user image'>
														<span class='username'><a href='#'>$var_name </a></span>
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
														<div class='box-body'>
														";
													
																$var2=null;
																$var_comment_numb=0;
																if($stmt1 = $mysqli->prepare('SELECT comment.date, comment.text, user_account.name, user_account.user_image From comment,user_account WHERE comment.id_post='.$id_post.'   AND comment.id_user=user_account.id_user
																Order by comment.date ASC ')) {
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
																		<button type='submit' class='btn btn-success pull-right btn-block btn-sm'><i class='fa fa-paper-plane' aria-hidden='true'></i>  Enviar</button>
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
										  //echo"$id_post,$post,$text,$id_pessoa,$privacy,$id_user,$name,$id_amigo1,$id_amigo2";
									}
									
								}
							
							
								
						}
					
				echo"
				</div>
                  </div><!-- /.tab-pane -->
                  <div class='tab-pane' id='timeline'>
                   <div class='container'>
						<div class='col-md-12 gallery'>
						<div class='row'>
							
						 ";
					// galeria de imagens ..............................................
					$var_contar=0;
					if($stmt = $mysqli->prepare('SELECT  id_post,post,text,data,like1 from post WHERE post.id_user='.$id.' Order by id_post DESC')) {

							
							$stmt->execute();
							$stmt->store_result();
							$stmt->bind_result($id_post,$post,$text,$data_post,$likes);
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
					//galeria de imagens.................................................
					if($var_contar<3){
						echo"</div> <!-- end of row -->  ";
					}
					?>
					</div>
					</div> <!-- end of container -->
					
		
				</div><!-- /.tab-pane -->
				<div class='tab-pane' id='stat' >
					
					  <table class='table table-bordered table-striped'>
						<thead>
						  <tr>
							<th>Característica</th>
							<th>Nº</th>							
						  </tr>
						</thead>
						<tbody>
						<?php
						$humor=0;
						$carismatico=0;
						$happy=0;
						$modest=0;
						$imaginative=0;
						if($stmt = $mysqli->prepare("SELECT stats,id_user FROM stat WHERE id_user=$id  ")) {
						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($stats,$id_user);
						$num_rows = $stmt->num_rows;
							
							if($num_rows>0) {
							
								while ($stmt->fetch()) {
									if($stats==1){
										$humor++;
									}else if($stats==2){
										$carismatico++;
									}else if($stats==3){
										$happy++;
									}else if($stats==4){
										$modest++;
									}else if($stats==5){
										$imaginative++;
									}
								
									
									
								}
								
						
								$stmt->close();		
								
							}		
							
						
									
						}
						echo"<tr  class='active'>
									<td>Humor</td>
									<td>$humor Pontos</td>
								</tr>
								<tr >
									<td>Carisma</td>
									<td>$carismatico Pontos</td>
								</tr>
								<tr class='active'>
									<td>Feliz</td>
									<td>$happy Pontos</td>
								</tr>
								<tr >
									<td>Modesto</td>
									<td>$modest Pontos</td>
								</tr >
								<tr class='active'>
									<td>Imaginativo</td>
									<td>$imaginative Pontos</td>
								</tr>";	?>
						
						</tbody>
				
					  </table>
					  
					
				
			
				</div><!-- /.tab-pane -->
				<div class='tab-pane' id='settings' >
				  
				
					<?php
					$edu=null;
					$loc=null;
					$notes=null;
					$key_word=null;
					if($stmt = $mysqli->prepare('Select  email,`password`,`educacion`,`localization`,`notes` FROM user_account WHERE user_account.id_user='.$id.'')) {

					
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($email00,$pass_word,$edu,$loc,$notes);
					$num_rows = $stmt->num_rows;
					
						if($num_rows>0) {
							while ($stmt->fetch()) {
								
								
							}
						}
					}
					echo"
					
					<a href='index.php?page=main_infor'>Alterar as Informações do Utilizador</a>
					<hr>
                    <form class='form-horizontal'action='index.php?page=infor_user' enctype='multipart/form-data' method='POST'>
                      <div class='form-group'>
                        <label for='inputName' class='col-sm-2 control-label'>Onde estudas:</label>
                        <div class='col-sm-10'>
                          <input type='text' name='edu' class='form-control' id='inputName' placeholder='Educação' value='$edu' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputEmail' class='col-sm-2 control-label'>Localização:</label>
                        <div class='col-sm-10'>
                          <input type='text' name='local' class='form-control' id='inputEmail' placeholder='Localização' value='$loc' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputName' class='col-sm-2 control-label'>Notas Sobre Ti:</label>
                        <div class='col-sm-10'>
                          <input type='text'name='notas' class='form-control' id='inputName' placeholder='Notas' value='$notes'required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputExperience' class='col-sm-2 control-label'>Uma Frase Que Te Descreve:</label>
                        <div class='col-sm-10'>
                          <input type='text' name='quote' class='form-control' id='inputExperience' placeholder='Experience' value='$var_quote' required>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputSkills' class='col-sm-2 control-label'>Mudar a imagem de Perfil:</label>
                        <div class='col-sm-10'>
                          <input type='file' name='fileToUpload' value='$var_img' class='btn btn-default btn-sm'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <div class='col-sm-offset-2 col-sm-10'>
                          <button type='submit' class='btn btn-danger'>Confirmar</button>
                        </div>
                      </div>
                    </form>
					
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->";
					
      ?>
	 <script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "Top U.S Smartphone Operating Systems By Market Share, Q3 2012"
      },
      data: [
      {
       type: "doughnut",
       dataPoints: [
       {  y: 53.37, indexLabel: "Android" },
       {  y: 35.0, indexLabel: "Apple iOS" },
       {  y: 7, indexLabel: "Blackberry" },
       {  y: 2, indexLabel: "Windows Phone" },
       {  y: 5, indexLabel: "Others" }
       ]
     }
     ]
   });

    chart.render();
  }
  </script>
