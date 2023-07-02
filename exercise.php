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

</head>
<body>

<h2>Quiz Test</h2>
<h3>Answer Question</h3>



</body>
</html>

<?php
$con=mysqli_connect("localhost","root","","e_learning");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM ques");


echo "<table border='1'>
<tr>
<th>ID</th>
<th>Question</th>
<th>Option A</th>
<th>Option B</th>
<th>Option C</th>
<th>Option D</th>


</tr>";
//$row_arr=array();

while($row = mysqli_fetch_array($result)){	
echo "<form method='post' action='action.php'>";
	$id=$row['id'];
	//echo $id;
	//$row_arr[]=$id;
echo "<tr>";
echo "<td>" . $id . "</td>";
echo "<td>" . $row['question'] . "</td>";
echo "<td><input type='radio' name='op' id='a' value='a'>" . $row['option_a'] . "</td>";
echo "<td><input type='radio' name='op' id='b' value='b'>" . $row['option_b'] . "</td>";
echo "<td><input type='radio' name='op' id='c' value='c'>" . $row['option_c'] . "</td>";
echo "<td><input type='radio' name='op' id='d' value='d'>" . $row['option_d'] . "</td>";
//echo "<td><a href=\"action.php?id=$row[id]\">submit</a></td>";
echo "<input type=\"hidden\" name=\"id\" value=$id>";
echo "<td><input type='submit' name='submit' value='submit'></td>";
echo "</form>";

echo "</tr>";
}

echo "</table>";
echo "<br>";
//print_r ($row_arr);
//$arr=serialize($row_arr);
//echo "<a href=\"score.php\">View Score</a>";



mysqli_close($con);
?>