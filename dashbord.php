<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('./img/pexels-pixabay-315938.jpg')] bg-cover bg-no-repeat bg-center text-zinc-50 bg-fixed">

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
      <!-- Section Docteurs -->
<section id="doctors">
    <h2 class="text-xl font-semibold mb-4">Liste des Docteurs</h2>
    <button class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500" >Ajouter un Docteur</button>
    <table class="w-full table-auto rounded-lg shadow-md">
        <thead class="bg-black">
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
             $requete = "SELECT * FROM doctors ";  
             $query = mysqli_query($con, $requete);
             while ($row = mysqli_fetch_assoc($query)) {
                 echo "<tr class='border-t border-gray-200 hover:bg-black'>";
                 echo "<td class='px-4 py-2'>" . $row['first_name'] . "</td>";  
                 echo "<td class='px-4 py-2'>" . $row['last_name'] . "</td>";  
                 echo "<td class='px-4 py-2'>" . $row['specialization'] . "</td>";  
                 echo "<td class='px-4 py-2'>" . $row['phone_number'] . "</td>";  
                 echo "<td class='px-4 py-2'>" . $row['email'] . "</td>";  
                 echo "</tr>";
             }
        ?>
        </tbody>
    </table>
</section>

<!-- Section Patients -->
<section id="patients" class="mt-8">
    <h2 class="text-xl font-semibold mb-4">Liste des Patients</h2>
    <button class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500">Ajouter un Patient</button>
    <table class="w-full table-auto rounded-lg shadow-md">
        <thead class="bg-black">
            <tr>
                <th class="px-4 py-2 text-left">First Name</th>
                <th class="px-4 py-2 text-left">Last Name</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>

        <tbody>
             <?php
             require 'connexion.php';
             $requete = "SELECT * FROM patients ";  
             $query = mysqli_query($con, $requete);
             while ($row = mysqli_fetch_assoc($query)) {
                 echo "<tr class='border-t border-gray-200 hover:bg-black'>";
                 echo "<td class='px-4 py-2'>" . $row['first_name'] . "</td>";  
                 echo "<td class='px-4 py-2'>" . $row['last_name'] . "</td>";  
                 echo "<td class='px-4 py-2'>" . $row['email'] . "</td>";  
                 echo "</tr>";
             }
        ?>
        </tbody>
    </table>
</section>

<!-- Section Rendez-vous -->
<section id="appointments" class="mt-8">
    <h2 class="text-xl font-semibold mb-4">Liste des Rendez-vous</h2>
    <button class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500">Ajouter un Rendez-vous</button>
    <table class="w-full table-auto rounded-lg shadow-md">
        <thead class="bg-black">
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
            <!-- Les données seront chargées dynamiquement -->
        </tbody>
    </table>
</section>

<!-- Section Consultations -->
<section id="consultations" class="mt-8">
    <h2 class="text-xl font-semibold mb-4">Liste des Consultations</h2>
    <button class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500">Ajouter une Consultation</button>
    <table class="w-full table-auto rounded-lg shadow-md">
        <thead class="bg-black">
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Appointment ID</th>
                <th class="px-4 py-2 text-left">Consultation Date</th>
                <th class="px-4 py-2 text-left">Diagnosis</th>
                <th class="px-4 py-2 text-left">Notes</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Les données seront chargées dynamiquement -->
        </tbody>
    </table>
</section>

<!-- Section Administrateur -->
<section id="admins" class="mt-8">
    <h2 class="text-xl font-semibold mb-4">Détails de l'Administrateur</h2>
    <table class="w-full table-auto rounded-lg shadow-md">
        <thead class="bg-black">
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Username</th>
                <th class="px-4 py-2 text-left">First Name</th>
                <th class="px-4 py-2 text-left">Last Name</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Les données seront chargées dynamiquement -->
        </tbody>
    </table>
</section>


    </main>

</section>

<script src="app.js"></script>
</body>
</html>
