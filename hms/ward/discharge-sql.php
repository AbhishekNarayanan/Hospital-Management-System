<?php

	include('include/config.php');
	extract($_POST);
    $sql=mysqli_query($con,'UPDATE tblpatient SET discharge_date=NOW() WHERE ID='.$_POST['values']);
	$sql=mysqli_query($con,'UPDATE tblpatient SET inpatient=-1 WHERE ID='.$_POST['values']);
	$sql=mysqli_query($con,'UPDATE tblpatient SET status=3 WHERE ID='.$_POST['values']);
	$sql=mysqli_query($con,'UPDATE tblpatient SET Bed_no=0 WHERE ID='.$_POST['values']);
	$sql=mysqli_query($con,'UPDATE tblpatient SET Ward_type=0 WHERE ID='.$_POST['values']);
    echo "";
?>