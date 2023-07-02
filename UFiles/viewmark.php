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
<title>Marks|E-learning System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style1.css" >
 
<body>
<br><br>
<center><h2>Your Marks</h2></center>
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

$result = mysqli_query($con,"SELECT * FROM mark where name='$name'");

echo "<center><table border='1'>
<tr>
<th>File Name</th>
<th>Marks</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['filename'] . "</td>";
echo "<td>" . $row['marks']. "</td>";

echo "</tr>";
}
echo "</table></center>";

mysqli_close($con);
?>

</body>
</html>