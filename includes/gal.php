<?php
include ("config/config.php");
					$t="";
					$y=0;
					$p=0;
					$name1;
					$ver=0;
					if(isset($_GET['img'])){
						$img=$_GET['img'];
						
					}else{
						$img=$post;
					}
					echo"O Resultado deve aparecer aqui $img";
					
					if($stmt = $mysqli->prepare('Select  id_post,post,text,data_post,Likes,id_pessoa,privacy,id_user,name,user_image,id_amigo1,id_amigo2 from posts,login,friends where posts.post='.$img.'')) {

							
							$stmt->execute();
							$stmt->store_result();
							$stmt->bind_result($id_post,$post,$text,$data_post,$likes,$id_pessoa,$privacy,$id_user,$name,$image_user_post);
							$num_rows = $stmt->num_rows;
							
							if($num_rows>0) {
								
								while ($stmt->fetch()) {
									$comment_post=$id_post;
									//echo"$id_post,$post,$text,$id_pessoa,$privacy,$id_user,$name,$id_amigo1,$id_amigo2";

									$ves=0;
									$p++;
									
								//echo"<p> $p-$post <b>id pessoa</b>=$id_pessoa<b>\n id</b>=$id\n <b>id amigo1</b>=$id_amigo1 \n <b>id amigo2</b>=$id_amigo2</p>";
											
								if($id==$id_pessoa){
									//echo"damn 1 ";
									$ves=2;
													
								}
								if(($id==$id_amigo1)||($id_pessoa==$id_amigo2)){
									//echo"damn 2";
									$ves=2;
													
								}else if(($id==$id_amigo1)||($id_pessoa==$id_amigo2)){
									//echo"damn 3";
									$ves=2;
													
								}
									
								if(($ves==2)&&($y!=$id_post)){
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
																if($stmt1 = $mysqli->prepare('Select id_comment,id_user_comment,id_posts,data,text,id_user,name,user_image from comment, login where id_posts='.$comment_post.'  and  comment.id_user_comment=login.id_user Order by data ASC ')) {
																	$stmt1->execute();
																	$stmt1->store_result();
																	$stmt1->bind_result($id_comment,$id_user_comment,$id_posts,$data,$text,$user2,$name1,$user_image_comment);
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
																 
																	  <a type='submit'class='btn btn-default btn-xs'href='index.php?page=postar&post=$id_post'><i class='fa fa-share'></i> Partilhar </a>
																	  <button class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Gostar</button>
																	  <span class='pull-right text-muted'>$likes gostos - $var_comment_numb comentario</span>
																 
																  </div>
																</div><!-- /.post -->
																</div><!-- /.box-footer -->
															  </div><!-- /.box -->";
										  $y=$id_post;
										  //echo"$id_post,$post,$text,$id_pessoa,$privacy,$id_user,$name,$id_amigo1,$id_amigo2";
									}
									
								}
							}
							
								
						}
					
				?>
				</div>
    </div><!-- /.box (chat box) -->