<?php
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $unit = $_POST['unit'];
        $reason= $_POST['reason'];
        $description = $_POST['description'];
    }

    // database details
    $host = "localhost";    
    $username = "root";
    $password = "";
    $dbname = "login";

    // creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // Check if the connection is successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        // Prepare the SQL query
        $query = "INSERT INTO access_card (Resident_Id, Resident_Name, Email_Address, Telephone_Number, Unit, Reasons, Descriptions)
                  VALUES ('$id', '$name', '$email', '$number', '$unit', '$reason', '$description')";

        // Execute the query and check if it was successful
        if (mysqli_query($con, $query)) {
            echo "Insert successful";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }   

    // close connection
    mysqli_close($con);
?>
