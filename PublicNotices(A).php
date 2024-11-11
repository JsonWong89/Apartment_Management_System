<?php 

if(isset($_POST['submit'])){
  header("Location: homepage.php?success=Account create successfully.Try to login");
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel ='icon' href = 'Logo.jpeg' type="image/icon">
<title>(A)Public Notices</title>
<head>
  <style>   
    body {
      background-color: #FFDAB9; /* Light Peach color */
      margin: 0; /* Remove default body margin */
      height: 2000px;
      zoom: 75%;
    }   

    .background-image {
      position: relative;
      top: 0;
      left: 0;
      width: 100%;
      height: 600px;
      opacity: 0.8;
      z-index: -1;
      object-fit: cover;
    }

    .image1 {
        position: relative;
        width: 300px;
        height: 270px;
        transform: translate(-175%, 103%);
        border-radius: 100px;
    }

    .header {
      background-color: #d0d0d0; /* Light Grey color */
      padding: 20px;
      width: 100%;
      height: 6%;
      position: fixed;
      top: 0;
      left: 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      z-index: 1;
    }

    .header-left {
      display: flex;
      align-items: center;
    }
    
    .header-left img {
      height: 60px; /* Adjust the height of the logo as needed */
      margin-right: 20px;
      border-radius: 100%;
    }
    
    .header-text {
      font-weight: bold;
      font-size: 35px;
      font-family: 'Oswald', serif;
      letter-spacing: -0.5px;
    }

    .header-left a {
      text-decoration: none;
    }

    .header-right {
        display: flex;
        align-items: center;
    }

    .header-right-text {
      font-weight: bold;
      font-size: 35px;
      font-family: 'Oswald', serif;
      letter-spacing: -0.5px;
      margin-right: 30px;
    }

    .header-right-logo {
        height: 45px;
        margin-right: 30px;
        border-radius: 100%;
        background-color: #d0d0d0;
    }

    .header-right-logo-1 {
        height: 50px;
        margin-right: 100px;
        border-radius: 100%;
        background-color: #d0d0d0;
    }

    .content {
      margin-top: 80px; /* Add initial margin to the content to account for the fixed header */
      padding: 20px;
      transition: margin-top 0.3s ease; /* Add transition effect for smooth scrolling */
    }

    .rounded-rectangle-upper {
      position: absolute;
      top: 50%; 
      left: 50%;
      transform: translate(85%, -100%);
      width: 480px;
      height: 320px;
      background-color: #FFFFFF;
      border-radius: 100px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    /* Style the hamburger icon */
    .hamburger {
      width: 35px;
      height: 5px;
      background-color: black;
      position: absolute;
      top: 48px;
      right: 50px;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      z-index: 1;
    }

    /* Rotate the icon when the menu is open */
    .hamburger.open {
      transform: rotate(45deg);
    }

    /* Add a middle bar to the icon when the menu is open */
    .hamburger::before {
      content: "";
      width: 35px;
      height: 6px;
      background-color: black;
      position: absolute;
      top: -10px;
      right: 0;
      transition: all 0.3s ease-in-out;
    }

    .hamburger.open::before {
      transform: rotate(90deg);
      top: 0;
    }

    /* Hide the bottom bar of the icon when the menu is open */
    .hamburger::after {
      content: "";
      width: 35px;
      height: 5px;
      background-color: black;
      position: absolute;
      top: 10px;
      right: 0;
      transition: all 0.3s ease-in-out;
    }

    .hamburger.open::after {
      opacity: 0;
    }

    /* Style the icon wrapper */
    .icon-wrapper {
      width:50px; /* Make it wider than the icon */
      height:50px; /* Make it taller than the icon */
      position:absolute; /* Position it relative to the parent element */
      top:0; /* Align it to the top of the parent element */
      right:0; /* Align it to the right of the parent element */
      z-index:1; /* Make it always on top */
    }

    /* Style the menu container */
    .menu {
      width: 420px;
      height: (100%-97px);
      background-color: #575757;
      position: fixed;
      top: 97px;
      right: -420px; /* Hide the menu by default */
      transition: all 0.3s ease-in-out;
      border-radius: 20px;
    }

    /* Show the menu when the icon is clicked */
    .menu.open {
      right:0; /* Move the menu to the right */
    }

    /* Style the menu items */
    .menu ul {
      list-style-type:none; /* Remove bullets */
      margin-top:0px; /* Remove margins */
      padding:0; /* Remove paddings */
    }

    .menu ul li {
      padding:53px; /* Increase this value to make more spacing between items */
      border-bottom:1px solid white; /* Add a bottom border for each item */
    }

    /* Add some margin-left to the first menu item */
    .menu ul li:first-child {
      margin-left:0px; /* Adjust this value as you like */
    }

    .menu ul li a {
      text-decoration:none; /* Remove underline */
      color:white; /* Set text color */
      font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
      font-size:35px; /* Increase this value to make bigger font size */
    }

    .menu ul li a:hover {
      color:white; /* Change text color on hover */
    }

    input[type=text], select, textarea {
    width: 70%;
    padding: 40px 0px 12px 12px;
    border: none;
    border-bottom: 2px solid black;
    border-radius: 4px;
    resize: vertical;
    font-size: 22px;
    }

    input[type=text]:focus {
    border: 3px solid #555;
    }

    input[type=number], select, textarea {
    width: 70%;
    padding: 40px 0px 12px 12px;
    border: none;
    border-bottom: 2px solid black;
    border-radius: 4px;
    resize: vertical;
    font-size: 22px;
    }

    input[type=number]:focus {
    border: 3px solid #555;
    }

    label {
    padding: 12px;
    display: inline-block;
    text-align: center;
    font-size: 200%;
    }

    input[type=file] {
      margin-left: 390px;
      margin-top: 20px;
      font-size: 22px;
    }

    input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    float: right;
    margin-top: -65px;
    margin-right: 773px;
    font-size: 30px;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    input[type=reset] {
    background-color: #04AA6D;
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    float: right;
    margin-top: 60px;
    margin-right: 1050px;
    font-size: 30px;
    }

    input[type=reset]:hover {
    background-color: #45a049;
    }

    .col-25 {
    float: left;
    width: 35%;
    margin-top: 15px;
    margin-left: 930px;
    }

    .col-75 {
    float: left;
    width: 75%;
    margin-top: 10px;
    margin-left: 500px;
    }

    /* Clear floats after the columns */
    .row::after {
    content: "";
    display: table;
    clear: both;
    }
   </style>
</head>

<body>
    <img class="background-image" src="https://images.unsplash.com/photo-1571992579655-8134e2b8df0b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Background Image">
    <header class="header">
        <div class="header-left">
          <a href="Homepage(A).php"><img class="header-left" src="Screenshot 2023-07-07 113345.png" alt="Logo"></a>
          <a href="Homepage(A).php"><div class="header-text">ECO CITY</div></a>
        </div>
        <div class="header-right">
            <div class="header-right-text">CONTACT US</div>
            <img class="header-right-logo" src="https://lordicon.com/icons/system/solid/46-notification-bell.svg" alt="Logo">
            <img class="header-right-logo-1" src= "360_F_526724825_fEKkOFrsAnTBW3G5Qc9VCZxArl3zWEdT-fotor-bg-remover-20230707132420-fotor-bg-remover-20230707132621.png" alt="Logo">
        </div>
        <!-- Create a div element to wrap the hamburger icon -->
        <div class="icon-wrapper" onclick="toggleMenu()">
          <!-- Create a hamburger icon -->
          <div class="hamburger"></div>
        </div>

        <!-- Create a menu container -->
        <div class="menu">
          <!-- Create a list of menu items -->
          <ul>
            <li><a href="#">Statistcs</a></li>
            <li><a href="#">Access Card</a></li>
            <li><a href="#">Booking Timetable</a></li>
            <li><a href="#">Payment</a></li>
            <li><a href="#">Enquiries</a></li>
            <li><a href="#">Public Notices</a></li>
          </ul>
        </div>
    </header>
    <header class="content">
        <div class="rounded-rectangle-upper">
            <h1 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-size: 50px; line-height: 1cm;">NOTICES ROOM</h1>
            <p style="font-family: serif; font-size: 180%; line-height: 0">A place where admin can publish</p>
            <p style="font-family: serif; font-size: 180%; line-height: 0">latest updates or announcements</p>
            <p style="font-family: serif; font-size: 180%; line-height: 0">into the notices.</p>
        </div>
    </header> 
    <header>
        <div class="container">
            <form method="post" action="PublicNoticesPost.php" enctype="multipart/form-data" onsubmit="return validateForm()">
              <div class="row">
                <div class="col-25">
                  <label for="noticenumber"><b>Notice Number</b></label>
                </div>
                <div class="col-75">
                  <input type="number" id="noticenumber" name="noticenumber" max="4" placeholder="Enter notice number...">
                </div>
              </div>
              
              <div class="row">
                <div class="col-25">
                  <label for="noticetitle"><b>Notice Title</b></label>
                </div>
                <div class="col-75">
                  <input type="text" id="noticetitle" name="noticetitle" placeholder="Enter notice title...">
                </div>
              </div>
              
              <div class="row">
                <div class="col-25"> 
                  <label for="noticedetails"><b>Notice Details</b></label>
                </div>
                <div class="col-75">
                  <textarea maxlength="104" id="noticedetails" name="noticedetails" placeholder="Enter notice details..." style="height:200px; padding:5px 10px"></textarea>
                </div>
              </div>  

              <div class="row">
                <div class="col-25"> 
                  <label for="noticelink"><b>Notice Link</b></label>
                </div>
                <div class="col-75">
                  <input type="text" id="noticelink" name="noticelink" placeholder="Insert notice link...">
                </div>

                <div class="col-25"> 
                  <label for="noticeimage"><b>Notice Image</b></label>
                </div>
                <div class="col-75">
                  <form>
                    <input type="file" id="myFile" name="filename"  accept="image/*">
                    <br>
                    <input type="reset" name="reset" id="reset" value="Reset">
                    <br>
                    <input type="submit" name="submit" id="submit" value="Submit">
                  </form>
                </div>
              </div>
        </div>
    </header>
    <script>
    window.addEventListener('scroll', function() {
        var element = document.querySelector('content');
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        element.style.transform = 'translate(0%, ' + (scrollTop / 2) + 'px)';
    });
    </script>
    <script>
    // Get the hamburger icon and the menu container
    var hamburger = document.querySelector(".hamburger");
    var menu = document.querySelector(".menu");
    
    // Define a function to toggle the menu
    function toggleMenu() {
        // Add or remove the open class to the icon and the menu
        hamburger.classList.toggle("open");
        menu.classList.toggle("open");
    }
    </script>

    <script>
      function validateForm() {
          var noticenumber = document.getElementById("noticenumber").value;
          var noticetitle = document.getElementById("noticetitle").value;
          var noticedetails = document.getElementById("noticedetails").value;
          var noticelink = document.getElementById("noticelink").value;
          var myFile = document.getElementById("myFile").value;

          if (noticenumber === "" || noticetitle === "" || noticedetails === "" || noticelink === "" || myFile === "") {
              alert("Please fill out all the required fields.");
              return false; // Prevent form submission
          }
          
          return true; // Allow form submission
      }
    </script>
</body>
</html>
