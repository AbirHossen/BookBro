<?php
session_start();

require_once '../db/db_init.php';
$temp= 1;
if(strlen($_POST["catName"])==0){
    echo "No Input On Category  field!";
    $temp= 0;
}

echo "<br>";

if($temp==1){
    /*insert query*/
    $sql = "INSERT INTO category(category_name) VALUES ('".$_POST['catName']."')";


    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">'; 
        echo 'alert("Category  Saved");'; 
        echo 'window.location.href = "addCategory.php";';
        echo '</script>';

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}





























?>