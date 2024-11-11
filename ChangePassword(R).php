<?php
include "dbConn.php";
// Get the form data


// SQL update query
// $sql = "UPDATE `residentlogin` SET email = '$new_email' WHERE ID = '$user_id'";

if(isset($_POST['Submit'])){
    $user_id = $_POST['user_id'];
    $new_password = $_POST['new_password'];
    // $lname = $_POST['txtLName'];   
    // $country = $_POST['txtPhone'];

    $query = "UPDATE `residents_table` SET Password = '$new_password' WHERE Resident_Id = '$user_id'";
    if(mysqli_query($connection,$query)){
        echo "User Password Successfully Updated!";
        header("Location:Login(R).php");
    } else {
        echo "Error Updating the Information. Please try again.";
    }
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(R)Change Password</title>
    <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
</head>
<body class="BG" background="Lock.jpg">
    <style>
        .BB{
        width: 300px;
        height: 300px;
        margin: 0 auto; 
        top: 50%;
        margin-top: 270px;
        /* background-color: rgb(168, 168, 168); */
        }
        .BG{
        background-image: url(Lock.jpg);
        background-size: cover;
        background-repeat:no-repeat;
        }
        input{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        background: transparent;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-weight:bold;
        
        }

        .box{
        border-radius: 20px;
        background-color: rgba(211, 211, 211, 0.766);
        padding: 20px;
        height: auto;
        
        }

        button {
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

        button:active,
        button:focus {
        outline: none;
        }

        button:hover {
        background-position: -20px -20px;
        }

        button:focus:not(:active) {
        box-shadow: rgba(40, 170, 255, 0.25) 0 0 0 .125em;
        }

        .arrow{
        height:80px;
        width:80px;
        margin-left: 1%;
        margin-top: 1%;
        }
    </style>
    <form method="post">
    <a href="Login(R).php" target="_blank">
        <img src="Arrow2.png" class="arrow" alt="">
    </a>
    <div class="BB">
        <div class="box">
        
            <h1>Change Password</h1>
            <input type="text" name="user_id" style="background-color: transparent;" placeholder="User ID" required><br>
            <input type="text" name="new_password" placeholder="New Password" required><br>
            <button type="submit" name="Submit"><span>Update Password</span></button>
        
        </div>
    </div>
    </form>
</body>
</html>