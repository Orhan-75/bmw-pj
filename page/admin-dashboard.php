<?php
session_start();
error_reporting(0);
if ($_SESSION['admin_username'] == '') {
    header('Location: ../page/admin-login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

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

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Include Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"><script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
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
                    <button class="btn-logout" type="submit" name="logout">
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
                    <a href="..//page/as.php">
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

// Initialize variables to hold form data
$JobTitle = $Location1 = $Job_Description = $Full_job_Description = $Employment_Type = $Required_Experience = $Education_Level = $Application_Deadline = '';

// Handle form submission
if (isset($_POST['submit'])) {
    // Sanitize form data (not using database in this example)
    $JobTitle = htmlspecialchars($_POST['jobtitle']);
    $Location1 = htmlspecialchars($_POST['Location1']);
    $Job_Description = htmlspecialchars($_POST['Job_Description']);
    $Full_job_Description = htmlspecialchars($_POST['Full_job_Description']);
    $Employment_Type = htmlspecialchars($_POST['Employment_Type']);
    $Required_Experience = htmlspecialchars($_POST['Required_Experience']);
    $Education_Level = htmlspecialchars($_POST['Education_Level']);
    $Application_Deadline = htmlspecialchars($_POST['Application_Deadline']);

    // You can process the data here (e.g., insert into database)
    // For demo purposes, we're just setting up a dummy array
    $new_job = [
        'jobTitle' => $JobTitle,
        'Location1' => $Location1,
        'Job_Description' => $Job_Description,
        'Full_job_Description' => $Full_job_Description,
        'Employment_Type' => $Employment_Type,
        'Required_Experience' => $Required_Experience,
        'Education_Level' => $Education_Level,
        'Application_Deadline' => $Application_Deadline
    ];

    // Adding new job to dummy data array (replace with database insertion)
    $dummy_data[] = $new_job;
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   
</head>
<body>
    <div class="container">
        <div class="col-7 bg-white p-3 m-auto radius-10 shadow">
            <h1>Add Job  <img src="..//img/bmw1.png" width="35px" >   </h1>

            <div class="alert alert-danger hidden" id="error-msg" role="alert"></div>

            <form name="form" action="Careers.php" method="POST" id="jobForm">
                <div class="mb-3">
                    <label for="jobtitle" class="form-label">Job Title</label>
                    <input type="text" class="form-control" id="jobtitle" name="jobtitle" placeholder="Job Title">
                </div>
                <div class="mb-3">
                    <label for="Location1" class="form-label">Location</label>
                    <input type="text" class="form-control" id="Location1" name="Location1" placeholder="Location">
                </div>
                <div class="mb-3">
                    <label for="Job_Description" class="form-label">Job Description</label>
                    <textarea class="form-control" rows="3" id="Job_Description" name="Job_Description" placeholder="Job Description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="Full_job_Description" class="form-label">Full Job Description</label>
                    <textarea class="form-control" rows="3" id="Full_job_Description" name="Full_job_Description" placeholder="Full Job Description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="Employment_Type" class="form-label">Employment Type</label>
                    <input type="text" class="form-control" id="Employment_Type" name="Employment_Type" placeholder="Employment Type">
                </div>
                <div class="mb-3">
                    <label for="Required_Experience" class="form-label">Required Experience</label>
                    <input type="text" class="form-control" id="Required_Experience" name="Required_Experience" placeholder="Required Experience">
                </div>
                <div class="mb-3">
                    <label for="Education_Level" class="form-label">Education Level</label>
                    <input type="text" class="form-control" id="Education_Level" name="Education_Level" placeholder="Education Level">
                </div>
                <div class="mb-3">
                    <label for="Application_Deadline" class="form-label">Application Deadline</label>
                    <input type="text" class="form-control" id="Application_Deadline" name="Application_Deadline" placeholder="Application Deadline">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-info mb-3">Add Job</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('jobForm');
            var jobtitle = document.getElementById('jobtitle');
            var Location1 = document.getElementById('Location1');
            var Job_Description = document.getElementById('Job_Description');
            var Full_job_Description = document.getElementById('Full_job_Description');
            var Employment_Type = document.getElementById('Employment_Type');
            var Required_Experience = document.getElementById('Required_Experience');
            var Education_Level = document.getElementById('Education_Level');
            var Application_Deadline = document.getElementById('Application_Deadline');
            var errorMessages = document.getElementById('error-msg');
        

            form.addEventListener('submit', function(event) {
                var errors = [];

                if (jobtitle.value.trim() === '') {
                    errors.push('Please enter Job Title.');
                    jobtitle.classList.add('invalid');
                } else {
                    jobtitle.classList.remove('invalid');
                }

                if (Location1.value.trim() === '') {
                    errors.push('Please enter Location.');
                    Location1.classList.add('invalid');
                } else {
                    Location1.classList.remove('invalid');
                }

                if (Job_Description.value.trim() === '') {
                    errors.push('Please enter Job Description.');
                    Job_Description.classList.add('invalid');
                } else {
                    Job_Description.classList.remove('invalid');
                }

                if (Full_job_Description.value.trim() === '') {
                    errors.push('Please enter Full Job Description.');
                    Full_job_Description.classList.add('invalid');
                } else {
                    Full_job_Description.classList.remove('invalid');
                }

                if (Employment_Type.value.trim() === '') {
                    errors.push('Please enter Employment Type.');
                    Employment_Type.classList.add('invalid');
                } else {
                    Employment_Type.classList.remove('invalid');
                }

                if (Required_Experience.value.trim() === '') {
                    errors.push('Please enter Required Experience.');
                    Required_Experience.classList.add('invalid');
                } else {
                    Required_Experience.classList.remove('invalid');
                }

                if (Education_Level.value.trim() === '') {
                    errors.push('Please enter Education Level.');
                    Education_Level.classList.add('invalid');
                } else {
                    Education_Level.classList.remove('invalid');
                }

                if (Application_Deadline.value.trim() === '') {
                    errors.push('Please enter Application Deadline.');
                    Application_Deadline.classList.add('invalid');
                } else {
                    Application_Deadline.classList.remove('invalid');
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
    
    </main>
    <!-- End Main -->
    </div>

</body>

</html>