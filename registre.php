<?php
include('connexion.php');

if (isset($_POST['submit'])) {
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $email = $_POST['email'];
    $password = htmlspecialchars(trim($_POST['password']));

    // Hachage du mot de passe avant de l'enregistrer
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Requête pour insérer les données dans la base de données
    $query = "INSERT INTO patients (first_name, last_name, email, password)
              VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";

    if (mysqli_query($con, $query)) {
        echo "Compte créé avec succès.";
    } else {
        echo "Erreur lors de la création du compte.";
    }
}
?>
