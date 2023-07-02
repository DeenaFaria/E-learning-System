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
<title>Students|E-learning System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
  <div class="header">
<h1>Welcome to E-learning System</h1>
</div>

</head>
<body>

<h3>Your Profile</h3>



</body>
</html>

<?php
$name=$_GET['name'];
$con=mysqli_connect("localhost","root","","e_learning");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM register where name='$name'");

echo "<table border='1'>
<tr>
<th>Name</th>
<th>ID</th>
<th>Address</th>
<th>Phone</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td><a href=\"editprofile.php?sl=$row[sl]\" >Edit Profile</a></td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>