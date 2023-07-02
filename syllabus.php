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

<h2>Follow the instruction:</h2>
</head>
<body>

<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"e_learning");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql="select * from syllabus";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
echo "<h3>".$row['instruction']."</h3>";
}

?>
</body>
</html>