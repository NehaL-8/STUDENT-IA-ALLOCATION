<!DOCTYPE html>
<html>
	<head>
            <link rel="stylesheet" href=".\gradient.css">
          </head>
</html>
<?php
include_once 'dbconnect.php';
if(isset($_POST['save']))
{	 
	 $room_number = $_POST['room_number'];
	 $room_capacity = $_POST['room_capacity'];
	 $popupDisplayed = false;

	 $roomCheckQuery = "SELECT COUNT(*) AS roomCount FROM room WHERE room_number = '$room_number'";
	 $roomCheckResult = $db->query($roomCheckQuery);
	 $roomCount = $roomCheckResult->fetch_assoc()['roomCount'];

	 if($roomCount==0){
		
		$query = "INSERT INTO room (room_number,room_capacity) VALUES ('$room_number','$room_capacity')";
		$db->query($query);
	 } else {
		 if (!$popupDisplayed) {
			 echo "<script>alert('room  already exists');</script>";
			 $popupDisplayed = true;
		 }
		}
	 if(!$popupDisplayed){
		echo  "New room added successfully !";
	 }
		 	 mysqli_close($db);
}
?>