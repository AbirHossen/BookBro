<?php

session_start();

require_once '../db/db_init.php';
$id = $_POST["bookID"];
$rid= $_POST["rbookID"];
$temp = 1;
if(strlen($_POST["bookID"])==0){
    echo "enter book id!";
    $temp=0;
}
if(is_numeric($_POST["bookID"])==false){
    echo "ID has to be a Integer";
    $temp=0;
}
echo "<br>";
if(strlen($_POST["rbookID"])==0){
    echo "enter book id!";
    $temp=0;
}
if(is_numeric($_POST["rbookID"])==false){
    echo "ID has to be a Integer";
    $temp=0;
}
echo "<br>";

if($temp==1){


    if (isset($_POST['add'])) {


        $sql="select * from featured_books where book_id='$id'";
        $result=mysqli_query($conn,$sql);
        $count=0;
        $count=mysqli_num_rows($result);

        if($count==0){
            $sql="Select * from books where id='$id'";

            $qu=mysqli_query($conn,$sql);
            $result=mysqli_fetch_assoc($qu);
            $name=$result['bk_name'];




            $sql1 = "INSERT INTO featured_books (bk_name,book_id) VALUES ('$name','".$_POST['bookID']."')";


            if ($conn->query($sql1) === TRUE) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Featured Book Added");'; 
                echo 'window.location.href = "featureBook.php";';
                echo '</script>';

            } else {
                echo "Error: " . $sql1 . "<br>" . $conn->error;
            }
        }
        else{
            echo '<script type="text/javascript">'; 
            echo 'alert("Featured Book Already Exists!");'; 
            echo 'window.location.href = "featureBook.php";';
            echo '</script>';
        }



    }



    elseif (isset($_POST['remove'])) {

        $sql = "delete from featured_books where id='$rid'";


        if($conn->query($sql) === TRUE) {

            echo '<script type="text/javascript">'; 
            echo 'alert("Featured Book Deleted");'; 
            echo 'window.location.href = "featureBook.php";';
            echo '</script>';

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }




}





?>