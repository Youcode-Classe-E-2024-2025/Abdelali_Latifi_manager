<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[url('./img/background.jpg')] bg-cover bg-no-repeat bg-center text-zinc-50 bg-fixed">

    <!-- Header -->
    <header class="bg-black text-white p-6 text-center">
        <h1 class="text-3xl font-semibold">Welcome to your dashboard, User</h1>
        <p class="text-xl">Manage your information and access important services</p>
    </header>
    <main class="flex flex-col items-center justify-center p-6 min-h-screen">
        <section class="text-center mb-8">
            <div class="space-x-4">
                <a href="#doctors" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-500">View Doctors</a>
                <a href="#appointments" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-500">View My Appointments</a>
            </div>
        </section>
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-4xl">
            <!-- Card: Doctors -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-green-600 transition">
                <img src="./img/team-young-specialist-doctors-standing-corridor-hospital.jpg" alt="Doctor" class="w-full h-40 object-cover rounded-t-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">Doctors</h3>
                <p class="mb-4">Browse the list of available doctors, their specialties, and contact details.</p>
                <a href="#doctors" class="text-green-400 hover:text-white">See More</a>
            </div>

            <!-- Card: Appointments -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-green-600 transition">
                <img src="./img/closeup-hands-passing-contract-unrecognizable-businessman.jpg" alt="Appointments" class="w-full h-40 object-cover rounded-t-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">Appointments</h3>
                <p class="mb-4">View your scheduled appointments, cancel or modify them as needed.</p>
                <a href="#appointments" class="text-green-400 hover:text-white">See More</a>
            </div>

            <!-- Card: Personal Info -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-green-600 transition">
                <img src="./img/patient.jpg" alt="Personal Info" class="w-full h-40 object-cover rounded-t-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">My Information</h3>
                <p class="mb-4">Review and update your personal information.</p>
                <a href="#profile" class="text-green-400 hover:text-white">See More</a>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-black text-white text-center py-4">
        <p></p>
    </footer>

</body>

</html>
