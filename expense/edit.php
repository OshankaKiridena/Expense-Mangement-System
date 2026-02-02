<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

// get existing expense
$result = mysqli_query(
    $conn,
    "SELECT * FROM expenses WHERE id = $id"
);

$expense = mysqli_fetch_assoc($result);

// update expense
if (isset($_POST['update'])) {

    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $date = $_POST['expense_date'];

    mysqli_query(
        $conn,
        "UPDATE expenses
         SET title='$title',
             amount='$amount',
             expense_date='$date'
         WHERE id = $id"
    );

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Expense</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center
             bg-gradient-to-r from-green-200 via-blue-200 to-blue-400">

<div class="bg-white/40 backdrop-blur-md
            p-8 rounded-xl shadow w-[420px]">

  <h2 class="text-2xl font-bold text-center text-purple-600 mb-6">
    Edit Expense
  </h2>

  <form method="post" class="space-y-4">

    <input
      type="text"
      name="title"
      value="<?= $expense['title']; ?>"
      required
      class="w-full p-2 border rounded">

    <input
      type="number"
      name="amount"
      value="<?= $expense['amount']; ?>"
      required
      class="w-full p-2 border rounded">

    <input
      type="date"
      name="expense_date"
      value="<?= $expense['expense_date']; ?>"
      required
      class="w-full p-2 border rounded">

    <button
      type="submit"
      name="update"
      class="w-full py-2 rounded-full text-white
             bg-gradient-to-r from-purple-400 to-blue-500
             hover:opacity-90">
      Update Expense
    </button>

    <a href="dashboard.php"
       class="block text-center text-sm text-gray-700 hover:underline">
       Cancel
    </a>

  </form>

</div>

</body>
</html>
