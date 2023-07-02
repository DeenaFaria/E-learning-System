<?php 
$name=$_GET['name'];
include 'filesLogic.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style.css">
    <title>Lessons</title>
	
	 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
  	
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form action="index.php?name=<?php echo $name;?>" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">upload</button>
        </form>
      </div>
	  <br><br>
	  <center><a href="viewfile.php?name=<?php echo $name?>">Your Files</a></center>
    </div>
  </body>
</html>