<?php
// include database connection file
require_once'connection.php';

// Code for record deletion
if(isset($_REQUEST['id']))
{ 
//Get row id
$p_id=intval($_GET['id']);

//Qyery for deletion
$sql = "delete from pawan1 WHERE  p_id=:p_id";
// Prepare query for execution
$query = $conn->prepare($sql);
// bind the parameters
$query-> bindParam(':p_id',$p_id, PDO::PARAM_STR);
// Query Execution
$query -> execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='read.php'</script>";
}
?>