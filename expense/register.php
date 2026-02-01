<?php
include("db.php");

if (isset($_POST['register'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query(
        $conn,
        "INSERT INTO users (email, password, role)
         VALUES ('$email', '$hashed_password', 'user')"
    );

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Expense Manager Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center
             bg-gradient-to-r from-green-200 via-blue-200 to-blue-400">

<div class="bg-white/40 backdrop-blur-md
            rounded-xl shadow-lg p-10 w-[420px] text-center">

    <!-- APP TITLE -->
    <h1 class="text-3xl font-bold text-gray-800 mb-1">
        EXPENSE
    </h1>
    <h2 class="text-xl italic text-gray-700 mb-8">
        MANAGER PRO
    </h2>

    <!-- REGISTER TITLE -->
    <h3 class="text-2xl font-semibold text-gray-800 mb-6">
        Create Account
    </h3>

    <!-- REGISTER FORM -->
    <form method="post" class="space-y-5">

        <div class="text-left">
            <label class="text-sm text-gray-700">
                Please enter Email
            </label>
            <input
                type="email"
                name="email"
                required
                class="w-full mt-1 px-4 py-2 rounded-md border
                       focus:outline-none focus:ring-2 focus:ring-purple-400"
                placeholder="hello@example.com">
        </div>

        <div class="text-left">
            <label class="text-sm text-gray-700">
                Please enter password
            </label>
            <input
                type="password"
                name="password"
                required
                class="w-full mt-1 px-4 py-2 rounded-md border
                       focus:outline-none focus:ring-2 focus:ring-purple-400"
                placeholder="******">
        </div>

        <button
            type="submit"
            name="register"
            class="w-full py-2 rounded-full text-white
                   bg-gradient-to-r from-purple-400 to-blue-500
                   hover:opacity-90 transition font-semibold">
            REGISTER
        </button>

    </form>

    <!-- LOGIN LINK -->
    <p class="mt-6 text-sm text-gray-700">
        Already have an account?
        <a href="login.php" class="text-purple-600 font-medium hover:underline">
            Login
        </a>
    </p>

</div>

</body>
</html>
