<?php
session_start();

if (!isset($_SESSION['name'])) {
    header("Location: index.php");
    exit();
}

// Connexion à la base de données
require 'connexion.php';

// Traitement de l'ajout d'un rendez-vous
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['doctor'], $_POST['patient'], $_POST['appointment_date'])) {
    $doctor_id = $_POST['doctor'];
    $patient_id = $_POST['patient'];
    $appointment_date = $_POST['appointment_date'];

    // Validation des données avant insertion
    if (!empty($doctor_id) && !empty($patient_id) && !empty($appointment_date)) {
        $query = "INSERT INTO appointments (doctor_id, patient_id, appointment_date, status) 
                  VALUES ('$doctor_id', '$patient_id', '$appointment_date', 'Scheduled')";

        // Essayer d'exécuter la requête et capturer les erreurs
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Appointment booked successfully!');</script>";
        } else {
            echo "<script>alert('Error booking appointment: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('All fields are required.');</script>";
    }
}

// Suppression d'un rendez-vous
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM appointments WHERE appointment_id = '$delete_id'";

    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Appointment cancelled!');</script>";
    } else {
        echo "<script>alert('Error cancelling appointment: " . mysqli_error($con) . "');</script>";
    }
}

// Récupérer les rendez-vous du patient
$patient_id = $_SESSION['patient_id'];
$query = "SELECT a.appointment_id, d.first_name AS doctor_first_name, d.last_name AS doctor_last_name, a.appointment_date, a.status
          FROM appointments a
          JOIN doctors d ON a.doctor_id = d.doctor_id
          WHERE a.patient_id = '$patient_id' AND a.appointment_date >= NOW() 
          ORDER BY a.appointment_date";
$appointments_result = mysqli_query($con, $query);

// Récupérer les médecins disponibles
$doctors_query = "SELECT doctor_id, first_name, last_name FROM doctors";
$doctors_result = mysqli_query($con, $doctors_query);

// Récupérer les patients disponibles (si nécessaire)
$patients_query = "SELECT patient_id, first_name, last_name FROM patients";
$patients_result = mysqli_query($con, $patients_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Appointments</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[url('./img/background.jpg')] bg-cover bg-no-repeat bg-center text-zinc-50 bg-fixed">
    <header class="bg-black text-white p-6 text-center flex items-center justify-around">
        <div>
            <h1 class="text-3xl font-semibold">Your Appointments</h1>
            <p class="text-xl">Manage your upcoming medical appointments</p>
        </div>
        <div>
            <a href="home.php"> <img src="./img/maison.png" alt="Logo" class="w-16 h-16 object-contain"></a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex flex-col items-center justify-center p-6 min-h-screen">

        <!-- Upcoming Appointments Section -->
        <section class="w-full max-w-6xl mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-zinc-950">Upcoming Appointments</h2>

            <!-- Table of Appointments -->
            <table class="w-full table-auto rounded-lg shadow-md bg-gray-800">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Doctor</th>
                        <th class="px-4 py-2 text-left">Appointment Date</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($appointment = mysqli_fetch_assoc($appointments_result)): ?>
                        <tr class="hover:bg-green-600 transition">
                            <td class="px-4 py-2"><?= $appointment['doctor_first_name'] . ' ' . $appointment['doctor_last_name'] ?></td>
                            <td class="px-4 py-2"><?= date('Y-m-d H:i', strtotime($appointment['appointment_date'])) ?></td>
                            <td class="px-4 py-2 text-yellow-400"><?= $appointment['status'] ?></td>
                            <td class="px-4 py-2">
                                <a href="?delete_id=<?= $appointment['appointment_id'] ?>" class="text-red-400 hover:text-white">Cancel</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <!-- Book New Appointment Section -->
        <section class="w-full max-w-6xl bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-6 text-center">Book a New Appointment</h2>

            <form action="#" method="POST" class="space-y-6">
                <!-- Patient Selection -->
                <div class="flex flex-col">
                    <label for="patient" class="text-lg">Select a Patient</label>
                    <select id="patient" name="patient" class="px-4 py-2 bg-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-400" required>
                        <option value="" disabled selected>Select Patient</option>
                        <?php
                        // Boucle pour afficher les patients dans le formulaire
                        while ($patient = mysqli_fetch_assoc($patients_result)) {
                            echo "<option value='" . $patient['patient_id'] . "'>" . $patient['first_name'] . " " . $patient['last_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Doctor Selection -->
                <div class="flex flex-col">
                    <label for="doctor" class="text-lg">Select a Doctor</label>
                    <select id="doctor" name="doctor" class="px-4 py-2 bg-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-400" required>
                        <option value="" disabled selected>Select Doctor</option>
                        <?php
                        // Boucle pour afficher les médecins dans le formulaire
                        while ($doctor = mysqli_fetch_assoc($doctors_result)) {
                            echo "<option value='" . $doctor['doctor_id'] . "'>" . $doctor['first_name'] . " " . $doctor['last_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Date Selection -->
                <div class="flex flex-col">
                    <label for="appointment_date" class="text-lg">Select Date and Time</label>
                    <input type="datetime-local" name="appointment_date" class="px-4 py-2 bg-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-500 transition">Book Appointment</button>
                </div>
            </form>
        </section>

    </main>

    <footer class="bg-black text-white text-center py-4">
        <p>2024 My Health Application. All rights reserved.</p>
    </footer>

</body>

</html>
