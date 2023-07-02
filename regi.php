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

$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
$address = mysqli_real_escape_string($conn, $_REQUEST['address']);
$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
$uname = mysqli_real_escape_string($conn, $_REQUEST['uname']);
$pass = mysqli_real_escape_string($conn, $_REQUEST['pass']);
$pass=md5($pass);

$sql = "INSERT INTO register (name, id,address,phone,username,password)
VALUES ('$name', '$id','$address','$phone','$uname','$pass')";

if ($conn->query($sql) === TRUE) {
  //  echo "<h4>New record created successfully</h4>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 header("Location: index.html");
?>