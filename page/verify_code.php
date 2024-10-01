<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../img/bmw1.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
    <link rel="stylesheet" href="../css/forgetpassword.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <h1>Verify Code</h1>
        <?php
        session_start();
            // Display any session messages
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['message'] ?? '') . '</div>';
    unset($_SESSION['message']);
}
?>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="success-message bg-success p-2 text-white">' . htmlspecialchars($_SESSION['message']) . '</div>';
            unset($_SESSION['message']);
        }
        if (isset($_SESSION['error'])) {
            echo '<div class="error-message bg-danger p-2 text-white">' . htmlspecialchars($_SESSION['error']) . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        <form action="reset_password.php" method="POST">
            <div class="input-box">
                <input type="text" name="verification_code" placeholder="Verification Code">
            </div>
            <div class="input-box">
                <input type="password" name="new_password" placeholder="New Password">
                <img src="../img/bxs-lock-alt.svg" alt="Lock Icon">
            </div>
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">
            <button type="submit" class="btn">Verify and Reset Password</button>
        </form>
    </div>
</body>

</html>
