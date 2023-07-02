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
<title>Home|Admin|E-learning System</title>
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
   <li><a href="man_user.php">Manage User</a></li>
</ul>
</head>
<body>
<div class="lesson">
<img src="lesson1.gif" height="200" width="200" alt="lesson"><br>
<a href="lesson.php">Lessons</a>
</div>

<div class="exercise">
<img src="exercises.jpg" height="200" width="200" alt="lesson"><br>
<a href="exercise.php">Exercises</a>
</div>

<div class="syllabus">
<img src="report1.png" height="200" width="200" alt="lesson"><br>
<a href="syllabus.php">Syllabus</a>
</div>

<div class="student">
<img src="user.png" height="200" width="200" alt="lesson"><br>
<a href="student.php">Students</a>
</div>

</body>
</html>