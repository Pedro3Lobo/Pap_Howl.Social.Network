<?php 
include ("../config/config.php");
$id=$_GET['id'];
$id_chat=$_GET['chat1'];
$var_chat=$_GET['chat2'];
$name=$_GET['name2'];
$var_name=$_GET['name'];
$id_user=$_GET['user'];
$image=$_GET['image'];
$image2=$_GET['image2'];
//echo"SELECT * FROM `chat_user_account` WHERE id_user=$id AND id_chat=$id_chat OR id_user=$id_user AND id_chat=$var_chat ";
$result = $mysqli->query("SELECT * FROM `chat_user_account` WHERE id_user=$id AND id_chat=$id_chat OR id_user=$id_user AND id_chat=$var_chat ORDER BY id_chat_user_account DESC ");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		if($row['id_user']!=$id){
		?>
			<div class='direct-chat-msg right'>
                <div class='direct-chat-info clearfix'>
					<?php echo"<span class='direct-chat-name pull-right'>$name</span>
					<span class='direct-chat-timestamp pull-left'>".$row['date']."</span>";?>
                </div><!-- /.direct-chat-info -->
				<?php echo"<img class='direct-chat-img' src='$image2' alt='message user image'>";?><!-- /.direct-chat-img -->
                <div class='direct-chat-text'>
					<?php echo"<p>".$row['text'] . "</p>";?>
				</div><!-- /.direct-chat-text -->
            </div><!-- /.direct-chat-msg -->    
			<?php
		}else{
			?>
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <?php echo"<span class='direct-chat-name pull-left'>$var_name:</span>
						<span class='direct-chat-timestamp pull-right'>".$row['date']."</span>";?>
                      </div><!-- /.direct-chat-info -->
                      <?php echo"<img class='direct-chat-img' src='$image' alt='message user image'>";?><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        <?php echo"<p>".$row['text'] . "</p>";?>
                      </div><!-- /.direct-chat-text -->
                </div><!-- /.direct-chat-msg -->
			
			<?php
		}
	}
}
?>

