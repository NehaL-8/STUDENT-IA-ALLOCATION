<?php include('navv.php') ?>
<!DOCTYPE html>
<html>
	<head>
<title>insert rooms</title></head>
<link rel="stylesheet" href=".\insert.css">
  <body>
	<form method="post" action="insert2_room.php">
		room_number:<br>
		<input type="text" name="room_number">
		<br>
          room_capacity:<br>
		<input type="text" name="room_capacity">
		<br>
		<input type="submit" name="save" value="submit">
	</form>
  </body>
