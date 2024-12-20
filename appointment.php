<?php
 include('connexion.php');
 session_start();
 if(isset($_POST['submit2'])){
    $doctor = htmlspecialchars(trim($_POST['doctor']));
    $appointment_date = htmlspecialchars(trim($_POST['appointment_date']));
    $query = "INSERT INTO appointments (appointment_date)";
    if(mysqli_query($con, $query)){
     header("location:home.php");
 }else{
    echo "your password incorrect ";
 }
 }
?>