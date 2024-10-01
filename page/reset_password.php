<?php
session_start();
include "../page/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $verification_code = mysqli_real_escape_string($db, $_POST['verification_code']);
    $new_password = mysqli_real_escape_string($db, $_POST['new_password']);

    // Verify the code
    $stmt = $db->prepare("SELECT * FROM signup WHERE Email = ? AND verification_code = ?");
    $stmt->bind_param("si", $email, $verification_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the password
        $stmt = $db->prepare("UPDATE signup SET password1 = ?, verification_code = NULL WHERE Email = ?");
        $stmt->bind_param("ss", $new_password, $email);
        $stmt->execute();

        $_SESSION['success_message'] = "Password reset successfully.";
        header("Location: login.php");
    } else {
        $_SESSION['error'] = "Invalid verification code.";
        header("Location: verify_code.php?email=$email");
    }
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: forgetpassword.php");
}
?>