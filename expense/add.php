<?php
session_start();
include("db.php");

/* Protect page */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $expense_date = $_POST['expense_date'];
    $user_id = $_SESSION['user_id'];

    if ($title != "" && $amount != "" && $expense_date != "") {

        mysqli_query(
            $conn,
            "INSERT INTO expenses (id, user_id, title, amount, expense_date)
             VALUES (NULL, $user_id, '$title', $amount, '$expense_date')"
        );

        header("Location: dashboard.php");
        exit();

    } else {
        $error = "All fields are required";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Expense</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-100 to-green-100 min-h-screen flex items-center justify-center">

<form method="post" class="bg-white p-8 rounded shadow w-96">

  <h2 class="text-2xl font-bold text-green-600 text-center mb-6">
    Add Expense
  </h2>

  <?php if (isset($error)) { ?>
    <p class="text-red-500 text-center mb-4"><?= $error ?></p>
  <?php } ?>

  <input
    name="title"
    class="border w-full p-2 mb-4 rounded"
    placeholder="Expense title">

  <input
    name="amount"
    type="number"
    step="0.01"
    class="border w-full p-2 mb-4 rounded"
    placeholder="Amount">

  <label class="block text-gray-700 mb-1">Expense Date</label>
  <input
    type="date"
    name="expense_date"
    class="border w-full p-2 mb-6 rounded">

  <button
    name="add"
    class="bg-green-600 text-white w-full py-2 rounded hover:bg-green-700">
    Save Expense
  </button>

</form>

</body>
</html>
