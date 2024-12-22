<?php
require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['appointement'])) {
    $doctor_id = (int)mysqli_real_escape_string($con, $_POST['doctor_id']);
    $patient_id = (int)mysqli_real_escape_string($con, $_POST['patient_id']);
    $appointment_date = mysqli_real_escape_string($con, $_POST['appointment_date']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $doctor_check = mysqli_query($con, "SELECT * FROM doctors WHERE doctor_id = '$doctor_id'");
    $patient_check = mysqli_query($con, "SELECT * FROM patients WHERE patient_id = '$patient_id'");

    if (mysqli_num_rows($doctor_check) == 0) {
        echo "<script>alert('Doctor ID is invalid.'); window.location.href='dashboard.php';</script>";
    } elseif (mysqli_num_rows($patient_check) == 0) {
        echo "<script>alert('Patient ID is invalid.'); window.location.href='dashboard.php';</script>";
    } else {
        $sql = "INSERT INTO appointments (doctor_id, patient_id, appointment_date, status)
                VALUES ('$doctor_id', '$patient_id', '$appointment_date', '$status')";
        
        if (mysqli_query($con, $sql)) {
            header("location: dashbord_page.php");
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "'); window.location.href='dashboard.php';</script>";
        }
    }
}
?>
