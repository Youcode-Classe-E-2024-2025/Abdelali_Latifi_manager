<?php
require('connexion.php');
$id = $_GET["id"];
$sql = "DELETE FROM patients WHERE patient_id = '$id'";
$query = mysqli_query($con,$sql);
if(isset($query)){
    header("location:dashbord_page.php");
}

?>