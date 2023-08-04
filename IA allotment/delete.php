<?php

include "dbconnect.php"; // Using database connection file here

$usn = $_GET['usn']; // get id through query string

$del = mysqli_query($db,"delete from student where usn = '$usn'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:all_records.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
