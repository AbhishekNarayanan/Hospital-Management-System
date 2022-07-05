<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
	$eid=$_GET['patientid'];
	$datetime=$_POST['appdt'];
	$diagnosis=$_POST['diagnosis'];
	$docid=$_SESSION['id'];
	$prescription_file = fopen("prescription/".$eid."-".date("Y-m-d").".txt", "w");
	for($i=0;$i<count($_POST['no']);$i++){
		fwrite($prescription_file,$_POST['no'][$i]." ".$_POST['drug_name'][$i]." ".$_POST['dosage'][$i]." ".$_POST['timing'][$i]." \n");
	}
	fclose($prescription_file);
	$path="prescription/".$eid."-".date("Y-m-d").".txt";
	
	$sql=mysqli_query($con,"insert into patientrx (PatientID, DoctorID, AppDateTime, Diagnosis, DrugPrescriptionLink) VALUES ('$eid','$docid','$datetime','$diagnosis','$path')");
	if($sql)
	{
	echo "<script>alert('Prescription added Successfully');</script>";
	header('location:dashboard.php');

	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Add Patient</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

		<script>
			var obj={
				xhr:new XMLHttpRequest(),
				async:function(vars){
					this.xhr.open("POST","admit-sql.php",true);
					this.xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded")
					this.xhr.send("values="+vars);
				}
			}
</script>
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>
						
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Patient | Add Prescription</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Patient</span>
</li>
<li class="active">
<span>Add Prescription</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title">Add Prescription</h5>
</div>
<div class="panel-body">
<form role="form" name="" method="post">
<?php
 $eid=$_GET['patientid'];
$ret=mysqli_query($con,"select * from tblpatient where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<div class="form-group">
<label for="doctorname">
Patient Name
</label>
<input type="text" name="patname" class="form-control"  value="<?php  echo $row['PatientName'];?>" required="true">
</div>

<div class="form-group">
<label for="fess">
 Appointment Date and Time
</label>
<input type="text" name="appdt" class="form-control"  value="<?php date_default_timezone_set('Asia/Calcutta'); echo date('Y-m-d H:i:s');?>" readonly='true'>
</div>

<div class="form-group">
<label for="fess">
 Diagnosis
</label>
<textarea type="text" name="diagnosis" class="form-control"  placeholder="Enter diagnosis" ></textarea>
</div>	


<div>
<table id="prescription" class="table table-hover">
	<thead>
		<tr>
		<th class="center">#</th>
		<th class="center">Drug Name</th>
		<th class="center">Dosage</th>
		<th class="center">Timing</th>
		</tr>
	</thead>
	<tbody id="rx">
	</tbody>
</table>
<button name="add-drug" id="add-drug" class="btn btn-o btn-primary" style="float:right">Add drug</button>

</div>
<?php } ?>
<br><br>
<div><center>
<button  name="submit1" id="submit1" class="btn btn-o btn-primary" onclick="obj.async(<?php echo $eid;?>)">Recommend Admission</button>

<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Submit prescription
</button></center>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">
</div>
</div>
</div>
</div>
</div>
</div>				
</div>
</div>
</div>
			<!-- start: FOOTER -->
<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<script>
		$("#add-drug").click(function(event){
			event.preventDefault();
			var table_body=document.getElementById("rx");
			
			var table_row=document.createElement("tr");
			
			var no=document.createElement("td");
			no.setAttribute("class","center");
			no.innerHTML="<input type='text' name='no[]'>";
			table_row.appendChild(no);
			var drug_name=document.createElement("td");
			drug_name.setAttribute("class","center");
			drug_name.innerHTML="<input type='text' name='drug_name[]'>";
			table_row.appendChild(drug_name);
			var dosage=document.createElement("td");
			dosage.setAttribute("class","center");
			dosage.innerHTML="<input type='text' name='dosage[]'>";
			table_row.appendChild(dosage);
			var timing=document.createElement("td");
			timing.setAttribute("class","center");
			timing.innerHTML="<input type='text' name='timing[]'>";
			table_row.appendChild(timing);
			
			table_body.appendChild(table_row);
		});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
