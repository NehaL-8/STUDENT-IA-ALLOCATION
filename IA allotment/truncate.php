<?php
include "dbconnect.php";
$truncateQuery = " DELETE FROM `isa`.`allocated_rooms`";
if ($db->query($truncateQuery) === TRUE) {
    echo "Table truncated successfully.";
} else {
    echo "Error truncating table: " . $db->error;
}
?>