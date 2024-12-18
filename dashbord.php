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
                <a href="#doctors" class="text-lg hover:text-green-400">Docteurs</a>
            </li>
            <li class="mb-4">
                <a href="#patients" class="text-lg hover:text-green-400">Patients</a>
            </li>
            <li class="mb-4">
                <a href="#appointments" class="text-lg hover:text-green-400">Rendez-vous</a>
            </li>
            <li class="mb-4">
                <a href="#consultations" class="text-lg hover:text-green-400">Consultations</a>
            </li>
            <li class="mb-4">
                <a href="#admins" class="text-lg hover:text-green-400">Administrateurs</a>
            </li>
        </ul>
    </nav>
</aside>


    <!-- Main Content -->
    <main class="flex-grow p-6">
        
        <!-- Section Docteurs -->
        <section id="doctors">
            <h2 class="text-xl font-semibold mb-4">Liste des Docteurs</h2>
            <button class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500" onclick="showAddDoctorForm()">Ajouter un Docteur</button>
            <table class="w-full table-auto  rounded-lg shadow-md">
                <thead class="bg-black">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Prénom</th>
                        <th class="px-4 py-2 text-left">Nom</th>
                        <th class="px-4 py-2 text-left">Spécialisation</th>
                        <th class="px-4 py-2 text-left">Numéro de téléphone</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Les données seront chargées dynamiquement -->
                </tbody>
            </table>
        </section>

        <!-- Section Patients -->
        <section id="patients" class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Liste des Patients</h2>
            <button class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500">Ajouter un Patient</button>
            <table class="w-full table-auto bg-black rounded-lg shadow-md">
                <thead class="bg-black">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Prénom</th>
                        <th class="px-4 py-2 text-left">Nom</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Les données seront chargées dynamiquement -->
                </tbody>
            </table>
        </section>

        <!-- Section Rendez-vous -->
        <section id="appointments" class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Liste des Rendez-vous</h2>
            <button class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500">Ajouter un Rendez-vous</button>
            <table class="w-full table-auto bg-white rounded-lg shadow-md">
                <thead class="bg-black">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Docteur</th>
                        <th class="px-4 py-2 text-left">Patient</th>
                        <th class="px-4 py-2 text-left">Date et Heure</th>
                        <th class="px-4 py-2 text-left">Statut</th>
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
            <table class="w-full table-auto bg-white rounded-lg shadow-md">
                <thead class="bg-black">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Rendez-vous</th>
                        <th class="px-4 py-2 text-left">Date de Consultation</th>
                        <th class="px-4 py-2 text-left">Diagnostic</th>
                        <th class="px-4 py-2 text-left">Notes</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Les données seront chargées dynamiquement -->
                </tbody>
            </table>
        </section>

        <!-- Section Administrateurs -->
        <section id="admins" class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Liste des Administrateurs</h2>
            <button class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500">Ajouter un Administrateur</button>
            <table class="w-full table-auto bg-white rounded-lg shadow-md">
                <thead class="bg-black">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Nom d'utilisateur</th>
                        <th class="px-4 py-2 text-left">Prénom</th>
                        <th class="px-4 py-2 text-left">Nom</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Rôle</th>
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
