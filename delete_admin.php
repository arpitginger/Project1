<?php
include("connection.php");
$conn = new connection();

$id = $_GET['id'];

$query = "DELETE FROM usertable WHERE id='$id'";
$data = $conn->connect()->query($query);

if($data){
    echo  '<script>alert("Record Deleted")</script>';
    header("Location: admin.php"); 
}
else{
    echo "error";
}

?>