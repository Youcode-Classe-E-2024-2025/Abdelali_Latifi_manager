<?php
// add_doctor.php
require 'connexion.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['doctor'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $specialization = mysqli_real_escape_string($con, $_POST['specialization']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "INSERT INTO doctors (first_name, last_name, specialization, phone_number, email)
              VALUES ('$first_name', '$last_name', '$specialization', '$phone_number', '$email')";

    if (mysqli_query($con, $query)) {
        echo "Doctor added successfully!";
        header("Location: dashbord_page.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
