<?php

	include('include/config.php');
	extract($_POST);    
	$sql=mysqli_query($con,'UPDATE tblpatient SET status=1 WHERE ID='.$_POST['values']);	
    echo "";
?>