<?php
session_start();

if (!isset($_SESSION['name'])) {
    header("Location: login_admin_page.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[url('./img/black-white-photo-mall.jpg')] bg-cover bg-no-repeat bg-center text-zinc-50 bg-fixed">

    <!-- Header -->
    <header class="bg-black text-white p-4 text-center">
        <h1 class="text-2xl font-semibold">Dashboard</h1>
        <p>Welcome, Admin</p>
    </header>

    <!-- Main Layout -->
    <section class="flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-6 min-h-full">
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="#doctors" class="text-lg hover:text-green-400">DOCTORS</a>
                    </li>
                    <li class="mb-4">
                        <a href="#patients" class="text-lg hover:text-green-400">PATIENT</a>
                    </li>
                    <li class="mb-4">
                        <a href="#appointments" class="text-lg hover:text-green-400">APPOINTMENT</a>
                    </li>
                    <li class="mb-4">
                        <a href="#consultations" class="text-lg hover:text-green-400">CONSULTATIONS</a>
                    </li>
                    <li class="mb-4">
                        <a href="#admins" class="text-lg hover:text-green-400">ADMIN</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-6">

            <!-- Section Docteurs -->
            <section id="doctors">
                <h2 class="text-xl font-semibold mb-4">Liste des Docteurs</h2>
                <button onclick="toggleModal('doctorModal')" class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500">Ajouter un Docteur</button>
                <table class="w-full table-auto shadow-md">
                    <thead class="bg-white text-black">
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">First Name</th>
                            <th class="px-4 py-2 text-left">Last Name</th>
                            <th class="px-4 py-2 text-left">Specialization</th>
                            <th class="px-4 py-2 text-left">Phone Number</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require 'connexion.php';
                    $requete = 'SELECT * FROM doctors';
                    $query = mysqli_query($con, $requete);
                    while($rows = mysqli_fetch_assoc($query)){
                        $id = $rows['doctor_id'];
                        echo "<tr class='border-t border-gray-200 bg-black text-xl'>";
                        echo "<td class='px-4 py-2'>" . $rows['first_name'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['last_name'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['specialization'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['phone_number'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['email'] . "</td>";
                        echo "<td class='flex justify-center items-center'><a href='delete.php?id=" . $id . "'><button class='bg-red-600 text-white font-bold text-xl px-2 rounded-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300 ease-in-out transform hover:scale-105'>-</button></a></td>";      
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </section>
            <!-- Modal for Adding Doctor -->
            <div id="doctorModal" class="fixed inset-0 text-zinc-950 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-black text-neutral-50 p-6 shadow-lg w-96">
                    <h3 class="text-xl font-semibold mb-4">Add Doctor</h3>
                    <form action="add_doctor.php" method="POST">
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="last_name" class="block text-sm">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="specialization" class="block text-sm">Specialization</label>
                            <input type="text" id="specialization" name="specialization" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone_number" class="block text-sm">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm">Email</label>
                            <input type="email" id="email" name="email" class="w-full p-2 border rounded" required>
                        </div>
                        <input type="submit" name="doctor" value="save" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500"></input>
                        <button type="button" onclick="toggleModal('doctorModal')" class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Cancel</button>
                    </form>
                </div>
            </div>
            <!-- Section Patients -->
            <section id="patients" class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Liste des Patients</h2>
                <button onclick="toggleModal('patientModal')" class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500">Ajouter un Patient</button>
                <table class="w-full table-auto shadow-md">
                    <thead class="bg-white text-black">
                        <tr>
                            <th class="px-4 py-2 text-left">First Name</th>
                            <th class="px-4 py-2 text-left">Last Name</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">password</th>
                            <th class="px-4 py-2 text-left">delet</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require 'connexion.php';
                    $requete = 'SELECT * FROM patients';
                    $query = mysqli_query($con, $requete);
                    while($rows = mysqli_fetch_assoc($query)){
                        echo "<tr class='border-t border-gray-200 bg-black text-xl'>";
                        $id = $rows['patient_id'];
                        echo "<td class='px-4 py-2'>" . $rows['first_name'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['last_name'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['email'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['password'] . "</td>";
                        echo "<td class='flex justify-center items-center'><a href='delete.php?id=" . $id . "'><button class='bg-red-600 text-white font-bold text-xl px-2 rounded-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300 ease-in-out transform hover:scale-105'>-</button></a></td>";      
                        echo "</tr>";
                    }
                    ?>       
                    </tbody>
                </table>
            </section>

            <!-- Modal for Adding Patient -->
            <div id="patientModal" class="fixed inset-0 text-zinc-950 bg-black bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-black text-neutral-50 p-6 shadow-lg w-96">
            <h3 class="text-xl font-semibold mb-4">Add Patient</h3>
                    <form action="add_patient.php" method="POST">
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="last_name" class="block text-sm">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm">Email</label>
                            <input type="email" id="email" name="email" class="w-full p-2 border rounded" required>
                        </div>
                        <input type="submit" name="patient" value="save" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500"></input>
                        <button type="button" onclick="toggleModal('patientModal')" class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Cancel</button>
                    </form>
                </div>
            </div>
            <!-- Section Rendez-vous -->
            <section id="appointments" class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Liste des Rendez-vous</h2>
                <button onclick="toggleModal('appointmentModal')" class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500">Ajouter un Rendez-vous</button>
                <table class="w-full table-auto shadow-md">
                    <thead class="bg-white text-black">
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Doctor ID</th>
                            <th class="px-4 py-2 text-left">Patient ID</th>
                            <th class="px-4 py-2 text-left">Appointment Date</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require 'connexion.php';
                    $requete = 'SELECT * FROM appointments';
                    $query = mysqli_query($con, $requete);
                    while($rows = mysqli_fetch_assoc($query)){
                        echo "<tr class='border-t border-gray-200 bg-black text-xl'>";
                        echo "<td class='px-4 py-2'>" . $rows['appointment_id'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['doctor_id'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['patient_id'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['appointment_date'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['status'] . "</td>";
                        echo "<td class='flex justify-center items-center'><a href='delete.php?id=" . $id . "'><button class='bg-red-600 text-white font-bold text-xl px-2 rounded-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300 ease-in-out transform hover:scale-105'>-</button></a></td>";      
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </section>

            <!-- Modal for Adding Appointment -->
            <div id="appointmentModal" class="fixed inset-0 text-zinc-950 bg-black bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-black text-neutral-50 p-6 shadow-lg w-96">
            <h3 class="text-xl font-semibold mb-4">Add Appointment</h3>
                    <form action="add_appointment.php" method="POST">
                        <div class="mb-4">
                            <label for="doctor_id" class="block text-sm">Doctor ID</label>
                            <input type="text" id="doctor_id" name="doctor_id" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="patient_id" class="block text-sm">Patient ID</label>
                            <input type="text" id="patient_id" name="patient_id" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="appointment_date" class="block text-sm">Appointment Date</label>
                            <input type="datetime-local" id="appointment_date" name="appointment_date" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm">Status</label>
                            <select id="status" name="status" class="w-full p-2 border rounded" required>
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <input type="submit" name="appointement" value="save" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500"></input>
                        <button type="button" onclick="toggleModal('appointmentModal')" class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Cancel</button>
                    </form>
                </div>
            </div>

            <!-- Section Consultations -->
            <section id="consultations" class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Liste des Consultations</h2>
                <button onclick="toggleModal('consultationModal')" class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500">Ajouter une Consultation</button>
                <table class="w-full table-auto shadow-md">
                    <thead class="bg-white text-black">
                        <tr>
                            <th class="px-4 py-2 text-left">consultation_id</th>
                            <th class="px-4 py-2 text-left">appointment_id</th>
                            <th class="px-4 py-2 text-left">diagnosis</th>
                            <th class="px-4 py-2 text-left">note</th>
                            <th class="px-4 py-2 text-left">action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require 'connexion.php';
                    $requete = 'SELECT * FROM consultations';
                    $query = mysqli_query($con, $requete);
                    while($rows = mysqli_fetch_assoc($query)){
                        $id = $rows['doctor_id'];
                        echo "<tr class='border-t border-gray-200 bg-black text-xl'>";
                        echo "<td class='px-4 py-2'>" . $rows['consultation_id'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['appointment_id'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['consultation_date'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['diagnosis'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['notes'] . "</td>";
                        echo "<td class='flex justify-center items-center'><a href='delete.php?id=" . $id . "'><button class='bg-red-600 text-white font-bold text-xl px-2 rounded-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300 ease-in-out transform hover:scale-105'>-</button></a></td>";      
                        echo "</tr>";
                    }
                    ?>                             
                    </tbody>
                </table>
            </section>

            <!-- Modal for Adding Consultation -->
            <div id="consultationModal" class="fixed inset-0 text-zinc-950 bg-black bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-black text-neutral-50 p-6 shadow-lg w-96">
            <h3 class="text-xl font-semibold mb-4">Add Consultation</h3>
                    <form action="add_consultation.php" method="POST">
                        <div class="mb-4">
                            <label for="doctor_id" class="block text-sm">Doctor ID</label>
                            <input type="text" id="doctor_id" name="doctor_id" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="patient_id" class="block text-sm">Patient ID</label>
                            <input type="text" id="patient_id" name="patient_id" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="consultation_date" class="block text-sm">Consultation Date</label>
                            <input type="datetime-local" id="consultation_date" name="consultation_date" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="consultation_type" class="block text-sm">Consultation Type</label>
                            <input type="text" id="consultation_type" name="consultation_type" class="w-full p-2 border rounded" required>
                        </div>
                        <input type="submit" value="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500"></input>
                        <button type="button" onclick="toggleModal('consultationModal')" class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Cancel</button>
                    </form>
                </div>
            </div>

            <!-- Section Admins -->
            <section id="admins" class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Liste des Administrateurs</h2>
                <button onclick="toggleModal('adminModal')" class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500">Ajouter un Administrateur</button>
                <table class="w-full table-auto shadow-md">
                    <thead class="bg-white text-black">
                        <tr>
                            <th class="px-4 py-2 text-left">User Name</th>
                            <th class="px-4 py-2 text-left">password</th>
                            <th class="px-4 py-2 text-left">delet</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require 'connexion.php';
                    $requete = 'SELECT * FROM admin';
                    $query = mysqli_query($con, $requete);
                    while($rows = mysqli_fetch_assoc($query)){
                        $id = $rows['admin_id'];
                        echo "<tr class='border-t border-gray-200 bg-black text-xl'>";
                        echo "<td class='px-4 py-2'>" . $rows['username'] . "</td>";
                        echo "<td class='px-4 py-2'>" . $rows['password'] . "</td>";
                        echo "<td class='flex justify-center items-center'><a href='delete.php?id=" . $id . "'><button class='bg-red-600 text-white font-bold text-xl px-2 rounded-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300 ease-in-out transform hover:scale-105'>-</button></a></td>";      
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </section>

            <!-- Modal for Adding Admin -->
            <div id="adminModal" class="fixed inset-0 text-zinc-950 bg-black bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-black text-neutral-50 p-6 shadow-lg w-96">
            <h3 class="text-xl font-semibold mb-4">Add Admin</h3>
                    <form action="add_admin.php" method="POST">
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="last_name" class="block text-sm">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm">Email</label>
                            <input type="email" id="email" name="email" class="w-full p-2 border rounded" required>
                        </div>
                        <input type="submit" name="admin" value="save" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500"></input>
                        <button type="button" onclick="toggleModal('adminModal')" class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Cancel</button>
                    </form>
                </div>
            </div>

        </main>

    </section>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>

</body>

</html>
