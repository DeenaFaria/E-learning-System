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
$sl = $_GET['sl'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM register WHERE sl=$sl");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
	$id = $res['id'];
	$address = $res['address'];
    $phone = $res['phone'];
	$uname = $res['username'];
    //$pass = $res['password'];
}
?>
<html>
<head>
<title>Edit Profile|E-learning System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
 
<body>

	    <!-- Body section -->
    <div class = "body_sec"> 
        <section id="Content"> 
           <div class="form">
		   
		      <form name="form1" method="post" action="editprofile.php">
                <br><br>
                Name:
                <input type="text" name="name" id="name" value="<?php echo $name;?>"><br><br>
          
		        ID:
                <input type="text" name="id" id="id" value="<?php echo $id;?>"><br><br>
				Adress:
                <input type="text" name="address" id="address" value="<?php echo $address;?>"><br><br>
		  
                Phone:
                <input type="text" name="phone" id="phone" value="<?php echo $phone?>"><br><br>
				 Username:
                <input type="text" name="uname" id="uname" value="<?php echo $uname?>"><br><br>
                 Password:
                <input type="password" name="pass" id="pass" pattern=".{6,}" title="6 characters minimum"><br><br>
            
                <input type="hidden" name="sl" value=<?php echo $sl;?>>
                <input type="submit" name="update" value="Update">
		   
	
        </section> 
    </div> 
      
    <!-- Footer Section -->
   
</body> 
</html>   


<?php

 
if(isset($_POST['update']))
{    
    $sl = $_POST['sl'];
    $name=$_POST['name'];
    $id = $_POST['id'];
	$address=$_POST['address']; 
    $phone=$_POST['phone'];
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
    
    // checking empty fields
    if(empty($name) || empty($id) || empty($address)|| empty($phone)|| empty($uname)|| empty($pass)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($id)) {
            echo "<font color='red'>ID field is empty.</font><br/>";
        }
        
        if(empty($address)) {
            echo "<font color='red'>Adress field is empty.</font><br/>";
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
        $result = mysqli_query($conn, "UPDATE register SET name='$name',id='$id',address='$address',phone='$phone',username='$uname',password='$pass' WHERE sl=$sl");
        
        //redirectig to the display page.
        header("Location: student.php?name=$name");
    }
}
?>
<?php
//getting id from url
$sl = $_GET['sl'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM register WHERE sl=$sl");
 
while($res = mysqli_fetch_array($result))
{
   $name = $res['name'];
	$id = $res['id'];
	$address = $res['address'];
    $phone = $res['phone'];
	$uname = $res['username'];
	$pass = $res['password'];
}
?>
