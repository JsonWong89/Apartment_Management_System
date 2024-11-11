<?php
    if(isset($_POST['submit']))
    {
        $paymentfees = $_POST['paymentfees'];
        $paymentremarks = $_POST['paymentremarks'];
        $paymentdeadline = $_POST['paymentdeadline'];
        $formatteddeadline = date('Y-m-d', strtotime($paymentdeadline));
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
    }
    
    $qry = mysqli_query($con, "SELECT * FROM payment_information");
    $rowCheck=mysqli_num_rows($qry);
    if ($rowCheck>0) { // if data exist update the data
        // Prepare the SQL query
        $query = "UPDATE payment_information
                  SET Fees = '$paymentfees', 
                  Remarks = '$paymentremarks', 
                  Deadline = '$formatteddeadline'";
        // Execute the query and check if it was successful
        if (mysqli_query($con, $query)) {
            header ("Location: AdminPage2(A).html");
            echo "Update successful";
            // header ("Location: AdminPage2(A).html");
        } else {
            echo "Error: " . mysqli_error($con);
        } 
    } else {
        $qry=mysqli_query($con,"INSERT INTO payment_information (Fees, Remarks, Deadline)
        VALUES ('$paymentfees', '$paymentremarks', '$paymentdeadline')");

        echo "Insert successful";
    }

    // close connection
    mysqli_close($con);
?>
