<?php
$var=$_GET['id'];
//echo"DELETE  FROM `comment` WHERE id_post=$var";
$sql=("DELETE  FROM `comment` WHERE id_post=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();
//echo"DELETE  FROM `like` WHERE id_post=$var";
$sql=("DELETE  FROM post WHERE id_post=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();
//echo"DELETE  FROM post WHERE id_post=$var";
$sql=("DELETE  FROM post WHERE id_post=$var");
$stmp2 = $mysqli->prepare($sql);
$stmp2->execute();

echo"<script> window.location='admin.php?page=show_tables'</script>";
?>