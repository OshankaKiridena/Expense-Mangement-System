<?php
session_start();
include("db.php");

/* Only admin can access */
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

/* Get all users */
$users = mysqli_query($conn, "SELECT id, email, role FROM users");

/* Get all expenses */
$expenses = mysqli_query($conn,
    "SELECT expenses.id, users.email, expenses.title, expenses.amount
     FROM expenses
     JOIN users ON expenses.user_id = users.id"
);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>

  <!-- Tailwind CDN (allowed for this page) -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

<h1 class="text-3xl font-bold text-center text-purple-600 mb-6">
  Admin Dashboard
</h1>

<div class="flex justify-center mb-6">
  <a href="logout.php"
     class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
    Logout
  </a>
</div>

<!-- USERS TABLE -->
<div class="bg-white p-4 rounded shadow mb-8 max-w-4xl mx-auto">
  <h2 class="text-xl font-bold mb-4">All Users</h2>

  <table class="w-full border">
    <tr class="bg-gray-200">
      <th class="border p-2">ID</th>
      <th class="border p-2">Email</th>
      <th class="border p-2">Role</th>
    </tr>

    <?php while ($u = mysqli_fetch_assoc($users)) { ?>
    <tr>
      <td class="border p-2"><?= $u['id'] ?></td>
      <td class="border p-2"><?= $u['email'] ?></td>
      <td class="border p-2"><?= $u['role'] ?></td>
    </tr>
    <?php } ?>
  </table>
</div>

<!-- EXPENSES TABLE -->
<div class="bg-white p-4 rounded shadow max-w-4xl mx-auto">
  <h2 class="text-xl font-bold mb-4">All Expenses</h2>

  <table class="w-full border">
    <tr class="bg-gray-200">
      <th class="border p-2">User</th>
      <th class="border p-2">Title</th>
      <th class="border p-2">Amount</th>
    </tr>

    <?php while ($e = mysqli_fetch_assoc($expenses)) { ?>
    <tr>
      <td class="border p-2"><?= $e['email'] ?></td>
      <td class="border p-2"><?= $e['title'] ?></td>
      <td class="border p-2"><?= $e['amount'] ?></td>
    </tr>
    <?php } ?>
  </table>
</div>

</body>
</html>
