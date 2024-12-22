<?php
require 'connexion.php';

if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    $delete_query = "DELETE FROM appointments WHERE appointment_id = '$appointment_id'";
    if (mysqli_query($con, $delete_query)) {
        header("location:dashbord_page.php");
    } else {
        echo "Erreur lors de la suppression.";
    }
} else {
    echo "Aucun ID de rendez-vous spécifié.";
}
?>

