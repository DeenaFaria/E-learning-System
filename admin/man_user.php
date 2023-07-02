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
<title>Manage user|Admin|E-learning System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
  <div class="header">
<h1>Welcome to E-learning System</h1>
</div>
<ul>
  <li><a href="logout.php">Logout</a></li>
  <li><a href="home.php">Home</a></li>
  <li><a href="lesson.php">Lessons</a></li>
  <li><a href="exercise.html">Exercises</a></li>
  <li><a href="syllabus.html">Syllabus</a></li>
  <li><a href="student.php">Students</a></li>
    <li><a href="man_user.php">Manage User</a></li>
</ul>
</head>
<body>
<div class="loads">
<h3>Admin information</h3>

</div>

</body>
</html>

<?php
$con=mysqli_connect("localhost","root","","e_learning");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM admin");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a><br><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" >Delete</a></td>";
echo "</tr>";
}
echo "</table>";
echo "<br>";
echo " <a href='register.html'>Create new account</a>";

mysqli_close($con);
?>