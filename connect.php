<?php  

$conn=new mysqli("localhost","root","","signupforms");
if(!$conn){
    // echo "sucessfully connected";
    die(mysqli_error($conn));
}


?>