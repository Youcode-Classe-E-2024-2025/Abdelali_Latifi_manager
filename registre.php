<?php
 include('connexion.php');
 if(isset($_POST['submit'])){
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $email = $_POST['email'];
    $password = htmlspecialchars(trim($_POST['password']));
    $query = "INSERT INTO patients (first_name, last_name, email, password)
    VALUES ('$first_name','$last_name','$email','$password') ";
    
    if(mysqli_query($con, $query)){
    echo"good";
    }
}
?>