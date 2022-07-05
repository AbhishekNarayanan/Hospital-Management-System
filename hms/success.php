<?php
session_start();
error_reporting(0);
include('include/config.php');
include('phpqrcode/qrlib.php'); 

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Registration Successful</title>
		
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
	</head>
	<body>
		<div id="app">		
<div class="app-content">
<?php include('include/header.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Registration Successful</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Patient</span>
</li>
<li class="active">
<span>Registration Successful</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">Registration<span class="text-bold">Details</span></h5>
<?php
                               //$myfile=fopen("id.txt","r");
							   //$vid=fread($myfile,filesize("id.txt"));
							   $vid=$_GET['id'];
                               $ret=mysqli_query($con,"select * from users where pnum='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
                               ?>
<table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Patient Details</td></tr>

    <tr>
    <th scope>Patient Name</th>
    <td><?php  echo $row['fullName'];?></td>
    <th scope>Patient Email</th>
    <td><?php  echo $row['email'];?></td>
  </tr>
  <tr>
    <th scope>Patient Mobile Number</th>
    <td><?php  echo $row['pnum'];?></td>
    <th>Patient Address</th>
    <td><?php  echo $row['address'];?></td>
  </tr>
    <tr>
    <th>Patient Gender</th>
    <td><?php  echo $row['gender'];?></td>
    <th>Patient Age</th>
    <td><?php  echo $row['age'];?></td>
    </tr>
  <tr>
    
    <th>Patient Medical History(if any)</th>
    <td><?php  echo $row['addnotes'];?></td>
     <th>Patient Reg Date</th>
    <td><?php  echo $row['regDate'];?></td>
  </tr>
  </br>

<?php
// Include the qrlib file 
$text = "name : ".$row['fullName']."; email : ".$row['email']."; address : ".$row['address']."; phone : ".$row['pnum'].";"; 
  
// $path variable store the location where to  
// store image and $file creates directory name 
// of the QR code file by using 'uniqid' 
// uniqid creates unique id based on microtime 
$path = 'images/'; 
$file1 = $path.$vid.".png"; 
$file2 = $path."pic-".$vid.".png"; 

// $ecc stores error correction capability('L') 
$ecc = 'L'; 
$pixel_Size = 5;
$frame_Size = 5; 
  
// Generates QR Code and Stores it in directory given 
QRcode::png($text, $file1, $ecc, $pixel_Size, $frame_size); 
  
// Displaying the stored QR code from directory 
echo "<center><img src='".$file1."'> <img src='".$file2."' width='230px' height='230px'></center>"; 
echo "</br>";
?>
<?php }?>
</table>


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
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
