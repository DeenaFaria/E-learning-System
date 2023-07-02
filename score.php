<?php

session_start();
if(!isset($_SESSION['student'])||$_SESSION['student']!='x'){
	header("location:index.html");
	exit();
}

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
<ul>
  <li><a href="logout.php">Logout</a></li>
  <li><a href="home.php">Home</a></li>
  <li><a href="lesson.php">Lessons</a></li>
  <li><a href="exercise.php">Exercises</a></li>
  <li><a href="syllabus.php">Syllabus</a></li>
  <li><a href="student.php">Students</a></li>
</ul>
<h2>Your Score:</h2>
</head>
<body>
<?php
if(!isset($_SESSION['score'])){
	echo "0";
}
//session_start();
@$score=$_SESSION['score'];
echo "<h4>".$score."</h4>";
//session_unset("score");
unset($_SESSION["score"]);
unset($_SESSION['count']);
//session_destroy();
?>
</body>
</html>