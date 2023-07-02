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

<h2>Quiz Test</h2>
<h3>Result</h3>



</body>
</html>


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
//echo "<h4>Connected successfully</h4>";
//while(isset($_POST['submit'])){
	$count=0;
if(isset($_POST['submit'])){
//$row_id=unserialize($_POST['id']);
$id=$_POST['id'];
$op=$_POST['op'];
@$_SESSION['count']+=1;
$count=$_SESSION['count'];
}

//print_r($id);
//foreach($row_id as $val){
//echo $id;
//echo $op;
//$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
$op = mysqli_real_escape_string($conn, $_REQUEST['op']);

$sql="select * from ques where id='$id' and correct_answer like '%$op%'";
$res=mysqli_query($conn,$sql);
if($res){
$row=mysqli_fetch_array($res);
	
	echo "<br>";
}
$score=0;
//session_start();
//if(isset($_POST['uname'])&& isset($_POST['pass'])){
	//for($i=0;$i<$count;$i++){
if($row['correct_answer']==$op){
	
	$score=$score+1;
	$_SESSION['score']=$score;
	//$_SESSION["student"]="x";
	//header("Location:exercise.php");
echo "Correct Answer!";
}
else{
	//$score=0;
	//echo "Invalid username or password!";
	//header("Location:exercise.php");
	echo "Wrong Answer!";
}

//}
	
?>