<?php
require 'connexion.php';

if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    $requete = "SELECT * FROM appointments WHERE appointment_id = '$appointment_id'";
    $query = mysqli_query($con, $requete);
    $row = mysqli_fetch_assoc($query);

    if (!$row) {
        echo "Rendez-vous non trouvé.";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $doctor_id = $_POST['doctor_id'];
        $patient_id = $_POST['patient_id'];
        $appointment_date = $_POST['appointment_date'];
        $status = $_POST['status'];

        $update_query = "UPDATE appointments SET doctor_id = '$doctor_id', patient_id = '$patient_id', appointment_date = '$appointment_date', status = '$status' WHERE appointment_id = '$appointment_id'";
        if (mysqli_query($con, $update_query)) {
            header("location:dashbord_page.php");

        } 
    }
} else {
    echo "Aucun ID de rendez-vous spécifié.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Rendez-vous</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="max-w-4xl mx-auto p-6">

        <h2 class="text-3xl font-semibold text-center text-blue-600 mb-6">Modifier le Rendez-vous</h2>

        <form method="POST" class="bg-white p-8 rounded-lg shadow-lg space-y-6">
            <div>
                <label for="doctor_id" class="block text-gray-700 font-medium">Doctor ID</label>
                <input type="text" name="doctor_id" id="doctor_id" value="<?= htmlspecialchars($row['doctor_id']) ?>" class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all ease-in-out">
            </div>
            <div>
                <label for="patient_id" class="block text-gray-700 font-medium">Patient ID</label>
                <input type="text" name="patient_id" id="patient_id" value="<?= htmlspecialchars($row['patient_id']) ?>" class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all ease-in-out">
            </div>
            <div>
                <label for="appointment_date" class="block text-gray-700 font-medium">Date et Heure du Rendez-vous</label>
                <input type="datetime-local" name="appointment_date" id="appointment_date" value="<?= date("Y-m-d\TH:i", strtotime($row['appointment_date'])) ?>" class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all ease-in-out">
            </div>
            <div>
                <label for="status" class="block text-gray-700 font-medium">Statut</label>
                <select name="status" id="status" class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all ease-in-out">
                    <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="Completed" <?= $row['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                    <option value="Cancelled" <?= $row['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all ease-in-out duration-200">Mettre à jour</button>
            </div>
        </form>

    </div>

</body>

</html>
