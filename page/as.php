

<?php include '..//page/config.php'; 

require '..//page/delete.inc.php';
?>
<?php
// $query = mysqli_query($db, "SELECT * FROM jobs");
// while($row = mysqli_fetch_assoc($query)){
//     echo $row['id:' ]; 
//     echo $row['jobTitle'];
//     echo $row['Location'];
//     echo $row['Job Description:'];
//     echo $row['Salary:'];
//     echo $row['Employment_Type:'];
//     echo $row['Required Experience:'];
//     echo $row['Education Level:'];
//     echo $row['Application Deadline:'];
//     echo $row['Application Link:'];
//     echo $row['Benefits:'];
// } ?>







<?php
session_start();
error_reporting(0);
if ($_SESSION['admin_username'] == '') {
    header('Location: ../page/admin-login.html');
    exit();
    session_unset();
}
?>
<!DOCTYPE html>
<html lang="en">
<link rel="icon" type="image/png" href="../img/bmw1.png">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="../php/jibal-zone.ico" type="image/x-icon">
   


    <!-- Montserrat Font -->
    <link
     rel="icon" type="image/png" href="../img/bmw1.png"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Font Awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin.css">
<!-- java -->

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    
</head>

<body>

    <div class="grid-container">
        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>

            <div class="header-left">
                <span class="material-icons-outlined" style="font-size:30px;">account_circle</span> <label
                    style="text-transform:capitalize;">Hello
                    <?php echo $_SESSION['admin_username']; ?></label>
            </div>

            <div class="header-right">
                <form action="../page/admin-logout.php" method="post">
                    <button class="btn-logout mt-4" type="submit" name="logout">
                        <span class="material-icons-outlined" title="logout">logout</span>
                    </button>
                </form>

            </div>
        </header>
        <!-- End Header -->

        <!-- Sidebar -->
        <aside id="sidebar">
    <div class="sidebar-title">
        <div class="sidebar-brand">
            <span class="material-icons-outlined"><img src="..//img/bmw1.png" width="25px"></span> Admin Dashboard
        </div>
        <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
    </div>

    <ul class="sidebar-list">
        <li class="sidebar-list-item">
            <a href="../page/admin-dashboard.php">
                <span class="material-icons-outlined"><img src="..//img/icons8-job-64.png" width="25px"></span> Career Opportunity Posted
            </a>
        </li>
        <li class="sidebar-list-item">
            <a href="../page/as.php">
                <span class="material-icons-outlined"><img src="..//img/list.png" width="25px"></span> Job List
            </a>
        </li>
    </ul> 
</aside>

        <!-- End Sidebar -->

        <!-- Main -->
        <main class="main-container">
            <div class="main-cards">
          <!-------- awa dehelmawa lo drustkrdni card --------->

                <!-- <div class="card">
            <div class="card-inner">
              <p class="text-primary">PRODUCTS</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold">249</span>
          </div> -->

                <!----------------------------------------------------->
            </div>
            <!-- <form method="post">
                <div class="filters"> <span class="material-icons-outlined"> filter_list</span>
                    <select class="form-select" name="date_filter" id="date_filter">
                        <option value="Date"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date</option>
                        <option value="Today"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Today</option>
                        <option value="Yesterday"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yesterday</option>
                        <option value="Last Week"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Week</option>
                        <option value="This Month"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Month</option>
                        <option value="Last Week"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Week</option>
                        <option value="Last Month"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Month</option>
                    </select>
                </div>
            </form> -->

        <?php 
	// id 
	// 2	jobTitle	
	// 3	Location		
	// 4	Job_Description:
	// 5	Full_job_Description:
	// 6	Employment_Type:	
	// 7	Required_Experience:	
	// 8	Education_Level:	
	// 9	Application Deadline:
?>
<!DOCTYPE html>

   
    <title>Home</title>
</head>
<body>
  <!-- insert data  -->
<?php
if(isset($_POST['submit'])){
  $JobTitle = htmlspecialchars($_POST['jobtitle']);
  $Location1 = htmlspecialchars($_POST['Location1']);
  $Job_Description = htmlspecialchars($_POST['Job_Description']);
  $Full_job_Description = htmlspecialchars($_POST['Full_job_Description']);
  $Employment_Type = htmlspecialchars($_POST['Employment_Type']);
  $Required_Experience = htmlspecialchars($_POST['Required_Experience']);
  $Education_Level = htmlspecialchars($_POST['Education_Level']);
  $Application_Deadline = htmlspecialchars($_POST['Application_Deadline']);

  // Correcting the column names in the SQL query
  $query = mysqli_query($db, "INSERT INTO jobs (jobTitle, Location1, `Job_Description`, `Full_job_Description`, `Employment_Type`, `Required_Experience`, `Education_Level`, `Application_Deadline`) VALUES ('$JobTitle', '$Location1', '$Job_Description', '$Full_job_Description', '$Employment_Type', '$Required_Experience', '$Education_Level', '$Application_Deadline')");

  if($query){
    header("Location: ../page/admin-dashboard.php");
  } else {
    echo "Error: " . mysqli_error($db);
  }
}?>


<div class="row m-1 justify-content-left ">
<?php
session_start();
error_reporting(0);
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']);
   
}
?>


    <!-- update job card  -->
    <?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assume $db is already connected
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
            $_SESSION['message'] = 'Data updated successfully';
        } else {
            $_SESSION['message'] = 'Error updating record: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        $_SESSION['message'] = 'No changes detected';
    }
    header("Location: ..//page/as.php");
    exit();
   
}



$query = mysqli_query($db, "SELECT * FROM jobs ORDER BY id ASC");
while($row = mysqli_fetch_assoc($query)){ ?>
<div class="modal fade" id="UpdateModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel<?php echo $row['id']; ?>">Update Job</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateForm<?php echo $row['id']; ?>" method="POST">
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
              <a href="..//page/as.php" onclick="submitUpdateForm(<?php echo $row['id']; ?>)" class="btn btn-info">Update Job</a>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
function submitUpdateForm(id) {
    const form = document.getElementById('updateForm' + id);
    const formData = new FormData(form);

    fetch('as.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        window.location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

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


<div class="box" style="width: 18rem; border: 1px solid #50a8d4; border-radius: 24px; margin-right: 15px;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['id']; ?> <?php echo $row['jobTitle'];?> </h5>
    <p class="card-text"><?php echo $row['Job_Description']; ?></p>
    <div class="d-flex justify-content-center">
      <button type="button" class="btn btn-info m-2 edit-btn" data-id="<?php echo $row['id']; ?>">Edit</button>
      <a href="../page/as.php?delete=<?php echo $row['id'];?>" class="btn btn-danger m-2">Delete</a>

    </div>
 
    <a href="upload1/<?php echo sanitize($row['resume1']); ?>"  style="margin-left: 6rem; margin-top: 11px;"  class="btn btn-info m-6">View CV</a>
   </div>
</div>
<?php } ?>
</div>


    </main>
    <!-- End Main -->
    </div>
</body>

</html>