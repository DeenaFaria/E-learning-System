<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"e_learning");
echo "<br>";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM syllabus WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $ins = $res['instruction'];
    
}

?>
<html>
<head>
<title>Syllabus|E-learning System</title>
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

	    <!-- Body section -->
    <div class = "body_sec"> 
        <section id="Content"> 
           <div class="form">
		   
		      <form name="form1" method="post" action="editsyllabus.php">
                <br><br>
                Instruction
                <input type="text" name="ins" id="ins" value="<?php echo $ins;?>"><br><br>
            
                <input type="hidden" name="id" value=<?php echo $id;?>>
                <input type="submit" name="update" value="Update">
		   
	
        </section> 
    </div> 
      
    <!-- Footer Section -->
   
</body> 
</html>   


<?php


if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $ins=$_POST['ins'];
    
    // checking empty fields
    if(empty($ins)) {            
        
            echo "<font color='red'>Instruction field is empty.</font><br/>";
        }
        
         else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE syllabus SET instruction='$ins' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: viewsyllabus.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM syllabus WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $ins = $res['instruction'];
    
}
?>
