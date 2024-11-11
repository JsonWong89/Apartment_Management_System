<?php
include "dbConn.php";

if(isset($_POST['registerbtn'])){
    $ID = $_POST['ID'];
    $FName = $_POST['FirstName'];
    $LName = $_POST['LastName'];
    $email = $_POST['Email'];
    $phone_number = $_POST['Phone'];
    $Unit = $_POST['Unit1'].'-'.$_POST['Unit2'].'-'.$_POST['Unit3'];
    $gender = $_POST['Gender'];
    $race = $_POST['Race'];
    $religion = $_POST['Religion'];
    $age = $_POST['Age'];
    $password = $_POST['Password'];

    // $query =("INSERT INTO residents_table(Resident_Id,First_Name, Last_Name, Email_Address, Telephone_Number, Unit, Gender, Race, Religion, Age, Password) VALUES ('$ID', '$FName', '$LName', '$email', '$phone_number', '$Unit', '$gender', '$race', '$religion, '$age', '$password')");
    $query = "INSERT INTO residents_table(Resident_Id,First_Name, Last_Name, Email_Address, Telephone_Number, Unit, Gender, Race, Religion, Age, Password) VALUES ('$ID', '$FName', '$LName', '$email', '$phone_number', '$Unit', '$gender', '$race', '$religion', '$age', '$password')";

    if(mysqli_query($connection,$query)){
        header("Location: Login(R).php?success=Account create successfully.Try to login");
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
    <title>(R)UserSign</title>
    <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
</head>
<style>

    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');
    @import url(https://fonts.googleapis.com/css?family=Merriweather:300,900);

    *:before, *:after{
        box-sizing: border-box;
        font: 300 1em/1.5 'Merriweather', serif; color: #ffffff;
        padding: 0; margin: 0;
    }

    body{

        margin: 0;
    }

    .onfooter{
        font-family: 'Poppins', sans-serif;
        font-weight: 300;
        line-height: 1.7;
        color: #ffeba7;
        background-color: #7895CB;
        background-image: url("https://d35w1c74a0khau.cloudfront.net/wp-content/uploads/2019/02/88988.jpg");
        background-repeat: no-repeat; 
        background-size: cover;
        background-position: relative;
        margin: 0px 0px 345px 0px;
        padding: 90px 10px 160px 10px;
    }

    .center-wrap {
        min-width: 1000px;
        margin: auto 0; 
        display: inline;
        align-items: center;
    }

    .section {
    border-radius: 20px;
    background-color: rgba(79, 77, 77, 0.766);
    padding: 20px 55px 20px 0px;
    height: auto;
    width: 1120px;
    overflow: auto;
    margin: auto;
    }

    h2 {
        font-weight: 600;
    }

    .form-group,
    .form-group-mt-2,
    .form-text { 
        display: block;
        float: left;
        width: 25%;
        margin: 0;
        padding: 0;
        text-align: center;
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

    .form-style,
    .form-style2 {
        padding: 10px 40px ;
        margin: 5% auto;
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
        text-align: center;
    }

    .form-style:focus,
    .form-style:active {
        border: none;
        outline: none;
        box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
    }

    .form-text {
        padding: 10px 40px;
        min-width: 174.4px;
        min-height: 22px;
        letter-spacing: 0.5px;
        margin: 1% auto;
        box-sizing: border-box;
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
        float: right;
        margin: 15px 10px;
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
        margin-top: -6%;
    }

    select{
        border:20%;
    }

    p2{
        padding: 7px 7px;
        font-size="18px"
    }

    .fixed_footer{
    width: 100%;
    height: 350px;
    background: #111;
    position: fixed; left: 0; bottom: 0;
    z-index: -100;
    }

    .fixed_footer p{
        color: #696969;
        font-size: 1em;
        font-weight: 300;
    }

    .footer {
        height: 360px;
        width: 100%;
        background: #00121b;
        display: block;
    }

    .inner-footer {
        width: 95%;
        margin: 0 auto;
        padding: 30px 10px 0px 10px;
        display: flex;
        flex-wrap: wrap;
        box-sizing: border-box;
        justify-content: center;
    }

    .footer-items,
    .footer-big {
        padding: 10px 20px;
        box-sizing: border-box;
        color: #fff;
    }

    .footer-items{
        margin-top: 10px;
        width: 22%;
        padding: 10px 20px;
    }

    .footer-big{
        width: 34%;
        padding: 10px 80px 5px 20px;
    }

    .footer-big p,
    .footer-items p {
        font-size: 16px;
        text-align: justify;
        line-height: 25px;
        color: #fff;
    }

    .footer-items h2{
        padding-bottom: 5px;
    }

    .footer-big h1,
    .footer-items h1 {
        color: #fff;
    }

    .border1 {
        height: 3px;
        background: #ff9800;
        color: #ff9800;
        background-color: #ff9800;
        border: 0px;
    }

    ul {
        list-style: none;
        color: #fff;
        font-size: 15px;
        letter-spacing: 0.5px;	
    }

    ul a {
        text-decoration: none;
        outline: none;
        color: #fff;
        transition: 0.3s;
    }

    ul a:hover {
        color: #ff9800;
    }

    ul li {
        margin: 10px 0;
        height: 25px;
    }

    li i {
        margin-right: 20px;
    }

    .social-media {
        width: 100%;
        color: #fff;
        text-align: center;
        font-size: 20px;
    }

    .social-media a {
        text-decoration: none;
    }

    .social-media i {
        height: 25px;
        width: 25px;
        margin: 20px 10px;
        padding: 4px;
        color: #fff;
        transition: 0.5s;
    }

    .social-media i:hover {
        transform: scale(1.5);
    }

    .footer-bottom {
        padding: 10px;
        background: #00121b;
        color: #fff;
        font-size: 12px;
        text-align: center;
    }

</style>
<body>
    <div class="onfooter">
        <a href="Login(R).php" target="_blank">
            <img src="Arrow2.png" class="arrow" alt="">
        </a>
        <form method="post" action="">
            <div class="center-wrap">
                <div class="section">
                    <h2 class="mb-0 pb-3" align="center">Resident Sign Up</h2>
                    <div class="form-text">
                        <p2><strong>First Name : </strong></p2>
                    </div>	
                    <div class="form-group">
                        <input type="text" class="form-style" name="FirstName" placeholder="First Name" required>
                    </div>	
                    <div class="form-text">
                        <p2><strong>Last Name : </strong></p2>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-style" name="LastName" placeholder="Last Name" required>
                    </div>
                    <div class="form-text">
                        <p2><strong>Email Address : </strong></p2>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-style" name="Email" placeholder="Email" required>
                    </div>
                    <div class="form-text">
                        <p2><strong>Phone Number : </strong></p2>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-style" name="Phone" placeholder="Phone Number" required>
                    </div>
                    <div class="form-text">
                        <p2><strong>Unit : </strong></p2>
                    </div>
                    <div class="form-group-mt-2">
                        <select name="Unit1" class="form-style2" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                        <p2> - </p2>
                        <select name="Unit2" class="form-style2" required>
                            <option value="-1-" >1</option>
                            <option value="-2-">2</option>
                            <option value="-3-">3</option>
                            <option value="-4-">4</option>
                            <option value="-5-">5</option>
                            <option value="-6-">6</option>
                            <option value="-7-">7</option>
                            <option value="-8-">8</option>
                            <option value="-9-">9</option>
                            <option value="-10-">10</option>
                        </select>
                        <p2> - </p2>
                        <select name="Unit3" class="form-style2" required>
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
                    </div>
                    <div class="form-text">
                        <p2><strong>Gender : </strong></p2>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-style" name="Gender" placeholder="Gender" required>
                    </div>
                    <div class="form-text">
                        <p2><strong>Race : </strong></p2>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-style" name="Race" placeholder="Race" required>
                    </div>
                    <div class="form-text">
                        <p2><strong>Religion : </strong></p2>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-style" name="Religion" placeholder="Religion" required>
                    </div>
                    <div class="form-text">
                        <p2><strong>Age : </strong></p2>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-style" name="Age" placeholder="Age" required>
                    </div>
                    <div class="form-text">
                        <p2><strong>Password : </strong></p2>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-style" name="Password" placeholder="Password" required>
                    </div>
                    <input type="submit" name="registerbtn" class="btn mt-4" value="Register">
                    <input type="reset" name="resetbtn" class="btn mt-4" value="Clear All">
                </div>
            </form>
        </div>
        <footer class="fixed_footer">
            <div class="footer">
                <div class="inner-footer">
                    <div class="footer-big">
                        <h1>EcoCity</h1>
                        <p>We build a better life for you. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error quos ad quam pariatur repellat dolorem, quae sunt quasi soluta quia.</p>
                    </div>
                    <div class="footer-items">
                        <h2>Quick Links</h2>
                        <div class="border1" width="100px"></div>
                        <ul>
                        <a href="#">
                            <li>Home</li>
                        </a>
                        <a href="#">
                            <li>Search</li>
                        </a>
                        <a href="#">
                            <li>Contact</li>
                        </a>
                        <a href="#">
                            <li>About</li>
                        </a>
                        </ul>
                    </div>
                    <div class="footer-items">
                        <h2>Contact Us</h2>
                        <div class="border1"></div>
                        <ul>
                        <a href="#">
                            <li>Emaill Address</li>
                        </a>
                        <a href="#">
                            <li>Whatsapp</li>
                        </a>
                        <a href="#">
                            <li>Instagram</li>
                        </a>
                        <a href="#">
                            <li>Facebook</li>
                        </a>
                        </ul>
                    </div>
                    <div class="footer-items">
                        <h2>Our Site</h2>
                        <div class="border1"></div>
                        <ul>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>Address</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>Office Phone Number</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i>Offical Mail</li>
                        </ul>
                        <div class="social-media">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-google-plus-square"></i></a>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                Copyright &copy; MG Tech Company 2023.
                </div>
            </div>              
        </footer>
    </body>
</html>