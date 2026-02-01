<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

mysqli_query($conn,
    "DELETE FROM expenses WHERE id=$id AND user_id=$user_id"
);

header("Location: dashboard.php");
