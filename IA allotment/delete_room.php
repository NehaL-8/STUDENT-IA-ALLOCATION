
<?php
include "dbconnect.php"; // Using database connection file here

$room_number = $_GET['room_number']; // get id through query string

$del = mysqli_query($db,"delete from room where room_number ='$room_number'");

if($del)
{
    mysqli_close($db); // Close connection
    header("location:all_records_room.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
