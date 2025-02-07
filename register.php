if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'db_connection.php';

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']); // Get the selected role

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $hashedPassword, $role);

    if ($stmt->execute()) {
        header("Location: login.html");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
