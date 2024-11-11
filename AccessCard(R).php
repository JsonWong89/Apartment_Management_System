<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";
    
    // Create connection
    $connection = new mysqli($host, $username, $password, $dbname);
    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql04 = "SELECT * FROM residents_table WHERE Login = 'Yes'";
    $result04 = $connection->query($sql04);

    $residents04 = array();
    if ($result04->num_rows > 0) {
        // Store data of each row in the array
        while ($row = $result04->fetch_assoc()) {
            $residents04[] = $row;
        }
    }
    
    $sqlA01 = "SELECT * FROM public_notices WHERE Notice_Number = 1";
    $resultA01 = $connection->query($sqlA01);
  
    $noticesA01 = array();
    if ($resultA01->num_rows > 0) {
        // Store data of each row in the array
        while ($row = $resultA01->fetch_assoc()) {
            $noticesA01[] = $row;
        }
    }
  
    $sqlA02 = "SELECT * FROM public_notices WHERE Notice_Number = 2";
    $resultA02 = $connection->query($sqlA02);
  
    $noticesA02 = array();
    if ($resultA02->num_rows > 0) {
        // Store data of each row in the array
        while ($row = $resultA02->fetch_assoc()) {
            $noticesA02[] = $row;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
  <title>(R)Access Card</title>
  <style>   
    body {
      background-color: #FFDAB9; /* Light Peach color */
      margin: 0; /* Remove default body margin */
      height: 2000px;
      zoom: 75%;
      overflow-x: hidden;
    }   

    .background-image {
      position: relative;
      top: 0;
      left: 0;
      width: 100%;
      height: 570px;
      opacity: 0.8;
      z-index: -1;
      object-fit: cover;
    }

    .image1 {
        position: fixed ;
        height: 200px;
        transform: translate(-350%, 0%);
        border-radius: 100px;
        float: left;
    }

    .header {
      background-color: #d0d0d0; /* Light Grey color */
      padding: 2px 0px 2px 20px;
      width: 100%;
      height: 10%;
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
      color: #000;
    }

    .header-right {
      display: flex;
      align-items: center;
      margin-right: 100px;
    }

    .header-right a{
      text-decoration: none;
      color: #000;
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
      margin-right:10px; 
      border-radius: 100%;
      background-color: #d0d0d0;
    }

    .header-right-logo-1 {
      height: 50px;
      margin-right: 100px;
      border-radius: 100%;
      background-color: #d0d0d0;
    }

    /* Dropdown Button */
    .dropbtn {
      background-color: rgba(0, 0, 0, 0);
      color: white;
      /* padding: 16px; */
      font-size: 16px;
      align-items: top 50px;
      border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
      position: relative;
      display: inline-block;
      border-radius: 4px;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
      display: none;
      position: absolute;
      left: -50px;
      min-width: 160px;
      background: #00b300;
      border-radius: 4px;
      box-shadow: 0px 8px 16px 10px rgba(205, 18, 18, 0.4);
      z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
      color: black;
      padding: 12px 4px;
      text-decoration: none;
      display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
      background-color: #ddd;
      border-radius: 4px;
    } 

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
      display: block;
      border-radius: 4px;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
      background-color: #acacac;
      border-radius: 4px;
    }

    .dropdown-text p {
      font-size: 20px;
      display: block;
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
      top: 50px;
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
      top: 9px;
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
      top: 76px;
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
      padding:25px; /* Increase this value to make more spacing between items */
      /* border-bottom:1px solid white; Add a bottom border for each item */
      text-align: center;
    }

    /* Add some margin-left to the first menu item */
    .menu ul li:first-child {
      margin-left:0px; /* Adjust this value as you like */
    }

    .menu ul li a {
      text-decoration:none; /* Remove underline */
      color:white; /* Set text color */
      font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
      font-size:28px; /* Increase this value to make bigger font size */
      margin-bottom: 20px;
    }

    .menu ul li a:hover {
      color:white; /* Change text color on hover */
    }


    h1 {
        transform: translate(4.8%, -1200%);
        letter-spacing: 0.2cm;
    }

    h2 {
        transform: translate(4%, -1200%);
        letter-spacing: 0.2cm;
    }

    h3 {
        transform: translate(39%);
        margin-top: -120px;
    }

    h4 {
        transform: translate(40%);
    } 

    .rounded-rectangle-upper {
      position: absolute;
      top: 50%; 
      left: 50%;
      transform: translate(-195%, -70%);
      width: 500px;
      height: 170px;
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

    input[type=text], select, textarea {
        width: 70%;
        padding: 40px 0px 12px 12px;
        border: none;
        border-bottom: 2px solid black;
        border-radius: 10px;
        resize: vertical;
        font-size: 22px;
    }

    input[type=text]:focus {
       order: 3px solid #555;
    }

    input[type=text1] {
        width: 70%;
        padding: 40px 0px 12px 12px;
        border-radius: 10px;
        font-size: 28px;
        text-align: center;
        font-weight: bold;
        border: none;
        background-color: transparent;
    }


    .col-25 {
        float: left;
        width: 35%;
        margin-top: 15px;
        margin-left: 930px;
    }

    .id {
        float: center;
        width: 30%;
        margin-top: 25px;
        margin-left: -60px;
    }

    .name {
        float: center;
        width: 30%;
        margin-top: -155px;
        margin-left: 290px;
    }

    .email {
        float: center;
        width: 30%;
        margin-top: -85px;
        margin-left: 790px;
    }

    .number {
        float: center;
        width: 30%;
        margin-top: -85px;
        margin-left: 1300px;
    }

    .unit {
        float: center;
        width: 30%;
        margin-top: -145px;
        margin-left: 1630px;
    }

    .row {
        background-color: #fff;
        border: 2px;
    }

    /* Clear floats after the columns */
    .row::after {
        content: "";
        display: table;
        clear: both;
    }

    .reasons-container {
        display: flex;
        justify-content: center; /* Center the checkboxes horizontally */
        margin-top: 50px;
    }

    .reasons-container label {
        margin-top: 50px;
        margin-left: 90px; /* Add some spacing between the checkboxes */
        font-size: 30px;
        font-weight: bold;
    }

    /* Increase the checkbox size */
    .reasons-container input[type="radio"] {
        width: 20px; /* Adjust the width as needed */
        height: 20px; /* Adjust the height as needed */
    }

    .button{
      background-color: #04AA6D;
      color: white;
      padding: 15px 30px;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      float: right;
      margin-top: -65px;
      margin-right: 750px;
      font-size: 30px;
    }

    .button:hover{
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
    margin-top: 100px;
    margin-right: 1050px;
    font-size: 30px;
    }

    input[type=reset]:hover {
    background-color: #45a049;
    }

    textarea {
      width: 1000px;
      height: 100px;
      margin-left: 550px;
      margin-top: 100px;
    }

    .container {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-top: 70px;
      margin-left: 910px;
      cursor: pointer;
      font-size: 28px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
      background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked ~ .checkmark {
      background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
      left: 9px;
      top: 5px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }
   </style>
</head>

<body>
    <img class="background-image" src="https://icpsltd.com/wp-content/uploads/access-cards-1030x618.jpg" alt="Background Image">
    <header class="header">
      <div class="header-left">
        <a href="Homepage(R).php"><img class="header-left" src="Screenshot 2023-07-07 113345.png" alt="Logo"></a>
        <a href="Homepage(R).php"><div class="header-text">ECO CITY</div></a>
      </div>
      <div class="header-right">
        
      </div>
      <div class="icon-wrapper" onclick="toggleMenu()">
        <div class="hamburger"></div>
      </div>
      <div class="menu">
      <ul>
          <li><a href="UserProfile(R).php" >User Profile</a></li>
          <hr>
          <li><a href="AccessCard(R).php">Access Card</a></li>
          <hr>
          <li><a href="BookingForm(R).php">Booking Timetable</a></li>
          <hr>
          <li><a href="Payment(R).php"  >Payment</a></li>
          <hr>
          <li><a href="Enquiry(R).php"  >Enquiries</a></li>
          <hr>
          <li><a href="PublicNotices(R).php"  >Public Notices</a></li>
          <hr>
          <li><a href="Homepage(G).php" <?php session_destroy() ?> >Logout</a></li>
          <br>
        </ul>
      </div>
    </header>
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

    <h1 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: #FFFFFF  ; font-size: 60px; line-height: 1cm;">ACCESS CARD</h1>
    <h2 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: #FFFFFF  ; font-size: 60px; line-height: 1cm;">REQUEST FORM</h2>
    <h3 style="font-family: serif; font-size: 280%; font-weight: bold; line-height: 0;">Resident's Personal Information</h3>

    <div class="content">
        <div class="rounded-rectangle-upper">
            <p style="font-family: serif; font-size: 180%; font-weight: bold; line-height: 0">A card that grant authorized</p>
            <p style="font-family: serif; font-size: 180%; font-weight: bold; line-height: 0">individuals secure and convenient</p>
            <p style="font-family: serif; font-size: 180%; font-weight: bold; line-height: 0">entry into the condominium.</p>   
        </div>      
      </div> 

    <div class="content">
      <form method="post" action="AccessCardPost.php" onsubmit="return validateForm()">
      <?php foreach($residents04 as $resident04): ?>
        <div class="container1">
          <div class="row">
            <div class="id">
            <p style="margin-top: 0px; margin-left: 190px; font-size: 26px;">Resident Id:</p>
              <input type="text1" id="id" name="id" value = "<?php echo htmlspecialchars($resident04['Resident_Id']); ?>" placeholder="Resident Id">
            </div>
          </div>

          <div class="row">
            <div class="name">
              <p style="margin-top: 20px; margin-left: 190px; font-size: 26px;">Name:</p>
              <input type="text1" id="name" name="name" value = "<?php echo htmlspecialchars($resident04['First_Name']). ' ' . $resident04['Last_Name']; ?>" placeholder="Name*">
            </div>
          </div>

          <div class="row">
            <div class="email">
            <p style="margin-top: -140px; margin-left: 150px; font-size: 26px;">Email Address:</p>
              <input type="text1" id="email" name="email" value = "<?php echo htmlspecialchars($resident04['Email_Address']); ?>" placeholder="Email address*">
            </div>
          </div>
          
          <div class="row">
            <div class="number">
            <p style="margin-top: -145px; margin-left: 120px; font-size: 26px;">Telephone Number:</p>
              <input type="text1" id="number" name="number" value = "<?php echo htmlspecialchars($resident04['Telephone_Number']); ?>" placeholder="Telephone number*">
            </div>
          </div>

          <div class="row">
            <div class="unit">
            <p style="margin-top: 0px; margin-left: 200px; font-size: 26px;">Unit:</p>
              <input type="text1" id="unit" name="unit" value = "<?php echo htmlspecialchars($resident04['Unit']); ?>" placeholder="Unit*">
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php $connection->close();?>

        <br>
        <br>
        <br>

        <h4 style="font-family: serif; font-size: 270%; font-weight: bold; line-height: 2;">Reason(s) for Access Card</h4>
    
        <div class="reasons-container">
          <label>
              <input type="radio" name="reason" id="reason" value="Lost">
              Lost
          </label>
          <label>
              <input type="radio" name="reason" id="reason" value="Damage">
              Damage
          </label>
          <label>
              <input type="radio" name="reason" id="reason" value="Stolen">
              Stolen
          </label>
          <label>
              <input type="radio" name="reason" id="reason" value="New Starter">
              New Starter
          </label>
          <label>
              <input type="radio" name="reason" id="reason" value="Malfunction">
              Malfunction
          </label>
        </div>

        <div>
          <textarea id="description" name="description" placeholder="Descriptions"></textarea>
          <label class="container">Terms & Conditions
            <input type="checkbox" id="tnc">
            <span class="checkmark"></span>
          </label>
          <input type="reset" name="reset" id="reset" value="Reset">  
          <button class = "button" type="submit" name="submit" id="submit" value="Submit">Submit</button>
        </div>

      </form>
    </div>
    
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
      // Get the "content" element by its ID
      var element = document.getElementById('content');
      window.addEventListener('scroll', function() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        element.style.transform = 'translate(0%, ' + (scrollTop / 2) + 'px)';
      });
    </script>

    <script>
      function validateForm() {
        var reason = document.getElementById("reason").value;
        var description = document.getElementById("description").value;
        const tncCheckbox = document.getElementById('tnc');
        const submitButton = document.getElementById('submit');

        if (reason === "" || description === "") {
          alert("Please fill out all the required fields.");
          return false; // Prevent form submission
        }

        tncCheckbox.addEventListener('change', () => {
          if (!tncCheckbox.checked) {
            submitButton.disabled = true;
          } else {
            submitButton.disabled = false;
          }
        });
        return tncCheckbox.checked;
      }
    </script>

</body>
</html> 
