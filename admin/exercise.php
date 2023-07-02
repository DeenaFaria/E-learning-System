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
<title>Exercises|Admin|E-learning System</title>
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
    <li><a href="viewques.php">View Questions</a></li>
  <li><a href="syllabus.php">Syllabus</a></li>
  <li><a href="student.php">Students</a></li>
    <li><a href="man_user.php">Manage User</a></li>
</ul>
</head>
<body>
<h1>Create questions:</h1>
<div class="ques">
<center>
<form method="post" action="ques.php">
Question:    <input type="text" name="ques" required><br><br>
Option A:   <input type="text" name="a" required><br><br>
Option B:<input type="text" name="b" required><br><br>
Option C:<input type="text" name="c" required><br><br>
Option D:<input type="text" name="d" required><br><br>
Correct Answer:<input type="text" name="ca" required><br><br>
<input type="submit" value="Create">
<input type="reset">
</form>
</center>
</div>
</body>
</html>