<?php
    //PLEASE CHANGE TABLE NAME AND ID NAME; PLEASE REFER YOUR DATABASE
    if(isset($_POST["delete"])){
	include('conn.php');
    $id=$_POST['num'];
    //Delete the line
    $sql = "DELETE FROM user WHERE userid=$id";
    if($conn->query($sql) == TRUE){
        echo "Record delete succesfully<br>";
    }else{
        echo"Error delete record: " . $conn->error;
    }
    
    //Reset and Update line by line start from 1 and increament by 1 at id
    $query=mysqli_query($conn,"select * from user");
    $number=1;
    while($row=mysqli_fetch_array($query)){
        $id=$row['userid'];//PLEASE CHANGE ACCORDING TO YOUR DATABASE AUTO-INCREAMENT ID
        $sql = "UPDATE user SET userid=$number WHERE userid=$id";
        if($conn->query($sql) == TRUE){
            echo "Record RESET succesfully<br>";
        }
        $number++;
    }
    //Alter the increment to the latest number(bigger number)
     $sql = "ALTER TABLE user AUTO_INCREMENT =1"; //CHANGE TABLE NAME
    if($conn->query($sql) == TRUE){
        echo "Record ALTER succesfully";
    }else{
        echo"Error ALTER record: " . $conn->error;
    } 
    }
?>