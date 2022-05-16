

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
    <?php
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
    echo '  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    '.$msg.'
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>';
}
    ?>
  
    <a href="create.php" class="btn btn-dark mb-3">Add new</a>

    <table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">School Name</th>
      <th scope="col">Location</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
      include "db_conn.php";
     
     $sql = "SELECT * FROM schools ORDER BY id ASC ";
     $result= mysqli_query($conn, $sql);
     $id=1;
     while($row= mysqli_fetch_assoc($result)){
         //pagination

         $results_per_page = 10;  
         $query = "select *from schools";  
         $result = mysqli_query($conn, $query);  
         $number_of_result = mysqli_num_rows($result); 
         $number_of_page = ceil ($number_of_result / $results_per_page);  
         if (!isset ($_GET['page']) ) {  
          $page = 1;  
      } else {  
          $page = $_GET['page'];  
      }  
      $page_first_result = ($page-1) * $results_per_page;  
      $query = "SELECT *FROM schools LIMIT " . $page_first_result . ',' . $results_per_page;  
      $result = mysqli_query($conn, $query);  
      while ($row = mysqli_fetch_array($result)) {  
        echo $row['id'] . ' ' . $row['schoolname'] . $row['location'] . '</br>';  
    }  
    for($page = 1; $page<= $number_of_page; $page++) {  
      echo '<a href = "index2.php?page=' . $page . '">' . $page . ' </a>';  
  }  
?>
   <tr>
      <td ><?php echo $row['id'] ?></td>
      <td ><?php echo $row['schoolname'] ?></td>
      <td ><?php echo $row['location'] ?></td>
      <td>
          <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
          <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5 "></i></a>
     
        </td>
    </tr>
<?php

     }

      ?>
 
  </tbody>
</table>
</div>





<nav aria-label="..." style ="pull-right">
  <ul class="pagination">
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
    <li class="page-item " >
      <span class="page-link">2</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
</html>