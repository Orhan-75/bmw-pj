<?php 
if(isset($_GET['delete'])){
  $id = htmlspecialchars($_GET['delete']);
  $query = mysqli_query($db,"DELETE FROM jobs WHERE id = '$id' ");
  if($query){
    header("Location:..//page/as.php");
  }
}

?>
