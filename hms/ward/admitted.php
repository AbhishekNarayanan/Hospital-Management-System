
<?php
session_start();
//error_reporting(0);
include('include/config.php');
//include('include/checklogin.php');
//check_login();
?>
<script>
			var obj={
				xhr:new XMLHttpRequest(),
				async:function(vars,vars1){
					//alert(vars);
					this.xhr.open("POST","admitted-sql.php",true);
					this.xhr.onreadystatechange=this.update;
					this.xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					this.xhr.send("bedno="+vars+"&wards="+vars1);
					//newdiv=document.createElement("div");
					//newdiv.innerHTML=this.xhr.responseText;
					//alert(this.xhr.responseText);
					//alert(newdiv);
				},
				update:function(){
					if(this.readyState==4 && this.status==200){						
						var result=this.responseText;
						console.log(result);
						//alert(result);
						//Connect to discharge date
						window.location.href = "to-admit.php";
						
					}					
				}
			}
</script>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Allocate Bed</title>
		
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
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Allocate Bed</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Ward</span>
</li>
<li class="active">
<span>Allocate Bed</span>
</li>
</ol>
</div>
</section>


<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15"> <span class="text-bold">ICU Ward</span></h5>
<table class="table table-hover" id="sample-table-1">
<tbody>
<script type="text/javascript">var listObject = {1:1,2:1,3:1,4:1,5:1,6:1,7:1,8:1,9:1,10:1,11:1,12:1,13:1,14:1,15:1,16:1,17:1,18:1,19:1,20:1};
</script>
<?php
$wardid=$_SESSION['id'];
$sql=mysqli_query($con,"select * from tblpatient where Ward_type=3 AND status=2");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
	<script type="text/javascript">
	var myVar=<?php echo $row['Bed_no'] ?>;
	//prompt(myVar);
	delete listObject[myVar];
	</script>
<?php 
$cnt=$cnt+1;
}?>
<div id="wrapper"></div>
<body>
<script type="text/javascript">
	var num3=3;
	for (var key in listObject){
  		//console.log( key, listObject[key] );	
  		var codeBlock='<img style="width:60px;height:60px;" src="images/hosp_bed.jpeg"><p><button type="submit" onclick="obj.async('+key+','+num3+')">Allocate bed no '+key+' </button></p>';
  		var newDiv=document.createElement("div");
	 	newDiv.innerHTML = codeBlock;
	 	newDiv.setAttribute("style","float:left");

	 	document.getElementById("wrapper").appendChild(newDiv);
	}
</script>
</body>
</table>
</div>
</div>
</div>

<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15"> <span class="text-bold">Labor Ward</span></h5>
<table class="table table-hover" id="sample-table-2">
<tbody>
<script type="text/javascript">var listObject = {1:1,2:1,3:1,4:1,5:1,6:1,7:1,8:1,9:1,10:1,11:1,12:1,13:1,14:1,15:1,16:1,17:1,18:1,19:1,20:1};
</script>
<?php
$wardid=$_SESSION['id'];
$sql=mysqli_query($con,"select * from tblpatient where Ward_type=2 AND status=2");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
	<script type="text/javascript">
	var myVar=<?php echo $row['Bed_no'] ?>;
	//prompt(myVar);
	delete listObject[myVar];
	</script>
<?php 
$cnt=$cnt+1;
}?>
<div id="wrapper1"></div>
<body>
<script type="text/javascript">
	var num2=2;
	for (var key in listObject){
  		//console.log( key, listObject[key] );	
  		var codeBlock='<img style="width:60px;height:60px;" src="images/hosp_bed.jpeg"><p><button type="submit" onclick="obj.async('+key+','+num2+')">Allocate bed no '+key+' </button></p>';
  		var newDiv1=document.createElement("div");
	 	newDiv1.innerHTML = codeBlock;
	 	newDiv1.setAttribute("style","float:left");

	 	document.getElementById("wrapper1").appendChild(newDiv1);
	}
</script>
</body>
</table>
</div>
</div>
</div>

<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15"> <span class="text-bold">General Ward</span></h5>
<table class="table table-hover" id="sample-table-1">
<tbody>
<script type="text/javascript">var listObject = {1:1,2:1,3:1,4:1,5:1,6:1,7:1,8:1,9:1,10:1,11:1,12:1,13:1,14:1,15:1,16:1,17:1,18:1,19:1,20:1};
</script>
<?php
$wardid=$_SESSION['id'];
$sql=mysqli_query($con,"select * from tblpatient where Ward_type=1 AND status=2");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
	<script type="text/javascript">
	var myVar=<?php echo $row['Bed_no'] ?>;
	//prompt(myVar);
	delete listObject[myVar];
	</script>
<?php 
$cnt=$cnt+1;
}?>
<div id="wrapper3"></div>
<body>
<script type="text/javascript">
var num1=1;
	for (var key in listObject){
  		//console.log( key, listObject[key] );	
  		var codeBlock='<img style="width:60px;height:60px;" src="images/hosp_bed.jpeg"><p><button type="submit" onclick="obj.async('+key+','+num1+')">Allocate bed no '+key+'</button></p>' ;
  		var newDiv3=document.createElement("div");
	 	newDiv3.innerHTML = codeBlock;
	 	newDiv3.setAttribute("style","float:left");

	 	document.getElementById("wrapper3").appendChild(newDiv3);
	}
</script>
</body>
</table>
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
		<script src="vendor/bootstrap-timepicker/bootstrap-timepi'1'ker.min.js"></script>
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
