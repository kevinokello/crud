<?php
include "db_conn.php"; 
$id = $_GET['id'];
$sql ="DELETE FROM schools WHERE id = $id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: index.php?msg=Record deleted");
}
else{
    echo "Failed" . mysqli_error($conn);
    
}
$query=mysqli_query($conn,"SELECT * FROM schools");
$number=1;
while($row=mysqli_fetch_array($query)){
    $id=$row['id'];
    $sql = "UPDATE schools SET id=$number WHERE id=$id";
    if($conn->query($sql) == TRUE){
        echo "Record RESET succesfully<br>";
    }
    $number++;
}
$sql = "ALTER TABLE schools AUTO_INCREMENT =1";
if($conn->query($sql) == TRUE){
    echo "Record ALTER succesfully";
}else{
    echo"Error ALTER record: " . $conn->error;
} 
?>