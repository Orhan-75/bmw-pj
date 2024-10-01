<?php
session_start();
include '../page/nav.php';
include '../page/config.php'; // Ensure this file contains your database connection setup

// Check if postid is provided in the URL
if (isset($_GET['postid'])) {
    $postid = mysqli_real_escape_string($db, $_GET['postid']);

    // Fetch job details from the database
    $query = mysqli_query($db, "SELECT * FROM jobs WHERE id = '$postid'");

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
?>
            <div class="row m-2 justify-content-center">
                <div class="card" style="width: 35rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['jobTitle'] ?? ''); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($row['Location1'] ?? ''); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($row['Job_Description'] ?? ''); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($row['Full_job_Description'] ?? ''); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($row['Employment_Type'] ?? ''); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($row['Required_Experience'] ?? ''); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($row['Education_Level'] ?? ''); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($row['Application_Deadline'] ?? ''); ?></p>

                        <div class="container mt-5">
                            <div class="d-grid gap-2">
                                <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="resume" id="uploadBtn" class="d-none">
                                    <label class="btn btn-info btn-lg" id="uploadLabel">Upload CV</label>
                                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>">
                                    <input type="hidden" name="jobtitle" value="<?php echo htmlspecialchars($row['jobTitle'] ?? ''); ?>">
                                    <input type="hidden" name="postid" value="<?php echo htmlspecialchars($postid ?? ''); ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Trigger file input click on label click
                document.getElementById('uploadLabel').addEventListener('click', function() {
                    <?php if (!isset($_SESSION['username'])): ?>
                        window.location.href = '../page/login.php';
                    <?php else: ?>
                        document.getElementById('uploadBtn').click();
                    <?php endif; ?>
                });

                // Submit the form when a file is selected
                document.getElementById('uploadBtn').addEventListener('change', function() {
                    document.getElementById('uploadForm').submit();
                });
            </script>
<?php
        }
    } else {
        echo "<p class='text-center'>No job found with the given ID.</p>";
    }
} else {
    echo "<p class='text-center'>No job ID provided.</p>";
}
?>
