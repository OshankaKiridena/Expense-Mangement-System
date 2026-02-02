<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query(
    $conn,
    "SELECT title, amount, expense_date, id 
     FROM expenses 
     WHERE user_id = $user_id 
     ORDER BY expense_date DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - Expense Manager Pro</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-r from-green-200 via-blue-200 to-blue-400">

<!-- NAVBAR -->
<div class="flex justify-between items-center px-10 py-6">
    <div class="flex items-center space-x-3">
        <div class="bg-blue-500 text-white p-3 rounded-lg font-bold">
            $
        </div>
        <div>
            <h1 class="text-2xl font-bold text-gray-800">EXPENSE</h1>
            <p class="italic text-gray-700">MANAGER PRO</p>
        </div>
    </div>

    <div class="space-x-6 text-gray-700 font-medium">
        <span class="underline">Dashboard</span>
        <a href="add.php" class="hover:underline">Create</a>
        <a href="#" class="hover:underline">Expenses</a>
        <a href="#" class="hover:underline">Reports</a>
        <a href="logout.php"
           class="bg-purple-500 text-white px-4 py-1 rounded-full">
           Logout
        </a>
    </div>
</div>

<!-- SUMMARY CARDS -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 px-10 mt-6">

    <div class="bg-green-400 rounded-xl p-6 text-center shadow relative">
        <span class="absolute top-2 left-1/2 -translate-x-1/2 h-3 w-3 bg-red-500 rounded-full"></span>
        <h3 class="font-bold text-white">TOTAL EXPENSES</h3>
        <p class="text-white text-sm mt-2">All time</p>
    </div>

    <div class="bg-green-400 rounded-xl p-6 text-center shadow relative">
        <span class="absolute top-2 left-1/2 -translate-x-1/2 h-3 w-3 bg-red-500 rounded-full"></span>
        <h3 class="font-bold text-white">MONTHLY EXPENSES</h3>
        <p class="text-white text-sm mt-2">Record your expenses</p>
    </div>

    <div class="bg-green-400 rounded-xl p-6 text-center shadow relative">
        <span class="absolute top-2 left-1/2 -translate-x-1/2 h-3 w-3 bg-red-500 rounded-full"></span>
        <h3 class="font-bold text-white">YEARLY EXPENSES</h3>
        <p class="text-white text-sm mt-2">Analyze spending</p>
    </div>

    <div class="bg-green-400 rounded-xl p-6 text-center shadow relative">
        <span class="absolute top-2 left-1/2 -translate-x-1/2 h-3 w-3 bg-red-500 rounded-full"></span>
        <h3 class="font-bold text-white">TOTAL INCOME</h3>
        <p class="text-white text-sm mt-2">Generate reports</p>
    </div>

</div>

<!-- EXPENSE TABLE -->
<div class="bg-white mx-10 my-10 p-6 rounded-xl shadow">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-700">
            My Expenses
        </h2>

        <a href="add.php"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
           + Add Expense
        </a>
    </div>

    <table class="w-full border text-center">
        <tr class="bg-gray-200">
            <th class="p-2 border">Date</th>
            <th class="p-2 border">Title</th>
            <th class="p-2 border">Amount</th>
            <th class="p-2 border">Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr class="hover:bg-gray-100">
            <td class="p-2 border"><?= $row['expense_date'] ?></td>
            <td class="p-2 border"><?= $row['title'] ?></td>
            <td class="p-2 border"><?= $row['amount'] ?></td>
            <td class="p-2 border">
                <a href="edit.php?id=<?= $row['id'] ?>"
   class="text-blue-600 hover:underline mr-3">
   Edit
</a>
                <a href="delete.php?id=<?= $row['id'] ?>"
                   class="text-red-600 hover:underline">
                   Delete
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>

