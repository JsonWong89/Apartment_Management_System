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

    if(isset($_POST['submitbtn'])){
        $firstname = $_POST['FirstName'];
        $lastname = $_POST['LastName'];
        $email = $_POST['Email'];
        $number = $_POST['Number'];
        $numberpersons = $_POST['NumberPersons'];
        $date = $_POST['Date']; 
        $starttime = $_POST['StartTime'];
        $endtime = $_POST['EndTime'];
        $type = $_POST['type'];

        $duplicateCheckQuery = "SELECT * FROM appointment WHERE Appointment_Date = '$date' AND Start_Time = '$starttime' AND End_Time = '$endtime' AND Plan_Type = '$type'";
        $duplicateCheckResult = $conn->query($duplicateCheckQuery);

        if ($duplicateCheckResult->num_rows > 0) {
            echo '<script>alert("Duplicate appointments detected. Please choose a different date, time, or plan type.");</script>';
        } else {
            $query ="INSERT INTO appointment(First_Name, Last_Name, Email_Address, Telephone_Number, Number_Persons, Appointment_Date, Start_Time, End_time, Plan_Type) VALUES ('$firstname', '$lastname', '$email', '$number', '$numberpersons', '$date','$starttime','$endtime','$type')";
            if(mysqli_query($conn, $query) === TRUE){
                echo '<script>alert("Appointment made successful. Thank you.");</script>';
            } else{
                echo '<script>alert("Failed to make appointment. Please try again");</script>';
            }
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html>
<head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url("https://ihdwall.com/storage/202101/mountain-lake-forest-landscape-nature-scenery-hd-wallpaper-1920x1080.jpg");
        background-size:cover;
        background-repeat: no-repeat;
    }

    h1{
        font-size: 60px;
        margin-left: 200px;
        margin-top: 50px;
        color: white;
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
        margin-bottom: 10%;
        padding: 10px;
        border: none;
        background-color: rgba(146, 146, 146, 0.008);
        border-bottom: 2px solid rgb(33, 30, 30);
    }

    #bookingForm{
        border-radius: 20px;
        background-color: rgba(211, 211, 211, 0.766);
        padding: 80px;
        margin-left: 1000px;
        width: 300px;
        height: 530px;
        transform: translate(0%, -20%);
    }

    #BB{
        margin-top: -660px;
        
    }

    .image1{
        margin-top: 55px;
        margin-left: -1500px;
        border-radius: 50px;
        width: 850px;
        height: 550px;
    }

    input[type=number]{
        width: 170px;
    }

    input[type=date]{
        width: 170px;
    }

    input[type=time]{
        width: 170px;
    }

</style>
</head>

<body>
    <h1>UNIT PLAN TYPE C</h1>
    <div id="bookingForm">
        <div>
            <img class = "image1" src = "Plan C.jpg" alt="image1">
        </div>
        <div id="BB">
            <form method="post" onsubmit="return validateForm()">
                <input type="hidden" name="type" value="C">
                <input type="text" name="FirstName" id="firstnameInput" placeholder="First Name"><br>
                <input type="text" name="LastName" id="lastnameInput" placeholder="Last Name"><br>
                <input type="text" name="Email" id="emailInput" placeholder="Email Address"><br>
                <input type="text" name="Number" id="numberInput" placeholder="Telephone Number"><br>
                <input type="number" name="NumberPersons" id="numberpersonsInput" placeholder="Number of Persons" min=1 max=5><br>
                <input type="date" name="Date" id="dateInput"><br>
                <input type="time" name="StartTime" id="startTimeInput" min="09:00" max="21:00" step="1800"><br>
                <input type="time" name="EndTime" id="endTimeInput" min="09:00" max="21:00" step="1800"><br>
                <a href="TermsandConditions.html"><input type="checkbox" required>Terms and Conditions</a><br>
                <input type="submit" id="submitBtn" name="submitbtn" class="button-21" value="Submit">
            </form>
        </div>
    </div>  

    <script>
    function validateForm() {
        // Perform your JavaScript form validation here
        // Return true if validation passes, or false otherwise
        // For example:
        var firstname = document.getElementById("firstnameInput").value;
        var lastname = document.getElementById("lastnameInput").value;
        var email = document.getElementById("emailInput").value;
        var number = document.getElementById("numberInput").value;
        var numberpersons = document.getElementById("numberpersonsInput").value;
        var date = document.getElementById("dateInput").value;
        var starttime = document.getElementById("startTimeInput").value;
        var endtime = document.getElementById("endTimeInput").value;
        // Perform validation checks
        if (firstname === "" || lastname === "" || email === "" || number === "" || numberpersons === "" || date === "" || starttime === "" || endtime === "") {
            alert("Please fill in all required fields.");
            return false;
        }
        return true;
    }
    </script>
</body>
</html>
