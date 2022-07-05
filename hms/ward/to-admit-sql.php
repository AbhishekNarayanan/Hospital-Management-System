<?php
 	session_start();
	include('include/config.php');
	extract($_POST);
   	$_SESSION['newvars'] = $_POST['values'];
   	//echo "hii there";
   	echo $_SESSION['newvars'];

	//$sql1=mysqli_query($con,"SELECT * FROM tblpatient ORDER BY Ward_type DESC, Bed_no DESC");

?>