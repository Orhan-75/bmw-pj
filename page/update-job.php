<?php
session_start();
include './/config.php'; // Make sure to include your database connection

if (isset($_POST['id'])) {
    // Ensure a valid ID is provided
    $id = intval($_POST['id']);
    
    // Sanitize input data
    $JobTitle = mysqli_real_escape_string($db, $_POST['jobtitle']);
    $Location1 = mysqli_real_escape_string($db, $_POST['Location1']);
    $Job_Description = mysqli_real_escape_string($db, $_POST['Job_Description']);
    $Full_job_Description = mysqli_real_escape_string($db, $_POST['Full_job_Description']);
    $Employment_Type = mysqli_real_escape_string($db, $_POST['Employment_Type']);
    $Required_Experience = mysqli_real_escape_string($db, $_POST['Required_Experience']);
    $Education_Level = mysqli_real_escape_string($db, $_POST['Education_Level']);
    $Application_Deadline = mysqli_real_escape_string($db, $_POST['Application_Deadline']);

    // Fetch existing data
    $stmt = $db->prepare("SELECT * FROM jobs WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    // Prepare the update query with only changed fields
    $fields = [];
    $params = [];
    $types = "";

    if ($row['jobtitle'] != $JobTitle) {
        $fields[] = "jobtitle=?";
        $params[] = $JobTitle;
        $types .= "s";
    }
    if ($row['Location1'] != $Location1) {
        $fields[] = "Location1=?";
        $params[] = $Location1;
        $types .= "s";
    }
    if ($row['Job_Description'] != $Job_Description) {
        $fields[] = "Job_Description=?";
        $params[] = $Job_Description;
        $types .= "s";
    }
    if ($row['Full_job_Description'] != $Full_job_Description) {
        $fields[] = "Full_job_Description=?";
        $params[] = $Full_job_Description;
        $types .= "s";
    }
    if ($row['Employment_Type'] != $Employment_Type) {
        $fields[] = "Employment_Type=?";
        $params[] = $Employment_Type;
        $types .= "s";
    }
    if ($row['Required_Experience'] != $Required_Experience) {
        $fields[] = "Required_Experience=?";
        $params[] = $Required_Experience;
        $types .= "s";
    }
    if ($row['Education_Level'] != $Education_Level) {
        $fields[] = "Education_Level=?";
        $params[] = $Education_Level;
        $types .= "s";
    }
    if ($row['Application_Deadline'] != $Application_Deadline) {
        $fields[] = "Application_Deadline=?";
        $params[] = $Application_Deadline;
        $types .= "s";
    }

    if (!empty($fields)) {
        $params[] = $id;
        $types .= "i";
        $update_query = "UPDATE jobs SET " . implode(', ', $fields) . " WHERE id=?";
        $stmt = $db->prepare($update_query);
        $stmt->bind_param($types, ...$params);
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'No changes detected']);
    }
}
?>
