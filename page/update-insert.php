
<div class="row m-1 justify-content-left ">
    
    <!-- update job card  -->
    <?php
if (isset($_POST['update'])) {
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
            $_SESSION['success'] = 'Data updated successfully';
            header("Location: ../page/as.php");
            exit(); // Ensure script stops after redirection
        } else {
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $_SESSION['success'] = 'No changes detected';
        header("Location: ../page/as.php");
        exit(); // Ensure script stops after redirection
    }
}

$query = mysqli_query($db, "SELECT * FROM jobs ORDER BY id ASC");
while($row = mysqli_fetch_assoc($query)){ ?>
<div class="modal fade" id="UpdateModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel<?php echo $row['id']; ?>">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="..//page/as.php"  id="updateForm<?php echo $row['id']; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="jobtitle" class="form-control form-control-lg m-2" value="<?php echo htmlspecialchars($row['jobTitle']); ?>">
            <input type="text" name="Location1" class="form-control form-control-lg m-2" value="<?php echo htmlspecialchars($row['Location1']); ?>">
            <input type="text" name="Job_Description" class="form-control form-control-lg m-2" value="<?php echo htmlspecialchars($row['Job_Description']); ?>">
            <input type="text" name="Full_job_Description" class="form-control form-control-lg m-2" value="<?php echo htmlspecialchars($row['Full_job_Description']); ?>">
            <input type="text" name="Employment_Type" class="form-control form-control-lg m-2" value="<?php echo htmlspecialchars($row['Employment_Type']); ?>">
            <input type="text" name="Required_Experience" class="form-control form-control-lg m-2" value="<?php echo htmlspecialchars($row['Required_Experience']); ?>">
            <input type="text" name="Education_Level" class="form-control form-control-lg m-2" value="<?php echo htmlspecialchars($row['Education_Level']); ?>">
            <input type="text" name="Application_Deadline" class="form-control form-control-lg m-2" value="<?php echo htmlspecialchars($row['Application_Deadline']); ?>">
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="update" class="btn btn-primary">Update Job</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
    // Handle "Edit" button click to open the modal
    $(document).on('click', '.edit-btn', function () {
        var jobId = $(this).attr('data-id');
        $('#UpdateModal' + jobId).modal('show'); // Show the correct modal
    });

    // Close the modal when the "Close" button or the "X" button is clicked
    $(".btn-close, .btn-danger").click(function () {
        var jobId = $(this).closest('.modal').attr('id').replace('UpdateModal', '');
        $("#UpdateModal" + jobId).modal("hide");
    });
});
</script>
<?php } ?>
</div>

