<?php

include "dbconnect.php"; // Using database connection file here

$del = mysqli_query($db,"truncate table allocated_rooms"); // delete query
echo "truncated successfully";
echo '<form action="display_allotment.php" method="post">';
               echo '    <button type="submit">BACK</button>';
?>
