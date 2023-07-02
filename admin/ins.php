<?php
include "config.php";
session_start();
if(!isset($_SESSION['student'])||$_SESSION['student']!='x'){
	header("location:index.html");
	exit();
}
//else
	//header("location:home.php");




$ins=$_POST['course'];
$ins = mysqli_real_escape_string($conn, $_REQUEST['course']);

$sql = "INSERT INTO syllabus (instruction)
VALUES ('$ins')";

if ($conn->query($sql) === TRUE) {
   echo "<h4>New record created successfully</h4>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 header("Location: syllabus.php");

?>
