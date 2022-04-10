<?php 
$server="localhost";
$username="root";
$password="";
$database="db_saphal";
$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die ("Error".mysqli_connect_error());
    // echo "success";
}


?>