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
<title>View Question|E-learning System</title>
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
  <li><a href="exercise.php">Exercises</a></li>
  <li><a href="syllabus.php">Syllabus</a></li>
  <li><a href="student.php">Students</a></li>
</ul>
</head>
<body>
<div class="loads">
<h3>View Question</h3>

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

$result = mysqli_query($con,"SELECT * FROM ques");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Question</th>
<th>Option A</th>
<th>Option B</th>
<th>Option C</th>
<th>Option D</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['question'] . "</td>";
echo "<td>" . $row['option_a'] . "</td>";
echo "<td>" . $row['option_b'] . "</td>";
echo "<td>" . $row['option_c'] . "</td>";
echo "<td>" . $row['option_d'] . "</td>";
echo "<td><a href=\"editques.php?id=$row[id]\">Edit</a><br><a href=\"deleteques.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" >Delete</a></td>";

echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>