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
	 $usn = $_POST['usn'];
	 $name = $_POST['name'];
      $year = $_POST['year'];
	 $section = $_POST['section'];
	 $popupDisplayed = false;

	 $studentCheckQuery = "SELECT COUNT(*) AS studentCount FROM student WHERE usn = '$usn'";
	 $studentCheckResult = $db->query($studentCheckQuery);
	 $studentCount = $studentCheckResult->fetch_assoc()['studentCount'];

	 if($studentCount==0){
		
		$query = "INSERT INTO student (usn,name,year,section) VALUES ('$usn','$name','$year','$section')";
		$db->query($query);
	 } 
	 else {
		     if (!$popupDisplayed) {
			 echo "<script>alert('Student  already exists');</script>";
			 $popupDisplayed = true;
		    }
		}
	 if(!$popupDisplayed){
		echo  "New student added successfully !";
	 }
	
	 mysqli_close($db);
}
?>