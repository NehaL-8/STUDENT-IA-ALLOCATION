<?php include('navv.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>

<h2>Room Details</h2>
<link rel="stylesheet" href=".\css.css">

<table border="2">
  <tr>
    <td>room_no</td>
    <td>room_capacity</td>
    <td>Delete</td>
  </tr>

<?php

include "dbconnect.php"; // Using database connection file here

$records = mysqli_query($db,"select * from room"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['room_number']; ?></td>
    <td><?php echo $data['room_capacity']; ?></td> 
    <td><a href="delete_room.php?room_number=<?php echo $data['room_number']; ?>">Delete</a></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>
