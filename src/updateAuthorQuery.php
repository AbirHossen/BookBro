<?php


require_once '../db/db_init.php';

$temp=1;
    $id=$_POST["authorID"];
	$name=$_POST["authorName"];
	$desc=$_POST["authorDescription"];
if((strlen($name)==0)){
    echo "Author  Name is empty!";
    $temp=0;
}
echo "<br>";
if(strlen($desc)==0){
    echo "Author  Descrption is empty!";
    $temp=0;
}
if($temp==1){
 
	
	$sql = "SELECT * FROM authors WHERE id='$id'";
	$result=mysqli_query($conn,$sql);
	$count=0;
	$count=mysqli_num_rows($result);
	
    if($count!=0){
        $sql = "update authors SET author_name='$name',author_details='$desc' where id='$id'";
         
         if($conn->query($sql) === TRUE)
         {
             
        echo '<script type="text/javascript">'; 
        echo 'alert("Author information has been updated!");'; 
        echo 'window.location.href = "updateAuthor.php";';

        echo '</script>';
         }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else{

        echo '<script type="text/javascript">'; 
        echo 'alert("Author Id not found match");'; 
        echo 'window.location.href = "updateAuthor.php";';
        echo '</script>';   
    }



   
}
?>