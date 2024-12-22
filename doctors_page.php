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
    <title>Doctors List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[url('./img/background.jpg')] bg-cover bg-no-repeat bg-center text-zinc-50 bg-fixed">

    <!-- Header -->
    <header class="bg-black text-white p-6 text-center flex items-center justify-around">
        <div>
            <h1 class="text-3xl font-semibold">Our Doctors</h1>
            <p class="text-xl">Browse the list of available doctors and their specializations</p>
        </div>
        <div>
           <a href="home.php"> <img src="./img/maison.png" alt="Logo" class="w-16 h-16 object-contain"></a>
        </div>
    </header>

    <main class="flex flex-col items-center justify-center p-6 min-h-screen">


    <section class="w-full max-w-6xl grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-green-600 transition">
                <img src="./img/doctor-checking-breathing-problem-sick-senior-woman-hospital.jpg" alt="Dr. John Doe" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">Dr. John Doe</h3>
                <p class="text-gray-400 mb-2">Cardiologist</p>
                <p class="text-green-400 mb-2">+123 456 7890</p>
                <p class="text-green-400 mb-4">johndoe@example.com</p>
                <a href="#" class="text-green-400 hover:text-white">View Profile</a>
            </div>

            <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-green-600 transition">
                <img src="./img/neurologist-doctor-analysing-brain-man-nervous-system-using-brainwave-scanning-headset-researcher-using-high-tech-developing-neurological-innovation-monitoring-side-effects-monitor-screen.jpg" alt="Dr. Jane Smith" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">Dr. Emily Brown</h3>
                <p class="text-gray-400 mb-2">Neurologist</p>
                <p class="text-green-400 mb-2">+123 456 7891</p>
                <p class="text-green-400 mb-4">janesmith@example.com</p>
                <a href="#" class="text-green-400 hover:text-white">View Profile</a>
            </div>

            <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-green-600 transition">
                <img src="./img/paediatrician-doctor-examining-child-comfortabe-medical-office-healthcare-childhood-medicine-protection-prevention-concept-little-boy-trust-doctor-feels-calm-positive-emotions.jpg" alt="Dr. Emily Brown" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">Dr. Jane Smith</h3>
                <p class="text-gray-400 mb-2">Pediatrician</p>
                <p class="text-green-400 mb-2">+123 456 7892</p>
                <p class="text-green-400 mb-4">emilybrown@example.com</p>
                <a href="#" class="text-green-400 hover:text-white">View Profile</a>
            </div>

         
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-green-600 transition">
                <img src="./img/portrait-concentrated-male-doctor-dressed-uniform.jpg" alt="Dr. Alan White" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">Dr. Alan White</h3>
                <p class="text-gray-400 mb-2">Orthopedic Surgeon</p>
                <p class="text-green-400 mb-2">+123 456 7893</p>
                <p class="text-green-400 mb-4">alanwhite@example.com</p>
                <a href="#" class="text-green-400 hover:text-white">View Profile</a>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-black text-white text-center py-4">
        <p>&copy; 2024 My Health Application. All rights reserved.</p>
    </footer>

</body>

</html>
