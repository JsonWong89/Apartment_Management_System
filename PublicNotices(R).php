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

    $sqlA01 = "SELECT * FROM public_notices WHERE Notice_Number = 1";
    $resultA01 = $conn->query($sqlA01);

    $noticesA01 = array();
    if ($resultA01->num_rows > 0) {
        // Store data of each row in the array
        while ($row = $resultA01->fetch_assoc()) {
            $noticesA01[] = $row;
        }
    }
    

    $sqlA02 = "SELECT * FROM public_notices WHERE Notice_Number = 2";
    $resultA02 = $conn->query($sqlA02);
 
    $noticesA02 = array();
    if ($resultA02->num_rows > 0) {
        // Store data of each row in the array
        while ($row = $resultA02->fetch_assoc()) {
            $noticesA02[] = $row;
        }
    }

 
    $sqlA03 = "SELECT * FROM public_notices WHERE Notice_Number = 3";
    $resultA03 = $conn->query($sqlA03);
    
    $noticesA03 = array();
    if ($resultA03->num_rows > 0) {
        // Store data of each row in the array
        while ($row = $resultA03->fetch_assoc()) {
            $noticesA03[] = $row;
        }
    }

    $sqlA04 = "SELECT * FROM public_notices WHERE Notice_Number = 4";
    $resultA04 = $conn->query($sqlA04);
    
    $noticesA04 = array();
    if ($resultA04->num_rows > 0) {
        // Store data of each row in the array
        while ($row = $resultA04->fetch_assoc()) {
            $noticesA04[] = $row;
        }
    }
    
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel ='icon' href = 'Logo.jpeg' type="image/icon">
<title>R.Pulic Notice</title>
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
        position: fixed ;
        width: 200px;
        height: 200px;
        transform: translate(-200%, 0%);
        border-radius: 100px;
        float: left;
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

    .rounded-rectangle-one {
      top: 50%; 
      left: 50%;
      transform: translate(50%, 10%);
      width: 1150px;
      height: 200px;
      background-color: #FFFFFF;
      border-radius: 50px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
    }

    .rounded-rectangle-two {
      top: 50%; 
      left: 50%;
      transform: translate(50%, 50%);
      width: 1150px;
      height: 200px;
      background-color: #FFFFFF;
      border-radius: 50px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
    }

    .rounded-rectangle-three {
      top: 50%; 
      left: 50%;
      transform: translate(50%, 90%);
      width: 1150px;
      height: 200px;    
      background-color: #FFFFFF;
      border-radius: 50px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
    }

    .rounded-rectangle-four {
      top: 50%; 
      left: 50%;
      transform: translate(50%, 130%);
      width: 1150px;
      height: 200px;    
      background-color: #FFFFFF;
      border-radius: 50px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
    }

    .title {
        font-weight: bold;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; 
        font-size: 50px; 
        line-height: 0;
    }

    .text {
        text-align: center; /* Center the text horizontally */
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
        font-size: 22px; 
        line-height: 0;
    }

    .remarks {
        font-family: Arial, Helvetica, sans-serif; 
        font-size: 22px; 
        color: blue; 
        line-height: 0;
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
   </style>
</head>

<body>
    <img class="background-image" src="https://images.unsplash.com/photo-1571992579655-8134e2b8df0b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Background Image">
    <header class="header">
        <div class="header-left">
            <img class="header-left" src="Screenshot 2023-07-07 113345.png" alt="Logo">
            <div class="header-text">ECO CITY</div> 
        </div>
        <div class="header-right">
            <div class="header-right-text">CONTACT US</div>
            <img class="header-right-logo" src="https://lordicon.com/icons/system/solid/46-notification-bell.svg" alt="Logo">
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
            <p style="font-family: serif; font-size: 180%; line-height: 0">A place where you can check the</p>
            <p style="font-family: serif; font-size: 180%; line-height: 0">latest updates or announcements</p>
            <p style="font-family: serif; font-size: 180%; line-height: 0">published by EcoCity's</p>   
            <p style="font-family: serif; font-size: 180%; line-height: 0">management team.</p>
        </div>

          
        <div class="rounded-rectangle-one">
            <?php foreach($noticesA01 as $noticeA01){
                $imageDataEncoded = base64_encode($noticeA01['Notice_Image']);
            ?>
                <img class="image1" src="data:image/jpeg;base64,<?php echo $imageDataEncoded; ?>" alt="image1">
                <h1 class = "title"><?php echo htmlspecialchars($noticeA01['Notice_Title']); ?></h1>
                <p class = "text"><?php echo htmlspecialchars($noticeA01['Notice_Details']); ?></p>
                <p class = "remarks"><a href=<?php echo htmlspecialchars($noticeA01['Notice_Link']); ?>target="_blank"><b>&#10132 Read More</b></a></p>
            <?php } ?>
        </div>

         
        <div class="rounded-rectangle-two">
            <?php foreach($noticesA02 as $noticeA02){
                $imageDataEncoded = base64_encode($noticeA02['Notice_Image']);
            ?>
                <img class="image1" src="data:image/jpeg;base64,<?php echo $imageDataEncoded; ?>" alt="image2">
                <h1 class = "title"><?php echo htmlspecialchars($noticeA02['Notice_Title']); ?></h1>
                <p class = "text"><?php echo htmlspecialchars($noticeA02['Notice_Details']); ?></p>
                <p class = "remarks"><a href=<?php echo htmlspecialchars($noticeA02['Notice_Link']); ?>target="_blank"><b>&#10132 Read More</b></a></p>
            <?php } ?>
        </div>
        

        <div class="rounded-rectangle-three">
            <?php foreach($noticesA03 as $noticeA03){ 
                $imageDataEncoded = base64_encode($noticeA03['Notice_Image']);
            ?>
                <img class="image1" src="data:image/jpeg;base64,<?php echo $imageDataEncoded; ?>" alt="image3">
                <h1 class = "title"><?php echo htmlspecialchars($noticeA03['Notice_Title']); ?></h1>
                <p class = "text"><?php echo htmlspecialchars($noticeA03['Notice_Details']); ?></p>
                <p class = "remarks"><a href=<?php echo htmlspecialchars($noticeA03['Notice_Link']); ?>target="_blank"><b>&#10132 Read More</b></a></p>
            <?php } ?>
        </div>

        <div class="rounded-rectangle-four">
            <?php foreach($noticesA04 as $noticeA04){ 
                $imageDataEncoded = base64_encode($noticeA04['Notice_Image']);
            ?>
                <img class="image1" src="data:image/jpeg;base64,<?php echo $imageDataEncoded; ?>" alt="image4">
                <h1 class = "title"><?php echo htmlspecialchars($noticeA04['Notice_Title']); ?></h1>
                <p class = "text"><?php echo htmlspecialchars($noticeA04['Notice_Details']); ?></p>
                <p class = "remarks"><a href=<?php echo htmlspecialchars($noticeA04['Notice_Link']); ?>target="_blank"><b>&#10132 Read More</b></a></p>
            <?php } ?>
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
</body>
</html>
