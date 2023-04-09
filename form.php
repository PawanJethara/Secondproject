<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CURD Operation using PDO Extension  </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Insert Record | PHP CRUD Operations using PDO Extension</h3>
<hr />
</div>
</div>
<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Name</b>
<input type="text" name="fullname" class="form-control" required>
</div>
<div class="col-md-4"><b>Address</b>
<input type="text" name="address" class="form-control" required>
</div>
<p>Pawan Kumar Jeethara</p>
</div>
<div class="row">
<div class="col-md-4"><b>College</b>
<input type="text" name="college" class="form-control" required>
</div>
<div class="col-md-4"><b>Class</b>
<input type="text" name="class" class="form-control" maxlength="50" required>
</div>
</div>
<div class="row">
<div class="col-md-8"><b>Rollno</b>
<input type="text" name="roll" class="form-control" maxlength="10" required>
</div>
</div>
<div class="col-md-8">
<input type="submit" name="insert" value="Submit">
</div>
</form>
</div>
</div>
</body>
</html>

<?php
// include database connection file
 require_once'connection.php';

if(isset($_POST['insert']))
{
// Posted Values
$Fullname=$_POST['fullname'];
$Address=$_POST['address'];
$College=$_POST['college'];
$Class=$_POST['class'];
$Rollno=$_POST['roll'];
// Query for Insertion
$sql="INSERT INTO pawan1(Name,Address,College,Class,rollno) VALUES(:fn,:adrss,:coll,:cls,:rol)";

//Prepare Query for Execution
$query = $conn->prepare($sql);
// Bind the parameters
$query->bindParam(":fn",$Fullname,PDO::PARAM_STR); 
$query->bindParam(":adrss",$Address,PDO::PARAM_STR);
$query->bindParam(":coll",$College,PDO::PARAM_STR);
$query->bindParam(":cls",$Class,PDO::PARAM_STR);
$query->bindParam(":rol",$Rollno,PDO::PARAM_STR);
// Query Execution
$query->execute(); 
// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $conn->lastInsertId();
if($lastInsertId)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href=''</script>";
header("location:read.php");
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href=''</script>";
}
}
?>