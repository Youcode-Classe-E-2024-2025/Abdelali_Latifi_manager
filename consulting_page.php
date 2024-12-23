<?php
session_start();

if (!isset($_SESSION['name'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Consultations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[url('./img/background.jpg')] bg-cover bg-no-repeat bg-center text-zinc-50 bg-fixed">

    <!-- Header -->
    <header class="bg-black text-white p-6 text-center flex items-center justify-around">
        <div>
            <h1 class="text-3xl font-semibold">Your Consultations</h1>
            <p class="text-xl">Review the details of your consultations</p>
        </div>
        <div>
           <a href="./home.php"> <img src="./img/maison.png" alt="Logo" class="w-16 h-16 object-contain"></a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex flex-col items-center justify-center p-6 min-h-screen">
        <section class="w-full max-w-6xl mb-8">
            <h2 class="text-2xl font-semibold mb-4">Upcoming Consultations</h2>

            <!-- Table of Consultations -->
            <table class="w-full table-auto rounded-lg shadow-md bg-gray-800">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Doctor</th>
                        <th class="px-4 py-2 text-left">Consultation Date</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Consultation 1 -->
                    <tr class="hover:bg-green-600 transition">
                        <td class="px-4 py-2">Dr. John Doe</td>
                        <td class="px-4 py-2">2024-12-20 2:30 PM</td>
                        <td class="px-4 py-2 text-yellow-400">Scheduled</td>
                        <td class="px-4 py-2">
                            <a href="#" class="text-blue-400 hover:text-white">View Details</a>
                        </td>
                    </tr>
                    <!-- Example Consultation 2 -->
                    <tr class="hover:bg-green-600 transition">
                        <td class="px-4 py-2">Dr. Emily Brown</td>
                        <td class="px-4 py-2">2024-12-25 10:00 AM</td>
                        <td class="px-4 py-2 text-yellow-400">Scheduled</td>
                        <td class="px-4 py-2">
                            <a href="#" class="text-blue-400 hover:text-white">View Details</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="w-full max-w-6xl mb-8">
            <h2 class="text-2xl font-semibold mb-4">Past Consultations</h2>

            <table class="w-full table-auto rounded-lg shadow-md bg-gray-800">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Doctor</th>
                        <th class="px-4 py-2 text-left">Consultation Date</th>
                        <th class="px-4 py-2 text-left">Diagnosis</th>
                        <th class="px-4 py-2 text-left">Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-green-600 transition">
                        <td class="px-4 py-2">Dr. John Doe</td>
                        <td class="px-4 py-2">2024-11-10 4:00 PM</td>
                        <td class="px-4 py-2">Hypertension</td>
                        <td class="px-4 py-2">Prescribed medication for blood pressure management. Follow-up in 1 month.</td>
                    </tr>
                    <tr class="hover:bg-green-600 transition">
                        <td class="px-4 py-2">Dr. Jane Smith</td>
                        <td class="px-4 py-2">2024-10-22 3:30 PM</td>
                        <td class="px-4 py-2">Migraine</td>
                        <td class="px-4 py-2">Advised lifestyle changes and prescribed pain relief medication.</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="w-full max-w-6xl bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-6 text-center">Request a New Consultation</h2>

            <form action="#" method="POST" class="space-y-6">
                <div class="flex flex-col">
                    <label for="doctor" class="text-lg">Select a Doctor</label>
                    <select id="doctor" name="doctor" class="px-4 py-2 bg-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-400">
                        <option value="1">Dr. John Doe - Cardiologist</option>
                        <option value="2">Dr. Jane Smith - Neurologist</option>
                        <option value="3">Dr. Emily Brown - Pediatrician</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label for="consultation_date" class="text-lg">Select Date and Time</label>
                    <input type="datetime-local" id="consultation_date" name="consultation_date" class="px-4 py-2 bg-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-500 transition">Request Consultation</button>
                </div>
            </form>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-black text-white text-center py-4">
        <p>&copy; 2024 My Health Application. All rights reserved.</p>
    </footer>

</body>

</html>
