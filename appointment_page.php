<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[url('./img/background.jpg')] bg-cover bg-no-repeat bg-center text-zinc-50 bg-fixed">

    <!-- Header -->
    <header class="bg-black text-white p-6 text-center">
        <h1 class="text-3xl font-semibold">Your Appointments</h1>
        <p class="text-xl">Manage your upcoming medical appointments</p>
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
                    <!-- Example Appointment 1 -->
                    <tr class="hover:bg-green-600 transition">
                        <td class="px-4 py-2">Dr. John Doe</td>
                        <td class="px-4 py-2">2024-12-25 10:30 AM</td>
                        <td class="px-4 py-2 text-yellow-400">Scheduled</td>
                        <td class="px-4 py-2">
                            <a href="#" class="text-red-400 hover:text-white">Cancel</a>
                        </td>
                    </tr>
                    <!-- Example Appointment 2 -->
                    <tr class="hover:bg-green-600 transition">
                        <td class="px-4 py-2">Dr. Jane Smith</td>
                        <td class="px-4 py-2">2024-12-30 2:00 PM</td>
                        <td class="px-4 py-2 text-yellow-400">Scheduled</td>
                        <td class="px-4 py-2">
                            <a href="#" class="text-red-400 hover:text-white">Cancel</a>
                        </td>
                    </tr>
                    <!-- More rows can be added dynamically -->
                </tbody>
            </table>
        </section>

        <!-- Book New Appointment Section -->
        <section class="w-full max-w-6xl bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-6 text-center">Book a New Appointment</h2>

            <form action="#" method="POST" class="space-y-6">
                <!-- Doctor Selection -->
                <div class="flex flex-col">
                    <label for="doctor" class="text-lg">Select a Doctor</label>
                    <select id="doctor" name="doctor" class="px-4 py-2 bg-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-400">
                        <option value="1">Dr. John Doe - Cardiologist</option>
                        <option value="2">Dr. Jane Smith - Neurologist</option>
                        <option value="3">Dr. Emily Brown - Pediatrician</option>
                        <!-- More doctors can be added dynamically -->
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

    <!-- Footer -->
    <footer class="bg-black text-white text-center py-4">
        <p>2024 My Health Application. All rights reserved.</p>
    </footer>

</body>

</html>
