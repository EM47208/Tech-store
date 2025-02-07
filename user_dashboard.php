<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.html");
    exit;
}

echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "!";
?>
<a href="logout.php">Logout</a>
