<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql01 = "SELECT * FROM residents_table WHERE Login = 'Yes'";
    $result01 = $conn->query($sql01);

    $residents01 = array();
    if ($result01->num_rows > 0) {
        // Store data of each row in the array
        while ($row = $result01->fetch_assoc()) {
            $residents01[] = $row;
        }
    }

    if(isset($_POST['submitbtn'])){
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $date = $_POST['Date']; 
        $starttime = $_POST['StartTime'];
        $endtime = $_POST['EndTime'];
        $type = $_POST['facilities'];

        $duplicateCheckQuery = "SELECT * FROM facility WHERE Booking_Date = '$date' AND Start_Time = '$starttime' AND End_Time = '$endtime' AND Facilities_Type = '$type'";
        $duplicateCheckResult = $conn->query($duplicateCheckQuery);

        if ($duplicateCheckResult->num_rows > 0) {
            echo '<script>alert("Duplicate booking detected. Please choose a different date, time, or facility.");</script>';
        } else {
            $query ="INSERT INTO facility(Resident_Name, Email_Address, Booking_Date, Start_Time, End_time, Facilities_Type) VALUES ('$name','$email','$date','$starttime','$endtime','$type')";
            if(mysqli_query($conn,$query) === TRUE){
                header("Location: BookingCalendar(R).php");
                echo '<script>alert("Booking successful. Thank you.");</script>';
                // header("Location: BookingForm1.php");
                exit;
            } else{
                echo '<script>alert("Failed to make booking. Please try again");</script>';
            }
        }
        mysqli_close($conn);
    }
?>	

<!DOCTYPE html>
<html>
<head>
    <title>(R)Booking Form</title>
    <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("https://ihdwall.com/storage/202101/mountain-lake-forest-landscape-nature-scenery-hd-wallpaper-1920x1080.jpg");
            background-size:cover;
            background-repeat: no-repeat;
        }

        .arrow,
        .arrow img{
            height: 70px;
            width: 80px;
            z-index: 2;
            transform: translate(30%,2%);
            position: fixed;
        }

        .arrow a{
            position: fixed;
            transform: translate(15%,15%);
            width: fit-content;
            height: fit-content;
        }

        h1{
            text-align: center;
            font-size: 50px;
        }

        #bookingForm, #bookingList {
            margin: 20px auto;
            width: 550px;
            height: 400px;
            text-align: center;
            
        }

        #bookingList ul {
            padding: 0;
            list-style-type: none;
        }

        #bookingList li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f0f0f0;
        }

        .button-21 {
            align-items: center;
            appearance: none;
            background-color: #3EB2FD;
            background-image: linear-gradient(1deg, #4F58FD, #149BF3 99%);
            background-size: calc(100% + 20px) calc(100% + 20px);
            border-radius: 100px;
            border-width: 0;
            box-shadow: none;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-flex;
            font-family: CircularStd,sans-serif;
            font-size: 1rem;
            height: auto;
            justify-content: center;
            line-height: 1.5;
            padding: 6px 20px;
            position: relative;
            text-align: center;
            text-decoration: none;
            transition: background-color .2s,background-position .2s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: top;
            white-space: nowrap;
            margin-top: 2%;
        }
        
        .button-21:active,
        .button-21:focus {
            outline: none;
        }
        
        .button-21:hover {
            background-position: -20px -20px;
        }
        
        .button-21:focus:not(:active) {
            box-shadow: rgba(40, 170, 255, 0.25) 0 0 0 .125em;
        }

        input, select{
            margin-bottom: 5%;
            padding: 10px;
            border: none;
            background-color: rgba(146, 146, 146, 0.008);
            border-bottom: 2px solid rgb(33, 30, 30);
        }

        #bookingForm{
            border-radius: 20px;
            background-color: rgba(211, 211, 211, 0.766);
            padding: 20px;
            height: auto;
        }

    </style>
    <div class="arrow">
      <a href="BookingCalendar(R).php"><img src="/SDPAssignment/All_Code/Arrow2.png" alt="Back to last page"></a>
    </div>
    <h1>Facilities Booking Form</h1>
    <div id="bookingForm">
        <div id="BB">
            <form method="post" onsubmit="return validateForm()">
                <?php foreach($residents01 as $resident01): ?>
                    <input type="text" name="Name" value = "<?php echo htmlspecialchars($resident01['First_Name']). ' ' . $resident01['Last_Name']; ?>" id="nameInput" placeholder="Name"><br>
                    <input type="email" name="Email" value = "<?php echo htmlspecialchars($resident01['Email_Address']); ?>" id="emailInput" placeholder="Email"><br>
                    <input type="date" name="Date" id="dateInput" required><br>
                    <input type="time" name="StartTime" id="startTimeInput" min="09:00" max="21:00" step="1800" required><br>
                    <input type="time" name="EndTime" id="endTimeInput" min="09:00" max="21:00" step="1800" required><br>
                    <select name="facilities"  id="typeInput" required>
                        <option value="Option">--Select an option--</option>
                        <option value="Amphitheatre">Amphitheatre</option>
                        <option value="Gym Room">Gym Room</option>
                        <option value="Badminton Court">Badminton Court</option>
                        <option value="Yoga Space">Yoga Space</option>
                        <option value="Swimming Pool">Swimming Pool</option>
                        <option value="Karaoke">Karaoke</option>
                    </select><br>
                <?php endforeach; ?>

                <a href="TermsandConditions.html"><input type="checkbox" required>Terms and Conditions</a><br>
                <input type="submit" id="submitBtn" name="submitbtn" class="button-21" value="Submit">
            </form>
        </div>
    </div>  
</body>
</html>
