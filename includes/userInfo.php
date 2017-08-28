
<?php
 		include_once('db.php');
		$date_post=date("Y-m-d h:i:sa");
		$id = $_POST['id'];
		$message = $_POST['message'];
		$id_chat = $_POST['chat'];
		$id_user = $_POST['user'];
		if($message!=null){
			if(mysql_query("INSERT INTO `chat_user_account`(`id_chat_user_account`,`text`,`date`,id_chat,id_user)VALUES('','$message','$date_post','$id_chat','$id')")){	
				//echo "Successfully Inserted";
				echo"<script> window.location='index.php?page=chat1&user=$id_user'</script>";
			}else{
				//echo "Insertion Failed";
			}
		}
	  
?>