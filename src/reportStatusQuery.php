<?php


require_once '../db/db_init.php';


	$reportID=$_POST["reportID"];
	$status=$_POST["status"];
	
	$sql = "SELECT * FROM reports WHERE id='$reportID'";
	$result=mysqli_query($conn,$sql);
	$count=0;
	$count=mysqli_num_rows($result);
	
    if($count!=0){
        
        
        
        
        $sql = "update reports SET status='$status' where id='$reportID'";
         mysqli_query($conn,$sql);
        echo '<script type="text/javascript">'; 
        echo 'alert("Status Changed");'; 
        echo 'window.location.href = "reportStatus.php";';

        echo '</script>';
    }
    else{

        echo '<script type="text/javascript">'; 
        echo 'alert("Report ID not found!");'; 
        echo 'window.location.href = "reportStatus.php";';
        echo '</script>';   
    }




?>