<?php
require 'connexion.php'; 
if(isset($_POST['submit1'])){
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    $query = "INSERT INTO contact (name, email, message)
    VALUES ('$name','$email','$message') ";

    if(mysqli_query($con, $query)){
    echo"think you for your feedback";
    }
}
?>