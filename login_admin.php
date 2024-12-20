<?php
 include('connexion.php');
 session_start();
 if(isset($_POST['submit2'])){
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $query = "SELECT * FROM admin WHERE username ='$username' AND password ='$password' ";
    if(mysqli_num_rows(mysqli_query($con, $query))>0){
     $_SESSION['name']= $username;
     echo '***************';
     header("location:dashbord.php");
 }else{
    echo "your password incorrect ";
 }
 }
?>