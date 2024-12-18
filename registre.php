<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Improved Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('./img/pexels-pixabay-315938.jpg')] bg-cover bg-no-repeat bg-center text-zinc-50 bg-fixed">
    <!-- Header -->
    <header class="flex justify-between items-center px-6 py-4">
        <h1 class="text-2xl font-extrabold">LOGO</h1>
        <div>
            <button><a href="login.php" id="sign_up" class="p-2 text-xl font-bold rounded-lg hover:bg-violet-600">Sign in</a></button>
        </div>
    </header>

    <!-- Form Section -->
    <section id="FormSignUp" class="flex flex-col items-center w-full max-w-lg mx-auto mt-10 p-6">
        <h2 class="text-2xl font-bold mb-4">Sign Up</h2>
        <form id="signUpForm" action="#" class="w-full space-y-4">
            <div>
                <label for="first-name" class="block text-xl font-bold">First Name</label>
                <input id="first-name" type="text" placeholder="Enter your first name" class="w-full p-2 rounded-lg bg-violet-950 focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
            </div>
            <div>
                <label for="last-name" class="block text-xl font-bold">Last Name</label>
                <input id="last-name" type="text" placeholder="Enter your last name" class="w-full p-2 rounded-lg bg-violet-950 focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
            </div>
            <div>
                <label for="email" class="block text-xl font-bold">Email</label>
                <input id="email" type="email" placeholder="Enter your email" class="w-full p-2 rounded-lg bg-violet-950 focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
            </div>
            <div>
                <label for="password" class="block text-xl font-bold">Password</label>
                <input id="password" type="password" placeholder="Enter your password" class="w-full p-2 rounded-lg bg-violet-950 focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
            </div>
            <button type="submit" class="w-full p-3 mt-4 font-bold text-white bg-black rounded-lg hover:bg-green-600">
                Submit
            </button>
        </form>
    </section>
    <script src="registre.js" ></script>
</body>
</html>