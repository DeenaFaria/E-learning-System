<?php

session_start();
if(!isset($_SESSION['student'])||$_SESSION['student']!='x'){
	header("location:index.html");
	exit();
}
//else
	//header("location:home.php");
$name=$_GET['name'];

?>


<html>
<head>
<title>Home|E-learning System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
  <div class="header">
<h1>Welcome to E-learning System</h1>
</div>
<ul>
  <li><a href="logout.php">Logout</a></li>
  <li><a href="home.php?name=<?php echo $name;?>">Home</a></li>
  <li><a href="lesson.php?name=<?php echo $name;?>">Lessons</a></li>
  <li><a href="exercise.php">Exercises</a></li>
  <li><a href="syllabus.php">Syllabus</a></li>
  <li><a href="student.php?name=<?php echo $name;?>">Your Profile</a></li>
</ul>
</head>
<body>
<div class="loads">
<h3>Upload your assignments/reports here...</h3>
<a href="UFiles/index.php?name=<?php echo $name;?>">Upload Files</a>
</div>
<div class="loads">
<h3>Download documents...</h3>
<a href="downloads.php">Download Files</a>
</div>
<br>
<div class="loads1">
<h3>View PDF...</h3>
<a href="view.php?q=viewpdf&id='.$result->LessonID.'" class="btn btn-xs btn-info"><i class="fa fa-info"></i> View PDF</a>
  </div>
  <br>
  <div class="loads1">
<h3>View Images...</h3>
<a href="viewimage.php">View Images</a>
</div>
</body>
</html>
