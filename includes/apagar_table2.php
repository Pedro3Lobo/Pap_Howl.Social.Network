<?php
$var=$_GET['noti'];
$sql=("DELETE  FROM `notification` WHERE id_notification=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

echo"<script> window.location='admin.php?page=show_tables'</script>";
?>