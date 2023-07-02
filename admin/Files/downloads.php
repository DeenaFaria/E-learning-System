<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style1.css">
  <title>Download files</title>
  <br><br>
  <center><h1>Download files from students</h1><center>
</head>
<body>

<table>
<thead>
    <th>ID</th>
	<th>Student Name</th>
    <th>Filename</th>
    <th>size (in mb)</th>
    <th>Downloads</th>
    <th>Action</th>
	<th>Assign Mark</th>
</thead>
<tbody>
  <?php foreach ($files as $file): ?>
    <tr>
      <td><?php echo $file['id']; ?></td>
	  <td><?php echo $file['studname']; ?></td>
      <td><?php echo $file['name']; ?></td>
      <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><?php echo $file['downloads']; ?></td>
      <td><a href="downloads.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
	 <td><a href="mark.php?file_id=<?php echo $file['id']?>&name=<?php echo $file['studname']?>&filename=<?php echo $file['name']?>">Give Mark</a></td>
    </tr>
  <?php endforeach;?>

</tbody>
</table>



</body>
</html>