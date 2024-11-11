<?php
// update_status.php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $requestId = $_POST["request_id"];
    $status = $_POST["status"];

    // Escape the variables to prevent SQL injection
    $requestId = $conn->real_escape_string($requestId);
    $status = $conn->real_escape_string($status);

    // Update the "Status" column in the database
    $sql = "UPDATE access_card SET Status = '$status' WHERE Request_Id = '$requestId'";

    if ($conn->query($sql) === TRUE) {
        // Status updated successfully, you can redirect or display a success message here.
        echo "Status updated successfully";
    } else {    
        // Handle the error, you can redirect or display an error message here.
        echo "Error updating status: " . $conn->error;
    }
}

$conn->close();
?>
