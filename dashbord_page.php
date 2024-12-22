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

    <section class="flex">

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
                        <a href="#consultations" class="text-lg hover:text-green-400">Administrateurs</a>
                    </li>
                    <li class="mb-4">
                        <a href="#admins" class="text-lg hover:text-green-400">ADMIN</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="flex-grow p-6">

            <section id="doctors">
                <h2 class="text-xl font-semibold mb-4">Liste des Docteurs</h2>
                <button onclick="toggleModal('doctorModal')" class="bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-500">Ajouter un Docteur</button>
                <table class="w-full table-auto shadow-md">
                    <thead class="bg-white text-black">
                        <tr>
                            <th class="px-4 py-2 text-left">First Name</th>
                            <th class="px-4 py-2 text-left">Last Name</th>
                            <th class="px-4 py-2 text-left">Specialization</th>
                            <th class="px-4 py-2 text-left">Phone Number</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">delete doctor</th>
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
                        echo "<td class='flex justify-center items-center'><a href='delet_doctor.php?id=" . $id . "'><button class='bg-red-600 text-white font-bold text-xl px-2 rounded-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300 ease-in-out transform hover:scale-105'>-</button></a></td>"; 
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </section>
            <!-- Modal for Adding Doctor -->
            <div id="doctorModal" class="fixed inset-0 text-neutral-950 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-black text-neutral-50 p-6 shadow-lg w-96">
                    <h3 class="text-xl font-semibold mb-4">Add Doctor</h3>
                    <form action="./add_doctor.php" method="POST">
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="w-full p-2 border rounded text-neutral-950	" required>
                        </div>
                        <div class="mb-4">
                            <label for="last_name" class="block text-sm">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="w-full p-2 border rounded text-neutral-950" required>
                        </div>
                        <div class="mb-4">
                            <label for="specialization" class="block text-sm">Specialization</label>
                            <input type="text" id="specialization" name="specialization" class="w-full p-2 border rounded  text-neutral-950" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone_number" class="block text-sm">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" class="w-full p-2 border rounded text-neutral-950" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm">Email</label>
                            <input type="email" id="email" name="email" class="w-full p-2 border rounded text-neutral-950" required>
                        </div>
                        <input type="submit" name="doctor" value="save" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500"></input>
                        <button type="button" onclick="toggleModal('doctorModal')" class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Cancel</button>
                    </form>
                </div>
            </div>
            <!-- Section Patients -->
            <section id="patients" class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Liste des Patients</h2>
                <table class="w-full table-auto shadow-md">
                    <thead class="bg-white text-black">
                        <tr>
                            <th class="px-4 py-2 text-left">First Name</th>
                            <th class="px-4 py-2 text-left">Last Name</th>
                            <th class="px-4 py-2 text-left">Email</th>
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
                        echo "<td class='flex justify-center items-center'><a href='./delet_patient.php?id=" . $id . "'><button class='bg-red-600 text-white font-bold text-xl px-2 rounded-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300 ease-in-out transform hover:scale-105'>-</button></a></td>";      
                        echo "</tr>";
                    }
                    ?>       
                    </tbody>
                </table>
            </section>
<section id="appointments" class="mt-8">
    <h2 class="text-xl font-semibold mb-4">Liste des Rendez-vous</h2>
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
            $formatted_date = date("d-m-Y H:i", strtotime($rows['appointment_date']));

            $status_class = '';
            if ($rows['status'] == 'Completed') {
                $status_class = 'text-green-500'; 
            } elseif ($rows['status'] == 'Pending') {
                $status_class = 'text-yellow-500'; 
            } else {
                $status_class = 'text-red-500'; 
            }

            echo "<tr class='border-t border-gray-200 bg-black text-xl'>";
            echo "<td class='px-4 py-2'>" . $rows['appointment_id'] . "</td>";
            echo "<td class='px-4 py-2'>" . $rows['doctor_id'] . "</td>";
            echo "<td class='px-4 py-2'>" . $rows['patient_id'] . "</td>";
            echo "<td class='px-4 py-2'>" . $formatted_date . "</td>";
            echo "<td class='px-4 py-2 " . $status_class . "'>" . $rows['status'] . "</td>";
            echo "<td class='px-4 py-2'>
                    <a href='edit_appointment.php?id=" . $rows['appointment_id'] . "' class='text-blue-500'>Edit</a> | 
                    <a href='delete_appointment.php?id=" . $rows['appointment_id'] . "' class='text-red-500' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</section>

            <section id="contacts" class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Liste des contacts</h2>
            <table class="w-full table-auto shadow-md">
                <thead class="bg-white text-black">
                    <tr>
                        <th class="px-4 py-2 text-left">contact_id</th>
                        <th class="px-4 py-2 text-left">name</th>
                        <th class="px-4 py-2 text-left">email</th>
                        <th class="px-4 py-2 text-left">message</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require 'connexion.php';
                $requete = 'SELECT * FROM contact';
                $query = mysqli_query($con, $requete);
                while($rows = mysqli_fetch_assoc($query)){
                    echo "<tr class='border-t border-gray-200 bg-black text-xl'>";
                    echo "<td class='px-4 py-2'>" . $rows['id'] . "</td>";
                    echo "<td class='px-4 py-2'>" . $rows['name'] . "</td>";
                    echo "<td class='px-4 py-2'>" . $rows['email'] . "</td>";
                    echo "<td class='px-4 py-2'>" . $rows['message'] . "</td>";
                    echo "</tr>";
                }
                ?>                             
                </tbody>
            </table>
        </section>
            <!-- Section Admins -->
            <section id="admins" class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Liste des Administrateurs</h2>
                <table class="w-full table-auto shadow-md">
                    <thead class="bg-white text-black">
                        <tr>
                            <th class="px-4 py-2 text-left">User Name</th>
                            <th class="px-4 py-2 text-left">password</th>
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
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </section>

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
