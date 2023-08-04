<?php
include 'dbconnect.php';

// Check if a file is uploaded
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Check if there was no upload error
    if ($file['error'] === UPLOAD_ERR_OK) {
        $filePath = $file['tmp_name'];

        // Function to insert students from CSV file
        function insertStudentsFromFile($filePath, $db)
        {
            // Open the CSV file
            $file = fopen($filePath, "r");
            if (!$file) {
                die("Failed to open the file.");
            }

            // Prepare the insert statement
            $stmt = $db->prepare("INSERT INTO student (name, usn, year) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $usn, $year);

            // Read the CSV data
            while (($data = fgetcsv($file)) !== false) {
                $name = $data[0];
                $usn = $data[1];
                $year = $data[2];

                // Execute the insert statement
                if (!$stmt->execute()) {
                    echo "Failed to insert student: " . $stmt->error . "<br>";
                }
            }

            // Close the file
            fclose($file);

            // Close the statement
            $stmt->close();
        }

        // Call the function to insert students from the CSV file
        insertStudentsFromFile($filePath, $db);

        // Show success message
        $successMessage = "Students inserted successfully.";
    } else {
        // Show upload error message
        $errorMessage = "File upload error: " . $file['error'];
    }
}

// Close the database connection
$db->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        h2 {
            margin-top: 0;
        }
        
        .form-container {
            max-width: 400px;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-container input[type="file"] {
            margin-bottom: 10px;
        }
        
        .form-container button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
        }
        
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Upload Student List</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="file" accept=".csv" required>
            <button type="submit">Upload</button>
        </form>
    </div>

    <?php if (isset($successMessage)) : ?>
        <div class="success-message">
            <?php echo $successMessage; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($errorMessage)) : ?>
        <div class="error-message">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
</body>
</html>
