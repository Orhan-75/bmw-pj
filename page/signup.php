<?php include '..//page/config.php'; 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="..//img/bmw1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link rel="stylesheet" href="../css/signup.css?v=<?php echo time();?>">
   <script src="bootstrap.bundle.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
</head>
<body>
<?php
session_start(); // Start the session to use session variables

// Initialize variables to hold form data
$username = $email = $password = '';

// Handle form submission
if (isset($_POST['submit'])) {
    // Sanitize and validate form data
    $username = sanitize($_POST['username']);
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password1']); // Store the password as plain text

    // Check if the email already exists in the database
    $check_email_sql = "SELECT * FROM signup WHERE Email = ?";
    if ($check_stmt = $db->prepare($check_email_sql)) {
        $check_stmt->bind_param('s', $email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            // Email already exists
            $_SESSION['message'] = "Error: Email already in use.";
            $_SESSION['message_type1'] = "error";
        } else {
            // Prepare SQL statement to insert data into signup table
            $sql = "INSERT INTO signup (user_name, Email, password1) VALUES (?, ?, ?)";

            // Prepare and execute the statement
            if ($stmt = $db->prepare($sql)) {
                $stmt->bind_param('sss', $username, $email, $password);

                if ($stmt->execute()) {
                    $_SESSION['message'] = "Account created successfully.";
                    $_SESSION['message_type1'] = "success";
                } else {
                    $_SESSION['message'] = "Error: " . $stmt->error;
                    $_SESSION['message_type1'] = "error";
                }

                // Close statement
                $stmt->close();
            } else {
                $_SESSION['message'] = "Error: " . $db->error;
                $_SESSION['message_type1'] = "error";
            }
        }

        // Close the email check statement
        $check_stmt->close();
    } else {
        $_SESSION['message'] = "Error: " . $db->error;
        $_SESSION['message_type1'] = "error";
    }

    // Close database connection
    $db->close();

    // Redirect to the same page to show the message
    header("Location: signup.php");
    exit();
}
?>

<div class="div-groupe">
<h1>Sign Up</h1>
<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $message_type = $_SESSION['message_type1'];

    // Determine the appropriate Bootstrap class based on the message type
    $alert_class = $message_type == 'success' ? 'alert-success' : 'bg-warning';

    echo "<div class='alert $alert_class' role='alert'>$message</div>";

    // Clear the message after displaying it
    unset($_SESSION['message']);
    unset($_SESSION['message_type1']);
}
?>

<div class="alert alert-danger hidden" id="error-msg" role="alert"></div>

    <form name="form" action="../page/signup.php" method="POST" id="jobForm">
        <div class="input-box">
            <input class="f1" type="text" name="username" id="username" placeholder="User name">
        </div>
        <div class="input-box">
            <input class="f1" type="text" name="email" id="email" placeholder="Email">
        </div>
        <div class="input-box">
            <input class="f1" type="password" name="password1" id="password1" placeholder="Password">
        </div>
        <br>
        <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-info btn-lg btn-block" value="Create Account">Register</button>
        </div><br>
        <div class="register-link">
                <p>already have acccount !<a href="../page/login.php">login</a></p>
            </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('jobForm');
        var username = document.getElementById('username');
        var email = document.getElementById('email');
        var password = document.getElementById('password1');
        var errorMessages = document.getElementById('error-msg');

        form.addEventListener('submit', function(event) {
            var errors = [];

            if (username.value.trim() === '') {
                errors.push('Please enter your User name.');
                username.classList.add('invalid');
            } else {
                username.classList.remove('invalid');
            }

            if (email.value.trim() === '') {
                errors.push('Please enter your Email.');
                email.classList.add('invalid');
            } else {
                email.classList.remove('invalid');
            }

            if (password1.value.trim() === '') {
                errors.push('Please enter your Password.');
                password1.classList.add('invalid');
            } else {
                password.classList.remove('invalid');
            }

            if (errors.length > 0) {
                event.preventDefault(); // Prevent form submission
                errorMessages.innerHTML = errors.join('<br>');
                errorMessages.classList.remove('hidden');
                errorMessages.classList.add('visible');
            } else {
                errorMessages.classList.remove('visible');
                errorMessages.classList.add('hidden');
            }
        });
    });
</script>

<style>
    .invalid {
        border-color: red;
    }
    .hidden {
        display: none;
    }
    .visible {
        display: block;
    }
</style>

</body>
</html>