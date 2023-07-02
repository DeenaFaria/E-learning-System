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
$result = mysqli_query($conn, "SELECT * FROM admin WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $phone = $res['phone'];
    $uname = $res['username'];
	// $pass = $res['password'];
}
?>
<html>
<head>
<title>Students|E-learning System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
 
<body>

	    <!-- Body section -->
    <div class = "body_sec"> 
        <section id="Content"> 
           <div class="form">
		   
		      <form name="form1" method="post" action="edit.php">
                <br><br>
                Name:
                <input type="text" name="name" id="name" value="<?php echo $name?>"><br><br>
          
		       
		  
                Phone:
                <input type="text" name="phone" id="phone" value="<?php echo $phone?>"><br><br>
            
                Username:
                <input type="text" name="uname" id="uname" value="<?php echo $uname?>"><br><br>
				Password:
                <input type="password" name="pass" id="pass" pattern=".{6,}" title="6 characters minimum"><br><br>
            
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
    
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $uname=$_POST['uname'];   
 $pass=$_POST['pass']; 	
 $pass=md5($pass);
    
    // checking empty fields
    if(empty($name) || empty($phone) || empty($uname)|| empty($pass)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($phone)) {
            echo "<font color='red'>Phone field is empty.</font><br/>";
        }
        
        if(empty($uname)) {
            echo "<font color='red'>Username field is empty.</font><br/>";
        }        
		        if(empty($pass)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        } 
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE admin SET name='$name',phone='$phone',username='$uname',password='$pass' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: man_user.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM admin WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $phone = $res['phone'];
    $uname = $res['username'];
	 $pass = $res['password'];
}
?>
