<?php
$var=$_GET['id'];
$sql=("DELETE  FROM `comment` WHERE id_comment=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

echo"<script> window.location='admin.php?page=show_tables'</script>";
?>