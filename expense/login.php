<?php
session_start();
include("db.php");

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: dashboard.php");
        }
        exit();

    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login - Expense Manager Pro</title>
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

    <!-- LOGIN TITLE -->
    <h3 class="text-2xl font-semibold text-gray-800 mb-6">
        Login
    </h3>

    <?php if (isset($error)) { ?>
        <p class="text-red-600 mb-4"><?= $error ?></p>
    <?php } ?>

    <!-- LOGIN FORM -->
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
                <div class="text-right mt-2">
    <a href="forgot_password.php"
       class="text-sm text-purple-600 hover:underline">
       Forgot password?
    </a>
</div>

        </div>

        <button
            name="login"
            class="w-full py-2 rounded-full text-white
                   bg-gradient-to-r from-purple-400 to-blue-500
                   hover:opacity-90 transition font-semibold">
            LOGIN
        </button>

    </form>

</div>

</body>
</html>
