<?php
session_start();
include "../page/config.php";

// Include the Composer autoloader
require '../page/vendor/autoload.php';

use Mailgun\Mailgun;
use Http\Adapter\Guzzle7\Client;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    
    // Generate a verification code
    $verification_code = rand(100000, 999999);
    
    // Save the verification code to the database
    $stmt = $db->prepare("UPDATE signup SET verification_code = ? WHERE Email = ?");
    $stmt->bind_param("is", $verification_code, $email);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        // Send the verification code to the user's email using Mailgun
        $mgClient = Mailgun::create('2d5431186f85c699965d3a37a24051bd-0f1db83d-e02abe8f', 'https://api.mailgun.net', new Client());
        $domain = "sandboxa3e70169599e40cb851aa5669e91f31c.mailgun.org"; // Use your Mailgun domain

        $params = [
            'from'    => 'Excited User <mailgun@sandboxa3e70169599e40cb851aa5669e91f31c.mailgun.org>',
            'to'      => $email,
            'subject' => 'Password Reset Verification Code',
            'text'    => "Your verification code is: $verification_code",
        ];

        try {
            $response = $mgClient->messages()->send($domain, $params);
            if ($response->getId()) {
                $_SESSION['message'] = "Verification code sent to your email.";
                header("Location: verify_code.php?email=" . urlencode($email));
                exit();
            } else {
                $_SESSION['error'] = "Failed to send verification code.";
                header("Location: forgetpassword.php");
                exit();
            }
        } catch (Exception $e) {
            error_log("Mailgun Error: " . $e->getMessage());
            $_SESSION['error'] = "Failed to send verification code. Error: {$e->getMessage()}";
            header("Location: forgetpassword.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "No user found with that email address.";
        header("Location: forgetpassword.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: forgetpassword.php");
    exit();
}
?>