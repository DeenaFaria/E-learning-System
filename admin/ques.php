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

$ques = mysqli_real_escape_string($conn, $_REQUEST['ques']);
$a = mysqli_real_escape_string($conn, $_REQUEST['a']);
$b = mysqli_real_escape_string($conn, $_REQUEST['b']);
$c = mysqli_real_escape_string($conn, $_REQUEST['c']);
$d = mysqli_real_escape_string($conn, $_REQUEST['d']);
$ca = mysqli_real_escape_string($conn, $_REQUEST['ca']);


$sql = "INSERT INTO ques (question,option_a,option_b,option_c,option_d,correct_answer)
VALUES ('$ques','$a','$b','$c','$d','$ca')";

if ($conn->query($sql) === TRUE) {
  //  echo "<h4>New record created successfully</h4>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 header("Location: exercise.php");
 echo "<h4>New question created successfully</h4>";
?>