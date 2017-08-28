<?php
$var=$_GET['id_user'];

$sql=("DELETE  FROM `comment` WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("DELETE  FROM notification WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("DELETE  FROM post WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("DELETE  FROM `like_group` WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("DELETE  FROM `comment_group` WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("DELETE  FROM post_group WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("DELETE  FROM friend_user_account WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("DELETE  FROM friend WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();


if($stmt = $mysqli->prepare("SELECT `friend`.id_friend FROM `friend` WHERE `friend`.id_user=$var ")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_friend);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {
		while ($stmt->fetch()) {
			$sql=("DELETE  FROM friend_user_account WHERE friend_user_account.id_friend=$id_friend ");
			$stmp2 = $mysqli->prepare($sql);
			$stmp2->execute();
		}
	}
}
$sql=("DELETE  FROM chat_user_account WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("DELETE  FROM chat WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

if($stmt = $mysqli->prepare("SELECT `chat`.id_chat FROM `chat` WHERE `chat`.id_user=$var ")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_chat);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {
		while ($stmt->fetch()) {
			$sql=("DELETE  FROM chat_user_account WHERE chat_user_account.id_chat=$id_chat");
			$stmp2 = $mysqli->prepare($sql);
			$stmp2->execute();
		}
	}
}



$sql=("DELETE  FROM `like` WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();


$sql=("DELETE  FROM `stat` WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("DELETE  FROM `stat` WHERE id_user2=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

if($stmt = $mysqli->prepare("SELECT `group`.id_group FROM `group_user_account`,`group` WHERE `group`.id_user=$var ")) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_group);
	$num_rows = $stmt->num_rows;

	if($num_rows>0) {
		while ($stmt->fetch()) {
			$sql=("DELETE  FROM `group` WHERE  group_user_account.id_group=$id_group");
			$stmp2 = $mysqli->prepare($sql);
			$stmp2->execute();

			$sql=("DELETE  FROM group_user_account WHERE id_group=$var ");
			$stmp2 = $mysqli->prepare($sql);
			$stmp2->execute();
		}
	}
}

$sql=("DELETE  FROM `user_account` WHERE id_user=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();
echo"<script> window.location='admin.php?page=show_tables'</script>";
?>