<?php include('server.php') ?>
<form action="index.php" method="post">
                 <button type="submit">BACK</button></form>


<?php
if (isset($_POST['start_year']) && isset($_POST['end_year'])) {
    $startYear = $_POST['start_year'];
    $endYear = $_POST['end_year'];

    $studentsQuery = "SELECT * FROM student WHERE year BETWEEN $startYear AND $endYear ORDER BY year";
    $studentsResult = $db->query($studentsQuery);

    $roomsQuery = "SELECT * FROM room";
    $roomsResult = $db->query($roomsQuery);

    // Count the total number of students from each year
    $yearCounts = array();
    $yearCounts[1] = 0;
    $yearCounts[2] = 0;
    $yearCounts[3] = 0;

    while ($student = $studentsResult->fetch_assoc()) {
        $year = $student['year'];
        if (isset($yearCounts[$year])) {
            $yearCounts[$year]++;
        }
    }

    // Calculate the total capacity for each year
    $yearCapacity = array();
    foreach ($yearCounts as $year => $count) {
        $yearCapacity[$year] = ceil($count / $roomsResult->num_rows);
    }

    // Calculate the total capacity of all rooms
    $totalCapacityQuery = "SELECT SUM(room_capacity) AS totalCapacity FROM room";
    $totalCapacityResult = $db->query($totalCapacityQuery);
    $totalCapacity = $totalCapacityResult->fetch_assoc()['totalCapacity'];

    // Check if there is a shortage of rooms for students
    $totalNeededCapacity = array_sum($yearCapacity);
    if ($totalCapacity < $totalNeededCapacity) {
        $shortage = $totalNeededCapacity - $totalCapacity;
        echo "Alert: There is a shortage of " . $shortage . " rooms for students. Please add more rooms.";
        exit;
    }

    // Initialize an array to keep track of allocated students
    $allocatedStudents = array();
    $popupDisplayed = false;

    // Allocate students to rooms
    while ($room = $roomsResult->fetch_assoc()) {
        $roomNumber = $room['room_number'];
        $roomCapacity = $room['room_capacity'];

        // Allocate students from each year
        foreach ($yearCapacity as $year => $capacity) {
            $studentsQuery = "SELECT * FROM student WHERE year = $year ORDER BY year";
            $studentsResult = $db->query($studentsQuery);

            $studentsToAllocate = array();
            while ($student = $studentsResult->fetch_assoc()) {
                if (!in_array($student['usn'], $allocatedStudents) && count($studentsToAllocate) < $capacity) {
                    $studentsToAllocate[] = $student;
                    $allocatedStudents[] = $student['usn'];
                }
            }

            // Allocate students to the room for examination
            foreach ($studentsToAllocate as $student) {
                $studentUsn = $student['usn'];
                $studentName = $student['name'];

                // Check if the student is already allocated
                $allocationCheckQuery = "SELECT COUNT(*) AS allocationCount FROM allocated_rooms WHERE usn = '$studentUsn'";
                $allocationCheckResult = $db->query($allocationCheckQuery);
                $allocationCount = $allocationCheckResult->fetch_assoc()['allocationCount'];

                if ($allocationCount == 0) {
                    $allocateQuery = "INSERT INTO allocated_rooms (usn, name, room_number) VALUES ('$studentUsn', '$studentName', $roomNumber)";
                    $db->query($allocateQuery);
                } else {
                    if (!$popupDisplayed) {
                        echo "<script>alert('Students are already allocated.');</script>";
                        $popupDisplayed = true;
                    }
                }
            }
        }
        // Reset the students result pointer for the next room
        $studentsResult->data_seek(0);
    }
    if (!$popupDisplayed) {
        $allocatedStudentsQuery = "SELECT * FROM allocated_rooms";
        $allocatedStudentsResult = $db->query($allocatedStudentsQuery);
        ?>

        <!-- Display allocated students -->
        <h2>Allocated Students</h2>
        <table>
            <tr>
                <th>USN</th>
                <th>Name</th>
                <th>Room Number</th>
            </tr>
            <?php while ($student = $allocatedStudentsResult->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $student['usn']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['room_number']; ?></td>
                </tr>
            <?php } ?>
        </table>

        <!-- Print button -->
        <button onclick="window.print()">Print</button>

        <!-- Truncate button -->
        <form method="POST" action="">
            <button type="submit" name="truncate">Truncate Allocation</button>
        </form>

        <?php
        echo "<script>alert('Student allocated successfully.');</script>";
    }
}

// Truncate allocation if requested
if (isset($_POST['truncate'])) {
    $truncateQuery = "TRUNCATE TABLE allocated_rooms";
    $db->query($truncateQuery);
    echo "<script>alert('Allocation truncated successfully.');</script>";
}
?>
<form action="display_allotment.php" method="post">
                 <button type="submit">display_allotment</button></form>
<!-- HTML form to input start year and end year -->
<form method="POST" action="">
    Start Year: <input type="number" name="start_year" required>
    End Year: <input type="number" name="end_year" required>
    <button type="submit">Allocate Students</button>
</form>
