

<?php
	session_start();
	include('include/config.php');
	//include('to-admit.php');
	extract($_POST);
	//echo "hi\n";
	//$arr=array('lead'=>'Chadwick Boseman','year'=>'2018','genre'=>'Action');
	echo $_POST['bedno'];
	//echo $_POST['ids'];
	$ids=$_SESSION['newvars'];
	echo $ids;
	$sql=mysqli_query($con,"UPDATE tblpatient SET status=2,inpatient=1,Ward_type=".$_POST['wards'].", Admit_date= now(), Bed_no=".$_POST['bedno']." WHERE ID=".$ids."");

	//$sql=mysqli_query($con,"UPDATE tblpatient SET  WHERE ID=".$ids."");
	//echo json_encode($arr);

?>
