<?php
	$page_where="";
	$var="";
	$var_change=0;
	if(isset($_GET['case'])){
		$case=""+$_GET['case'];
		
	}else {
		echo"<script> window.location='index.php?page=404'</script>";
		
	}
	
	if(isset($_GET['page_where'])){
		//echo"$var hello"+$_GET['page_where'];
		$page_where=$_GET['page_where'];
		//echo"$var hello ";
	}else {
		echo"<script> window.location='index.php?page=404'</script>";
		
	}
	if($case==0){
		$var_change=0;
	}else if($case==1){
		$var_change=1;
	}else{
		echo"<script> window.location='index.php?page=404'</script>";
	
	}
	$sql=('UPDATE user_account SET on_off = '.$var_change.' WHERE user_account.id_user ='.$id);
		$stmp2 = $mysqli->prepare($sql);
		$stmp2->execute();
	//echo"$page_where";	
	echo"<script> window.location='index.php?page=$page_where'</script>";
?>