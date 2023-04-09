<?php
// Get the userid
require_once'connection.php';
$p_id=intval($_GET['id']);
$sql = "SELECT * from pawan1 where p_id=$p_id";
//Prepare the query:
$query = $conn->prepare($sql);
//Bind the parameters
$query->bindParam(':p_id',$userid,PDO::PARAM_STR);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
if($query->rowCount() > 0)
{
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{
?>
<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Name</b>
<input type="text" name="fullname" value="<?php echo htmlentities($result->Name);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Address</b>
<input type="text" name="address" value="<?php echo htmlentities($result->Address);?>" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-4"><b>College</b>
<input type="college" name="college" value="<?php echo htmlentities($result->College);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Class</b>
<input type="text" name="class" value="<?php echo htmlentities($result->Class);?>" class="form-control" maxlength="20" required>
</div>
</div>
<div class="row">
<div class="col-md-8"><b>Rollno</b>
<textarea class="form-control" name="roll" required><?php echo htmlentities($result->rollno);?></textarea>
</div>
</div>
<?php }} ?>
<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="update" value="Update">
</div>
</div>
</form>

<?php
// include database connection file
require_once'connection.php';
if(isset($_POST['update']))
{
// Get the userid
$p_id=intval($_GET['id']);
// Posted Values
$Fullname=$_POST['fullname'];
$Address=$_POST['address'];
$College=$_POST['college'];
$Class=$_POST['class'];
$Rollno=$_POST['roll'];

// Query for Updation
$sql="update pawan1 set Name=:fn,Address=:adrss,College=:clg,Class=:cls,rollno=:roll where p_id=:p_id";
//Prepare Query for Execution
$query = $conn->prepare($sql);
// Bind the parameters
$query->bindParam(':fn',$Fullname,PDO::PARAM_STR);
$query->bindParam(':adrss',$Address,PDO::PARAM_STR);
$query->bindParam(':clg',$College,PDO::PARAM_STR);
$query->bindParam(':cls',$Class,PDO::PARAM_STR);
$query->bindParam(':roll',$Rollno,PDO::PARAM_STR);
$query->bindParam(':p_id',$p_id,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='read.php'</script>";
}
?>