<?php
include "dbConn.php"; // Include your database connection file

if(isset($_POST['registerbtn'])){
    $ID = $_POST['ID'];
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone_number = $_POST['Phone'];
    $password = $_POST['Password'];

    $query =("INSERT INTO adminname(ID,Name, Phone, Email, Password) VALUES ('$ID','$name','$phone_number','$email','$password')");
    if(mysqli_query($connection,$query)){
        header("Location: AdminLogin(A).php?success=Account create successfully.Try to login");
    } else{
        echo"Error creating your account. Please try again.";
        // header("Location: login2.php?fail=Error creating your account. Please try again.");
    }
    mysqli_close($connection);
}
?>	

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');
        body{
            font-family: 'Poppins', sans-serif;
            font-weight: 300;
            line-height: 1.7;
            color: #ffeba7;
            background-color: #7895CB;
            background-image: url("https://d35w1c74a0khau.cloudfront.net/wp-content/uploads/2019/02/88988.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
        .section{
            border-radius: 20px;
            background-color: rgba(79, 77, 77, 0.766);
            padding: 20px;
            height: auto;
            width: auto;
        }

        .center-wrap{
            position: absolute;
            width: auto;
            padding: 0 35px;
            top: 50%;
            left:40%;
            transform: translate3d(0, -50%, 35px) perspective(100px);
            z-index: 20;
            display: block;
            
        }
        h2 {
            font-weight: 600;
        }
        .form-group{ 
            position: relative;
            display: block;
            margin: 0;
            padding: 0;
        }
        .input-icon {
            position: absolute;
            top: 0;
            left: 18px;
            height: 48px;
            font-size: 24px;
            line-height: 48px;
            text-align: left;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
            
        }
        .form-style {
            padding: 8px 20px ;
            margin-bottom: 10%;
            padding-left: 55px;
            height: 20px;
            width: auto;
            font-weight: 500;
            border-radius: 4px;
            font-size: 14px;
            line-height: 22px;
            letter-spacing: 0.5px;
            outline: none;
            color: #c4c3ca;
            background-color: #1f2029;
            border: none;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
            box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
            
        }
        .form-style:focus,
        .form-style:active {
            border: none;
            outline: none;
            box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
        }
        .btn{  
            border-radius: 4px;
            height: 44px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            -webkit-transition : all 200ms linear;
            transition: all 200ms linear;
            padding: 0 30px;
            letter-spacing: 1px;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            align-items: center;
            background-color: #ffeba7;
            color: #000000;
        }
        .btn:hover{  
            background-color: #000000;
            color: #ffeba7;
            box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
        }
        h6 span{
            padding: 0 20px;
            font-weight: 700;
            font-size: large;
            
        }
        a{
            text-decoration: none;
            color: bisque;
        }
        .Sign{
            color: rgb(231, 3, 3);
        }

        .arrow{
            height:80px;
            width: 80px;
            margin-left: 1%;
            margin-top: 1%;
        }
    </style>
    <a href="AdminLogin(A).php">
        <img src="Arrow2.png" class="arrow" alt="">
    </a>
    <form method="post" action="">
<div class="card-back">
    <div class="center-wrap">
        <div class="section">
            <h2 class="mb-0 pb-3" align="center">Admin Sign Up</h2></a>
                <div class="form-group">
                    <input type="text" class="form-style" name="Name" placeholder="Full Name" required>
                    <i class="input-icon uil uil-user"></i>
                </div>	
                <div class="form-group mt-2">
                    <input type="email" class="form-style" name="Email" placeholder="Email" required>
                    <i class="input-icon uil uil-at"></i>
                </div>
                <div class="form-group mt-2">
                    <input type="tel" class="form-style" name="Phone" placeholder="Phone Number" required>
                    <i class="input-icon uil uil-phone"></i>
                </div>	
                <div class="form-group mt-2">
                    <input type="password" class="form-style" name="Password" placeholder="Password" required>
                    <i class="input-icon uil uil-lock-alt"></i>
                </div>
                <!-- <button type="submit" name="registerbtn" class="btn mt-4">Register</button> -->
                <input type="submit" name="registerbtn" class="btn mt-4" value="Register">
        </div>
    </div>
</div>
</form>
</body>
</html>