<?php include('navv.php') ?>
<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "isa";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve students and rooms data
$studentsQuery = "SELECT * FROM student ORDER BY year";
$studentsResult = $conn->query($studentsQuery);

$roomsQuery = "SELECT * FROM room";
$roomsResult = $conn->query($roomsQuery);

// Count the total number of students
$totalStudentsQuery = "SELECT COUNT(*) AS totalStudents FROM student";
$totalStudentsResult = $conn->query($totalStudentsQuery);
$totalStudents = $totalStudentsResult->fetch_assoc()['totalStudents'];

// Count the total capacity of all rooms
$totalCapacityQuery = "SELECT SUM(room_capacity) AS totalCapacity FROM room";
$totalCapacityResult = $conn->query($totalCapacityQuery);
$totalCapacity = $totalCapacityResult->fetch_assoc()['totalCapacity'];

// Check if there is a shortage of rooms for students
if ($totalCapacity < $totalStudents) {
    echo "Alert: There is a shortage of rooms for students. Please add more rooms.";
    exit;
}

// Initialize an array to keep track of allocated students
$allocatedStudents = array();

// Allocate students to rooms
while ($room = $roomsResult->fetch_assoc()) {
    $roomNumber = $room['room_number'];
    $roomCapacity = $room['room_capacity'];

    // Retrieve the students from two different years
    $studentsToAllocate = array();
    $yearCounts = array();

    // Initialize the yearCounts array with keys for each year
    $yearCounts[1] = 0;
    $yearCounts[2] = 0;
    $yearCounts[3] = 0;
    $yearCounts[4] = 0;

    while ($student = $studentsResult->fetch_assoc()) {
        if (!in_array($student['usn'], $allocatedStudents) && $yearCounts[$student['year']] < ($roomCapacity / 2)) {
            $studentsToAllocate[] = $student;
            $allocatedStudents[] = $student['usn'];
            $yearCounts[$student['year']]++;
        }
    }

    // Allocate students to the room for examination
    foreach ($studentsToAllocate as $student) {
        $studentUsn = $student['usn'];
        $studentName = $student['name'];
        $allocateQuery = "INSERT INTO allot (usn, name, room_number) VALUES ('$studentUsn', '$studentName', $roomNumber)";
        $conn->query($allocateQuery);
    }

    // Reset the students result pointer for the next room
    $studentsResult->data_seek(0);
}

echo "Students allocated to classrooms for examination successfully.";

// Close the database connection
$conn->close();
?>
