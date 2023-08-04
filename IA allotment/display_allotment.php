<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="common.css">
    <style type="text/css">

        .print-button-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .print-button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
        }
        
        .print-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<form action="index.php" method="post">
                 <button type="submit">BACK</button></form>
                 
    <ul>
        <?php include 'link.php' ?>
        <div class="page-name">INTERNALS SEAT ALLOTMENT</div>
        <div class="main-container">
            <div class="main-content">
                <div class="table-responsive border">
                    <table class="table table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>USN</th>
                                <th>NAME</th>
                                <th>ALLOCATED ROOM</th>
                            </tr>   
                        </thead>
                        <?php
                        include "dbconnect.php";
                        $sql = "SELECT * FROM allocated_rooms";
                        $result = $db->query($sql);

                        // Check if any rows are returned
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['usn'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['room_number'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No results found</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="print-button-container">
                <button class="print-button" onclick="window.print()">Print</button>
            </div>
        </div>
    </ul>
</body>
</html>
