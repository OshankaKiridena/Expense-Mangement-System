<!DOCTYPE html>
<html>
<head>
  <title>Expense Manager Pro</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center
             bg-gradient-to-r from-green-200 via-blue-200 to-blue-400">

  <!-- MAIN CARD -->
  <div class="bg-white/40 backdrop-blur-md
              rounded-xl shadow-lg p-10 w-[420px] text-center">

    <!-- APP BRAND -->
    <div class="flex items-center justify-center mb-6 space-x-3">
        <div class="bg-blue-500 text-white p-3 rounded-lg font-bold text-xl">
            $
        </div>
        <div class="text-left">
            <h1 class="text-2xl font-bold text-gray-800">
                EXPENSE
            </h1>
            <p class="italic text-gray-700">
                MANAGER PRO
            </p>
        </div>
    </div>

    <!-- TAGLINE -->
    <p class="text-gray-700 mb-8">
        Track, manage, and analyze your expenses with ease.
    </p>

    <!-- ACTION BUTTONS -->
    <div class="flex justify-center space-x-4">
        <a href="login.php"
           class="px-6 py-2 rounded-full text-white font-medium
                  bg-gradient-to-r from-purple-400 to-blue-500
                  hover:opacity-90 transition">
            Login
        </a>

        <a href="register.php"
           class="px-6 py-2 rounded-full text-white font-medium
                  bg-green-500 hover:bg-green-600 transition">
            Register
        </a>
    </div>

  </div>

</body>
</html>
