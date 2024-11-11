<?php
// Replace these variables with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected date from the AJAX request
$date = $_POST['selectedDate'];

$sql = "SELECT Facilities_Type, Start_Time, End_Time FROM facility WHERE Booking_Date = '$date'";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Fetch all rows and store them in an array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    // Return an empty array or an error message
    echo json_encode(array());
}

$conn->close();
?>

