<?php include('navv.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
  
  <link rel="stylesheet" href=".\css.css">
</head>
<body>

<h2>Student Details</h2>

<table border="2">
  <tr>
    <td>Usn</td>
    <td>Name</td>
    <td>Section</td>
    <td>Year</td>
    <td>Delete</td>
  </tr>

<?php

include "dbconnect.php"; // Using database connection file here

$records = mysqli_query($db,"select * from student"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['usn']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['section']; ?></td>
     <td><?php echo $data['year']; ?></td> 
      <td><a href="delete.php?usn=<?php echo $data['usn']; ?>">Delete</a></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>
