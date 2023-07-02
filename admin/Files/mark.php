<?php

session_start();
if(!isset($_SESSION['student'])||$_SESSION['student']!='x'){
	header("location:index.html");
	exit();
}
//else
	//header("location:home.php");
@$id=$_GET['file_id'];
@$name=$_GET['name'];
@$filename=$_GET['filename'];

?>



<html>
<head>
<title>Mark|Admin|E-learning System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
 
<body>

<center><h2>Assign Mark</h2></center>
<form method="post" action="mark.php?id=<?php echo $id?>&name=<?php echo $name?>&filename=<?php echo $filename?>">
Give Mark:
<input type="number" name="mark" min="0" max="10" id="mark">
<br>
<input type="submit" name="submit" value="Assign">

</form>

<!--<a href="viewsyllabus.php">View Syllabus</a>-->
</body>
</html>


<?php
if(isset($_POST['submit'])){

$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"e_learning");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "<h4>Connected successfully</h4>";
$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
$filename = mysqli_real_escape_string($conn, $_REQUEST['filename']);
$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$mark = mysqli_real_escape_string($conn, $_REQUEST['mark']);


$sql = "INSERT INTO mark (id,filename,name,marks)
VALUES ('$id','$filename','$name','$mark')";


if ($conn->query($sql) === TRUE) {
    echo "<h4>Marks assigned successfully</h4>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
 //header("Location: index.html");
?>
