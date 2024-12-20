<?php
 include('connexion.php');
 session_start();
 if(isset($_POST['submit2'])){
    $name = htmlspecialchars(trim($_POST['name']));
    $password = htmlspecialchars(trim($_POST['password']));
    $query = "SELECT * FROM patients WHERE first_name ='$name' AND password ='$password' ";
    if(mysqli_num_rows(mysqli_query($con, $query))>0){
     $_SESSION['name']= $name;
        header("location:home.php");
 }else{
    echo "your password incorrect ";
 }
 }
?>