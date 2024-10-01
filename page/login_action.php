<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection parameters
    $servername = "127.0.0.1";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "careers";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize the input
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Query to check if the user exists
    $query = "SELECT * FROM signup WHERE user_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Directly compare the password (since no hashing is used)
        if ($password === $user['password1']) {
            // Password is correct
            $_SESSION['username'] = $user['user_name'];
            $_SESSION['success_message'] = "Login successful. Welcome, " . $user['user_name'] . "!";
            
            // Redirect to the home page
            header("Location: ../page/view.php");
            exit();
        } else {
            // Incorrect password
            $_SESSION['error'] = "Incorrect password!";
            header("Location: login.php");
            exit();
        }
    } else {
        // Username does not exist
        $_SESSION['error'] = "Username does not exist!";
        header("Location: login.php");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    // Invalid request method
    header("Location: login.php");
    exit();
}
?>
