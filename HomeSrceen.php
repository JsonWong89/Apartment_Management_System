<?php
    // $host = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "eco_city";
    
    // // Create connection
    // $conn = new mysqli($host, $username, $password, $dbname);
    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // $sql01 = "SELECT * FROM public_notices";
    // $result01 = $conn->query($sql01);

    // $notices01 = array();
    // if ($result01->num_rows > 0) {
    //     // Store data of each row in the array
    //     while ($row = $result01->fetch_assoc()) {
    //         $notices01[] = $row;
    //     }
    // }
    

    // $sql02 = "SELECT * FROM access_card";
    // $result02 = $conn->query($sql02);
 
    // $cards02 = array();
    // if ($result02->num_rows > 0) {
    //     // Store data of each row in the array
    //     while ($row = $result02->fetch_assoc()) {
    //         $cards02[] = $row;
    //     }
    // }

    // $sql03 = "SELECT * FROM payment_information";
    // $result03 = $conn->query($sql03);
 
    // $paymentinformations03 = array();
    // if ($result03->num_rows > 0) {
    //     // Store data of each row in the array
    //     while ($row = $result03->fetch_assoc()) {
    //         $paymentinformations03[] = $row;
    //     }
    // }

    // $combined_notifications = array_merge($notices01, $cards02);

    // // Sort the combined array based on the 'created_at' timestamp in descending order
    // usort($combined_notifications, function($a, $b) {
    //     return strtotime($b['Created_At']) - strtotime($a['Created_At']);
    // });
        
    // $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>   
    body {
      background-color: #FFDAB9; /* Light Peach color */
      margin: 0; /* Remove default body margin */
      height: 2000px;
      user-zoom: 75%;
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

    .header-right {
        display: flex;
        align-items: center;
        position: relative; 
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
        cursor: pointer;
    }

    .header-right-logo-1 {
        height: 50px;
        margin-right: 100px;
        border-radius: 100%;
        background-color: #d0d0d0;
    }

    .rounded-rectangle-upper {
      position: absolute;
      top: 50%; 
      left: 50%;
      transform: translate(-195%, -70%);
      width: 500px;
      height: 150px;
      background-color: #D3D3D3;
      opacity: 90%;
      border-radius: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .content {
      margin-top: 80px; /* Add initial margin to the content to account for the fixed header */
      padding: 20px;
      transition: margin-top 0.3s ease; /* Add transition effect for smooth scrolling */
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

    .notification-dropdown {
        position: absolute;
        top: 120%;
        right: 0;
        margin-right: 25px;
        margin-top: 15px;
        width: 475px;
        height: 700px;
        background-color: #ffffff;
        border-radius: 30px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        display: none; /* Hide the dropdown by default */
        overflow-y: auto;
    }

    .notification-dropdown a {
        text-decoration: none; /* Remove underline from all anchor tags inside notification-dropdown */
    }

    .notification-dropdown.open {
        display: block; /* Show the dropdown when it has the "open" class */
    }

    .notification-dropdown ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .notification-dropdown li {
        padding: 40px;
        border-bottom: 4px solid black;
    }

    .notification-dropdown li:hover {
        background-color: #f2f2f2; /* Change this to the desired darkened color */
        cursor: pointer;
    }

    .notification-badge {
        position: absolute;
        top: -5px;
        right: 170px;
        background-color: red;
        color: white;
        font-size: 15px;
        padding: 8px 15px;
        border-radius: 50%;
        z-index: 1;
    }
   </style>
</head>

<body>
    <header class="header">
        <div class="header-left">
            <img class="header-left" src="Screenshot 2023-07-07 113345.png" alt="Logo">
            <div class="header-text">ECO CITY (RESIDENT)</div> 
        </div>
        <div class="header-right">
            <div class="header-right-text">CONTACT US</div>
                <div class="notification-wrapper" onclick="toggleNotificationDropdown()" data-messagecount="0">
                <div class="notification-badge" id="notification-badge"></div>
                <img class="header-right-logo" src="https://lordicon.com/icons/system/solid/46-notification-bell.svg" alt="Notification Bell">
                <!-- Add the dropdown list for notifications -->
                <div class="notification-dropdown">
                    <ul>
                    <?php foreach ($combined_notifications as $notification) { ?>
                        <li>
                            <?php if (isset($notification['Notice_Title'])) { ?>
                                <a href="http://localhost/publicnotices/PublicNotices%20(Resident).php">
                                    <span style='font-size: 50px; margin-left: -30px;'>&#128226;</span>
                                    <div style='font-size: 30px; font-weight: bold; margin-top: -70px; margin-left: 50px;'>A new public notice is posted!</div>
                                </a>
                            <?php } elseif ($notification['Status'] === 'Pending...') { ?>
                                <span style='font-size: 50px; margin-left: -30px;'>&#10071;</span>
                                <div style='font-size: 30px; color: black; font-weight: bold; margin-top: -70px; margin-left: 50px;'>Access card request submitted successfully!</div>
                            <?php } elseif ($notification['Status'] === 'Approved') { ?>
                                <span style='font-size: 50px; margin-left: -30px;'>&#10071;</span>
                                <div style='font-size: 30px; color: black; font-weight: bold; margin-top: -70px; margin-left: 50px;'>Access card request approved!</div>
                            <?php } elseif ($notification['Status'] === 'Rejected') { ?>
                                <span style='font-size: 50px; margin-left: -30px;'>&#10071;</span>
                                <div style='font-size: 30px; color: black; font-weight: bold; margin-top: -70px; margin-left: 50px;'>Access card request rejected!</div>
                            <?php } ?>
                        </li>
                    <?php } ?>
                    <?php foreach ($paymentinformations03 as $paymentinformation03) { ?>
                      <li>
                        <?php if (isset($paymentinformation03['Payment_Fees'])) { ?>
                            <a href="http://localhost/publicnotices/Payment%20(Resident).php">
                                <span style='font-size: 50px; margin-left: -30px;'>&#128226;</span>
                                <div style='font-size: 30px; font-weight: bold; margin-top: -70px; margin-left: 50px;'>Payment information is updated!</div>
                            </a>
                        <?php } ?>
                      </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <img class="header-right-logo-1" src="360_F_526724825_fEKkOFrsAnTBW3G5Qc9VCZxArl3zWEdT-fotor-bg-remover-20230707132420-fotor-bg-remover-20230707132621.png" alt="Logo">
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
            <li><a href="#">Profile</a></li>
            <li><a href="http://localhost/publicnotices/AccessCard%20(Resident).php">Access Card</a></li>
            <li><a href="#">Booking Timetable</a></li>
            <li><a href="http://localhost/publicnotices/Payment%20(Resident).php">Payment</a></li>
            <li><a href="#">Enquiries</a></li>
            <li><a href="http://localhost/publicnotices/PublicNotices%20(Resident).php">Public Notices</a></li>
          </ul>
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
        // Get the notification bell icon, the notification badge, and the notification dropdown
        var notificationIcon = document.querySelector(".header-right-logo");
        var notificationBadge = document.getElementById("notification-badge");
        var notificationDropdown = document.querySelector(".notification-dropdown");

        // Define a function to toggle the notification dropdown
        function toggleNotificationDropdown() {
            // Toggle the visibility of the notification dropdown
            notificationDropdown.classList.toggle("open");

            // Update the badge content based on the number of notifications
            var messageCount = notificationDropdown.querySelectorAll("li").length;
            notificationBadge.textContent = "0";
        }

        // Close the notification dropdown when clicking outside of it
        window.addEventListener('click', function (event) {
            if (!notificationIcon.contains(event.target) && !notificationDropdown.contains(event.target)) {
                notificationDropdown.classList.remove("open");
            }
        });

        // Set the initial message count when the page loads (if you have any initial notifications)
        document.addEventListener("DOMContentLoaded", function () {
            var initialMessageCount = notificationDropdown.querySelectorAll("li").length;
            notificationBadge.textContent = initialMessageCount ;
        });
    </script>
</body>
</html>