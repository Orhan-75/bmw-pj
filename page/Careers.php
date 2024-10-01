
<?php include '..//page/nav.php';?>
<?php include '..//page/config.php'; 

?>

<?php 
if(isset($_GET['search'])){
  $data = sanitize($_GET['search']); 
  $query = mysqli_query($db, "SELECT * FROM jobs WHERE jobTitle LIKE '%$data%'");

  if (mysqli_num_rows($query) > 0) { 
  ?>
    <div class="row m-2 justify-content-center">
  <?php
    while($row = mysqli_fetch_assoc($query)){ 
  ?>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['jobTitle']; ?></h5>
          <p class="card-text"><?php echo $row['Job_Description']; ?></p>
          <div class="d-flex justify-content-center">
            <a href="../page/view.php?postid=<?php echo $row['id'];?>" class="btn btn-info m-2">View</a>
          </div>
        </div>
      </div>
  <?php  
    }
  ?>
    </div>
  <?php 
  } else {
    echo "<p class='p-4 text-center text-danger container m-auto'>No matching results found.</p>";
  }
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="icon" type="image/png" href="../img/bmw1.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="..//css/careers.css?v=<?php echo time();?>">
    <title>Home</title>

</body>
</html>

</head>
<body>

                       
</div>
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
}
?>
<div class="row m-2 justify-content-center">
<?php $query = mysqli_query($db,"SELECT * FROM jobs");
while($row = mysqli_fetch_assoc($query)){ ?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['id']; ?><?php    echo $row['jobTitle'];?> </h5>
    <p class="card-text"><?php echo $row['Job_Description'];  ?></p>
  <div class="d-flex justify-content-center">
   
 <!-- <input type="file" id="uploadBtn"> <label  class="btn btn-info"  for="uploadBtn">Upload CV</label> -->
    <a href="..//page/view.php?postid=<?php echo $row['id'];?>" class="btn btn-info m-6">View</a>
  </div>
 
  </div>
</div>
<?php }?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="..//jqwery/more.js"></script> -->

</body>
</html>




