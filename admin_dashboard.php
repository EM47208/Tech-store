<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.html");
    exit;
}

echo "<h1>Welcome Admin, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
echo "<p>You have admin privileges.</p>";
?>
<a href="logout.php">Logout</a>
