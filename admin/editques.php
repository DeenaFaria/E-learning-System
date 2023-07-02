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
$result = mysqli_query($conn, "SELECT * FROM ques WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $ques = $res['question'];
    $a = $res['option_a'];
    $b = $res['option_b'];
	 $c = $res['option_c'];
	  $d = $res['option_d'];
	  $ca=$res['correct_answer'];
}
//echo $ques;
?>
<html>
<head>
<title>Question|E-learning System</title>
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
		   
		      <form name="form1" method="post" action="editques.php">
                <br><br>
                Question:
                <input type="text" name="ques" id="ques" value="<?php echo $ques;?>"><br><br>
                Option A:
                <input type="text" name="a" id="a" value="<?php echo $a;?>"><br><br>
            
                Option B:
                <input type="text" name="b" id="b" value="<?php echo $b;?>"><br><br>
                Option C:
                <input type="text" name="c" id="c" value="<?php echo $c;?>"><br><br>
				                Option D:
                <input type="text" name="d" id="d" value="<?php echo $d;?>"><br><br>
					                Correct Answer:
                <input type="text" name="ca" id="ca" value="<?php echo $ca;?>"><br><br>
            
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
    
    $ques=$_POST['ques'];
    $a=$_POST['a'];
   $b=$_POST['b'];   
  $c=$_POST['c'];
   $d=$_POST['d'];
    $ca=$_POST['ca'];
    
    // checking empty fields
    if(empty($ques) || empty($a) || empty($b)|| empty($c)|| empty($d)|| empty($ca)) {            
        if(empty($ques)) {
            echo "<font color='red'>Question field is empty.</font><br/>";
        }
        
        if(empty($a)&& empty($b)&& empty($c)&& empty($d)) {
            echo "<font color='red'>Option field is empty.</font><br/>";
        }
          if(empty($ca)) {
            echo "<font color='red'>Correct Answer field is empty.</font><br/>";
        }
        

    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE ques SET question='$ques',option_a='$a',option_b='$b',option_c='$c',option_d='$d',correct_answer='$ca' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: viewques.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM ques WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $ques = $res['question'];
    $a = $res['option_a'];
    $b = $res['option_b'];
	 $c = $res['option_c'];
	  $d = $res['option_d'];
	   $ca=$res['correct_answer'];
}
?>
