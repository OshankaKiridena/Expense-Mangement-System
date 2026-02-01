<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password - Expense Manager Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-[#8fd3d1]">

<!-- MAIN CONTAINER -->
<div class="w-full max-w-xl text-center">

    <!-- LOGO + TITLE -->
    <div class="flex items-center justify-center mb-6 space-x-3">
        <div class="bg-blue-500 text-white p-3 rounded-lg font-bold text-xl">
            $
        </div>
        <div class="text-left">
            <h1 class="text-2xl font-bold text-gray-800">EXPENSE</h1>
            <p class="italic text-gray-700">MANAGER PRO</p>
        </div>
    </div>

    <!-- PAGE TITLE -->
    <h2 class="text-3xl font-medium text-gray-800 mb-3">
        Forgot Password
    </h2>

    <hr class="w-2/3 mx-auto mb-8 border-gray-600">

    <!-- FORM (UI ONLY) -->
    <form onsubmit="showMessage(); return false;" class="space-y-6">

        <div class="text-left w-2/3 mx-auto">
            <label class="text-sm text-gray-700">
                Please enter Email
            </label>
            <input
                type="email"
                required
                placeholder="hello@reallygreatsite.com"
                class="w-full mt-2 px-4 py-2 rounded-md border
                       focus:outline-none focus:ring-2 focus:ring-purple-400">
        </div>

        <button
            type="submit"
            class="px-10 py-2 rounded-full text-white
                   bg-gradient-to-r from-purple-400 to-blue-500
                   hover:opacity-90 transition font-semibold">
            SEND
        </button>

    </form>

    <!-- SUCCESS MESSAGE (HIDDEN INITIALLY) -->
    <p id="successMsg"
       class="hidden mt-6 text-green-700 font-medium">
        ✅ If this email exists, a password reset link has been sent.
    </p>

    <!-- BACK TO LOGIN -->
    <p class="mt-4 text-sm text-gray-700">
        <a href="login.php" class="text-purple-600 hover:underline">
            Back to Login
        </a>
    </p>

</div>

<!-- SIMPLE JS -->
<script>
function showMessage() {
    document.getElementById("successMsg").classList.remove("hidden");
}
</script>

</body>
</html>
