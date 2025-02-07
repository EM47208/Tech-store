if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'db_connection.php';
    session_start();

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']); // Get the selected role

    // Query the database
    $sql = "SELECT id, password, role FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashedPassword, $dbRole);
        $stmt->fetch();

        // Verify password and role
        if (password_verify($password, $hashedPassword) && $role === $dbRole) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $dbRole;

            if ($dbRole === 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: index.php"); // Redirect to home page
            }
            exit;
        } else {
            echo "Invalid credentials or role mismatch.";
        }
    } else {
        echo "User not found.";
    }
}
