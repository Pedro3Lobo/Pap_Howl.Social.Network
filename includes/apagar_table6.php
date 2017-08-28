<?php
$sql=("DELETE  FROM `like_group` WHERE id_group=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("DELETE  FROM `comment_group` WHERE id_group=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("DELETE  FROM post_group WHERE id_group=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

$sql=("DELETE  FROM `group` WHERE  group_user_account.id_group=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();		
echo"<script> window.location='admin.php?page=show_tables'</script>";
?>