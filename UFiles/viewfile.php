<?php

session_start();
if(!isset($_SESSION['student'])||$_SESSION['student']!='x'){
	header("location:index.html");
	exit();
}
//else
	//header("location:home.php");

?>


<html>
<head>
<title>Your Files|E-learning System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style1.css" >
 
<body>
<br><br>
<center><h2>Your Files</h2></center>
<br><br>

<?php
$con=mysqli_connect("localhost","root","","e_learning");
$name=$_GET['name'];
echo "<center><h3>".$name."</h3></center>";
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM user_files where studname='$name'");

echo "<table border='1'>
<tr>
<th>File Name</th>
<th>File Size</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['size']/1000 . " KB</td>";
echo "<td><a href=\"deletefile.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" >Delete</a></td>";

echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
<br><br>
<center><a href="viewmark.php?name=<?php echo $name?>">View Your Marks</a></center>
</body>
</html>