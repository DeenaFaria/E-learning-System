<?php  
  $id = $_GET['id'];
    if($id==''){
  header("Location:downloads.php");
}
$con=mysqli_connect("localhost","root","","e_learning") or die('Could not connect to server');
mysqli_select_db($con,"e_learning") or die('Could not connect to database');
$query="select id,name,size from files where id=$id";
$res=mysqli_query($con,$query) or die(mysqli_error());
$row = mysqli_fetch_array($res);
$id=$row['id'];
$name=$row['name'];
$size=$row['size'];
 // $lesson = New Lesson();
  //$res = $lesson->single_lesson($id);
echo " <h2>View PDF</h2>";

header("Content-type: application/pdf");
header("Content-Disposition: inline;filename=$name");
@readfile("admin/Files/uploads/".$name);
?> 

