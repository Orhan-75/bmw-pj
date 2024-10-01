<?php
session_start();
include '../page/config.php'; // Ensure this file contains your database connection setup

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $jobtitle = mysqli_real_escape_string($db, $_POST['jobtitle']);
    $postid = mysqli_real_escape_string($db, $_POST['postid']);

    if (isset($_FILES['resume'])) {
        $file = $_FILES['resume'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = ['jpg', 'jpeg', 'pdf', 'png'];

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize <= 10000000) { // 10MB limit
                    $fileNewName = rand().rand().rand().".".$fileActualExt;
                    $fileDestination = "upload1/$fileNewName";
                    move_uploaded_file($fileTmpName, $fileDestination);

                    // Insert into database
                    $stmt = $db->prepare("INSERT INTO resume (user_name, jobTitle, resume1) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $username, $jobtitle, $fileDestination);

                    if ($stmt->execute()) {
                        $_SESSION['message'] = "File uploaded successfully!";
                        header("Location: view.php?postid=$postid");
                    } else {
                        $_SESSION['message'] = "Error: Could not save the file information to the database.";
                        header("Location: view.php?postid=$postid");
                    }
                } else {
                    $_SESSION['message'] = "Your file is too big!";
                    header("Location: view.php?postid=$postid");
                }
            } else {
                $_SESSION['message'] = "There was an error uploading your file!";
                header("Location: view.php?postid=$postid");
            }
        } else {
            $_SESSION['message'] = "You cannot upload files of this type!";
            header("Location: view.php?postid=$postid");
        }
    } else {
        $_SESSION['message'] = "No file uploaded!";
        header("Location: view.php?postid=$postid");
    }
} else {
    $_SESSION['message'] = "Invalid request method!";
    header("Location: view.php?postid=$postid");
}
?>
