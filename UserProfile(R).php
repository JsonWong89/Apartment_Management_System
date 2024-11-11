<?php
session_start();
include "dbConn.php"; // Include your database connection file

// Validate the user credentials and fetch the user information
if (isset($_POST['loginbtn'])) {
    $Email = $_POST['Email'];
    $password = $_POST['Password'];

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM `residents_table` WHERE Email_Address=? AND Password=?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $Email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Assuming the query returns only one row for the user
    $user = $result->fetch_assoc();

    // Store user data in the session for later use
    $_SESSION['id'] = $user['Resident_Id'];
    $_SESSION['FName'] = $user['First_Name'];
    $_SESSION['LName'] = $user['Last_Name'];
    $_SESSION['Email'] = $user['Email_Address'];
    $_SESSION['PNumber'] = $user['Telephone_Number'];
    $_SESSION['UNumber'] = $user['Unit'].$_POST['txtUnit1'].'-'.$_POST['txtUnit2'].'-'.$_POST['txtUnit3'];
    $_SESSION['gender'] = $user['Gender'];
    $_SESSION['race'] = $user['Race'];
    $_SESSION['religion'] = $user['Religion'];
    $_SESSION['age'] = $user['Age'];
}

// Check if the user clicked the "Save changes" button to update the data
if (isset($_POST['btnUpdate'])) {
    $FName = $_POST['FName'];
    $LName = $_POST['LName'];
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $UnitN = $_POST['txtUnit1'].'-'.$_POST['txtUnit2'].'-'.$_POST['txtUnit3'];
    $gender = $_POST['txtGender'];
    $race = $_POST['txtRace'];
    $religion = $_POST['txtReligion'];
    $age = $_POST['txtAge'];
    $userID = $_SESSION['id']; // Fetch the user ID from the session

    // Use prepared statement to prevent SQL injection
    $query = "UPDATE `residents_table` SET First_Name=?, Last_Name=?, Email_Address=?, Telephone_Number=?, Unit=?, Gender=?, Race=?, Religion=?, Age=? WHERE Resident_Id=?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("sssssssssi",$FName,$LName, $email, $phone, $UnitN, $gender, $race, $religion, $age, $userID);
    if ($stmt->execute()) {
        echo "Student Information Successfully Updated!";
        // header('Location: AdminSignUp.php');
        exit();
    } else {
        echo "Error Updating the Information. Please try again.";
    }
}

mysqli_close($connection);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>(R)User Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel ='icon' href = 'Logo.jpeg' type="image/icon">
    <style type="text/css">
        body{
            /* margin-top:20px; */
            /* background-color:#5bd4f2; */
            background-image: url("https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: fixed;
            color:#69707a;
        }
        img{
            height: 175px;
            /* border-style: solid; */
            border-width: 1px;
            border-color: black;
            border-radius: 50%;
            width: 175px;

            /* margin-left: 44%; */
        }
        .box{
        border-radius: 20px;
        background-color: rgba(129, 227, 238, 0.523);
        padding: 10px;
        height: auto;
        text-align: center;
        width: fit-content;
        margin-left: 24%;
        transform: scale(1.7,1.5);
        }
        
        h3{
            text-align: center;
            color: #ffeba7;
        }
        .card{
            border-radius: 20px;
            background-color: rgba(95, 95, 95, 0.523);
            padding: 20px;
            height: 635px;
            width: 1000px;
            margin-left: auto;
            margin-right: auto;
            margin-top: -8%;
            
        }
        .card-1,.mb-3{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: #ffeba7;
        }
        .mb-3{
            padding-top: 2%;
        }
        .last{
            margin-left: 65%;
            margin-top:-9%
        }
        input{
            /* margin-bottom: -1%; */
            padding: 14px;
            border: none;
            background-color: rgba(129, 126, 126, 0);
            border-bottom: 2px solid rgb(0, 0, 0);
            font-size: large;
            color: #fff;
        }
        
        .button{
            margin-top: 8%;
        }

        .btn-1{
            width: 100px;
            height: 50px;
            color: #fff;
            background: #222;
            position: relative;
            cursor: pointer;
            z-index: 1;
            border-radius: 10px;
            /* margin-left: 44%; */
        }
        #Clear{
            float:left;
        }
        #Save{
            float:right;
        }

        .btn-1::before{
            content: '';
            width: 108px;
            height: 58px;
            background: #222;
            position: absolute;
            top: -4px;
            left: -4px;
            z-index: -1;
            border-radius: 10px;
            transition: all .35s;
        }

        .btn-1::before{
            background: linear-gradient(45deg, red, orange, yellow, green, cyan, blue, purple, red);
            filter: blur(5px);
            background-size: 1000%;
            animation: amSize 40s linear infinite;
            opacity: 0;
        }

        @keyframes amSize{
            0%   {background-position: 0 0;}
            100% {background-position: 1000% 0;}
        }

        .btn-1::after{
            content: '';
            width: 100%;
            height: 100%;
            background: #222;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            border-radius: 10px;
            opacity: 1;
        }

        .btn-1:hover::before{
            opacity: 1;
        }

        .btn-1:active::after{
            opacity: 0;
        }
        h1{
            color: #ffeba7;
            margin-top: -3%;
        }
        .arrow{
            height:80px;
            width: 80px;
        }
        .mb-2{
            color: #ffeba7;
            font-size:18px;
        }
        .card-1{
            text-decoration: underline;
        }
        .PN{
            margin-left: 65%;
            margin-top: -9.6%;
        }
        .PM{
            text-align:center;
            font-size:18px;
            margin-top: 50;
            
        }
        .form-style1,.form-style2,.form-style3{
            font-size:22px;
        }
        .php{
            margin-bottom:-1%;
            color:#91C8E4;
        }
        .P2{
            margin-left: 65%;
            margin-top: 2%;

        }
        .P1{
            margin-left: 65%;
            margin-top: -30%;
        }
        .P3{
            margin-top: -17%;
        }
        .P4{
            margin-top: 2%;

        }
    </style>
</head>
<body>
<a href="Homepage(R).php"><img class="arrow" src="Arrow2.png" alt=""><h1 align="center">Profile</h1></a>
<hr><br><br><br><br><br><br><br>
<!-- <div class="box"><h3>Profile Picture</h3> -->
<form method="post">

<!-- <img src="UserIcon2.png" alt=""><br><br> -->

 <!-- </div> -->

<div class="card">
<div class="mb-2">ID: <input type="text" value="<?php echo $_SESSION['id']; ?>" color="gold" name="id" disabled><br><br>
<div class="card-1" align="center">Account Details</div><br>
<div class="card-body">
<form>


<div class="IO">
<label class=""  for="inputFirstName">First name:</label><br>
<input class="" id="" type="text" value="<?php echo $_SESSION['FName']; ?>" name="FName" required>


<div class="last">
<label class="small mb-1" for="inputLastName">Last name:</label><br>
<input class="" id="" type="text" value="<?php echo $_SESSION['LName']; ?>" name="LName" required>
</div>

<br>
<div class="col-md-6">
<label class="email" name="Email" for="inputEmail">Email:</label><br>
<input class="form-control" id="" type="email" value="<?php echo $_SESSION['Email']; ?>" name="txtEmail" required>


<br><br>
<div class="PN">
<label class="small mb-1" for="inputPhoneNumber">Phone Number:</label><br>
<input class="form-control" id="" type="tel" value="<?php echo $_SESSION['PNumber']; ?>" name="txtPhone" required>
</div>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br>
<div class="PM">
<label class="small" for="inputUnitNumber">Unit Number:</label><br>
                <!-- <input class="" id="inputEmailAddress" type="text"  name="txtUnit" required> -->
                <div class="php"><?php echo $_SESSION['UNumber']; ?></div> <br>
                <select name="txtUnit1" class="form-style1"  id="typeInput" required>
                    <!-- <option value=""></option> -->
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
                <select name="txtUnit2" class="form-style2" required>
                    <option value="1" >1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <select name="txtUnit3" class="form-style3" required>
                    <option value="-1" >1</option>
                    <option value="-2">2</option>
                    <option value="-3">3</option>
                    <option value="-4">4</option>
                    <option value="-5">5</option>
                    <option value="-6">6</option>
                    <option value="-7">7</option>
                    <option value="-8">8</option>
                    <option value="-9">9</option>
                    <option value="-10">10</option>
                </select>
</div>
<br><br>
<div class="P1">
<label class="small mb-1" for="inputGender">Gender:</label><br>
<input class="form-control" id="" type="tel" value="<?php echo $_SESSION['gender']; ?>" name="txtGender" required>
</div>
<div class="P2">
<label class="small mb-1" for="inputGender">Race:</label><br>
<input class="form-control" id="" type="tel" value="<?php echo $_SESSION['race']; ?>" name="txtRace" required>
</div>
<div class="P3">
<label class="small mb-1" for="inputGender">Religion:</label><br>
<input class="form-control" id="" type="tel" value="<?php echo $_SESSION['religion']; ?>" name="txtReligion" required>
</div>
<div class="P4">
<label class="small mb-1" for="inputGender">Age:</label><br>
<input class="form-control" id="" type="tel" value="<?php echo $_SESSION['age']; ?>" name="txtAge" required>
</div>
<br><br>
<div class="button">
    <button class="btn-1" id="Clear" type="reset">Reset</button>
    <button class="btn-1" id="Save" name="btnUpdate" type="submit">Save changes</button>
</div>
</form>
</div>
</div>
</div>
</script>
</body>
</html>


<!-- <select name="txtUnit2" class="form-style2" required>
    <option value="1" >Male</option>
    <option value="2">Female</option>
</select>
<select name="txtUnit2" class="form-style2" required>
    <option value="1" >Maley</option>
    <option value="2">Chinese</option>
    <option value="2">Indians</option>
</select>
<select name="txtUnit2" class="form-style2" required>
    <option value="1" >Islam</option>
    <option value="2">Buddhism</option>
    <option value="2">Tao</option>
    <option value="2">Christianity</option>
</select> -->