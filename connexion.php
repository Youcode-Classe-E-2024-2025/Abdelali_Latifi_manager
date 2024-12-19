<?php
$con = mysqli_connect("localhost","root","","clinical");
if($con->connect_error){
    die("connection faild".$con->connect_error);
}
else{
   echo 'sf rah mconnecti';
}
?>