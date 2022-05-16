<?php
include "db_conn.php";
$id = $_GET['id'];
if(isset($_POST['submit'])){
    $schoolname = $_POST['schoolname'];
    $location = $_POST['location'];

     $sql ="UPDATE `schools` SET `schoolname`='$schoolname',`location`='$location' WHERE id=$id";
     $result = mysqli_query($conn, $sql);
     if($result){
         header("Location: index.php?msg=Data updated");
     }
     else{
         echo "Failed:" . mysqli_error($conn);
     }
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>crud app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>

<div class="container">
    <div class="text-center mb-4">
        <h3>Edit school Information</h3>
        <p class="text-muted">
            clich update after changing information
        </p>
    </div>
    <?php

$sql = "SELECT * FROM schools WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
    ?>
    <div class="container d-flex justify-content-center" >
        <form action="" method="post" style="width:50vw; min-width:300px;">
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" >School name</label>
            <input type="text" class="form-control" name="schoolname" value="<?php echo $row['schoolname'] ?>">
        </div>
        <div class="mb-3 ">
            <label class="form-label" >location</label>
            <input type="text" class="form-control" name="location" value="<?php echo $row['location'] ?>">
           
        </div>
        <div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
        <a href="index.php" class="btn btn-danger">Cancel</a>
    </div>
    
    </div>

    </form>
    </div>
</div>







  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
</html>