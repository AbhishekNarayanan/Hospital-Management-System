<?php
    
    $img = $_POST['image'];
    $folderPath = "images/";
    //$myfile=fopen("id.txt","r");
    //$pnum=fread($myfile,filesize("id.txt"));
    $pnum=$_POST['id'];
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = "pic-".$pnum . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  
	echo "<script type='text/javascript'>location.href = 'success.php?id=".$pnum."';</script>";
  
?>