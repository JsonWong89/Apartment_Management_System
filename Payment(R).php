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

    $residents01 = array();
    if ($result04->num_rows > 0) {
        // Store data of each row in the array
        while ($row = $result04->fetch_assoc()) {
            $residents01[] = $row;
        }
    }
    
    $sql05 = "SELECT * FROM payment_information";
    $result05 = $connection->query($sql05);

    $payments02 = array();
    if ($result05->num_rows > 0) {
        // Store data of each row in the array
        while ($row = $result05->fetch_assoc()) {
            $payments02[] = $row;
        }
    }

    $connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel ='icon' href = 'Logo.jpeg' type="image/icon">
<title>(R)Payment</title>
<head>
  <style>   
    body {
      background-color: #FFDAB9; /* Light Peach color */
      margin: 0; /* Remove default body margin */
      height: 3000px;
      /* padding-bottom: 100px; */
      zoom: 75%;
      overflow-x: hidden;
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

    .qr-image {
      z-index: -1;;
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
      z-index: 2;
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
      margin-right:100px; 
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
      transform: translate(-40%, -90%);
      width: 480px;
      height: 320px;
      background-color: transparent;
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


    h2 {
        transform: translate(39%);
        margin-top: -20px;
        margin-bottom: 100px;
        margin-left: -50px;
    }

    h3 {
        transform: translate(42%);
        margin-top: 150px;
        margin-bottom: 0px;
    }

    h4 {
        transform: translate(44%);
        margin-top: 150px;
        margin-bottom: 0px;
    }


    input[type=text1] {
        width: 100%;
        padding: 40px 0px 12px 0px;
        border-radius: 10px;
        background-color: transparent;
        border: none;
        font-size: 30px;
        text-align: center;
        font-weight: bold;
        color: black;
        margin-left: 0px;
    }

    .id {
        float: center;
        width: 30%;
        margin-top: 45px;
        margin-left: -150px;
    }

    .name {
        float: center;;
        width: 30%;
        margin-top: -285px;
        margin-left: 190px;
    }

    .email {
        float: center;
        width: 30%;
        margin-top: -135px;
        margin-left: 640px;
    }

    .number {
        float: center;
        width: 30%;
        margin-top: -35px;
        margin-left: 1100px;
    }

    .unit {
        float: center;
        width: 30%;
        margin-top: -145px;
        margin-left: 1500px;
    }

    .paymentdeadline {
        float: left;
        width: 30%;
        margin-top: -80px;
        margin-left: 300px;
    }

    .paymentremarks {
        float: left;
        width: 30%;
        margin-top: 80px;
        margin-left: 1150px;
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


    input[type=date], select, textarea {
    width: 70%;
    padding: 40px 0px 12px 12px;
    border: none;
    border-bottom: 2px solid black;
    border-radius: 4px;
    resize: vertical;
    font-size: 22px;
    }

    input[type=date]:focus {
    border: 3px solid #555;
    }

    label {
    padding: 12px;
    display: inline-block;
    text-align: center;
    font-size: 200%;
    }

    input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    float: right;
    margin-top: 40px;
    margin-right: 325px;
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
    margin-top: 760px;
    margin-right: 1050px;
    font-size: 30px;
    }

    input[type=reset]:hover {
    background-color: #45a049;
    }

    .radio1 {
        margin-top: 100px;
        margin-left: 1150px;
        font-size: 26px;
    }

    .radio2 {
        margin-top: -30px;
        margin-left: 800px;
        font-size: 26px;
    }

    .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    margin-left: 100px;
    height: 40px;
    width: 40px;
    background-color: #eee;
    border-radius: 50%;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
    content: "";
    position: absolute;
    display: none;
    }

    .dialog-box {
    display: none;
    position: absolute;
    background-color: #FFFFFF;
    border: 3px solid black;
    padding: 10px;
    border-radius: 50px;
    z-index: 1;
    width: 800px; /* Adjust width as needed */
    height: 600px;
    text-align: center; /* Center the content */
    margin-left: 650px;
    margin-top: 80px;
    }


    /* Show the QR Payment dialog box when the corresponding radio button is checked */
    #qrPaymentDialog {
        display: none;
        height: 1300px;
    }

    /* Show the Online Payment dialog box when the corresponding radio button is checked */
    #onlinePaymentDialog {
        display: none;
        height: 500px;
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

    input[type=file] {
      margin-left: 180px;
      margin-top: 20px;
      font-size: 22px;
    }
   </style>
</head>

<body>
    <img class="background-image" src="https://finance.zohocorp.com/wp-content/uploads/2019/01/payment-service-providers-1-1024x512.png" alt="Background Image">
    <header class="header">
        <div class="header-left">
            <img class="header-left" src="Screenshot 2023-07-07 113345.png" alt="Logo">
            <div class="header-text">ECO CITY</div> 
        </div>
        <div class="header-right">
            <!-- <div class="header-right-text">CONTACT US</div> -->
            <img class="header-right-logo" src="https://lordicon.com/icons/system/solid/46-notification-bell.svg" alt="Logo">
            
            <!-- <img class="header-right-logo-1" src= "360_F_526724825_fEKkOFrsAnTBW3G5Qc9VCZxArl3zWEdT-fotor-bg-remover-20230707132420-fotor-bg-remover-20230707132621.png" alt="Logo"> -->
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
            <li><a href="UserProfile(R).php" >User Profile</a></li>
            <hr>
            <li><a href="#">Statistcs</a></li>
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
            <br>
          </ul>
        </div>
    </header>

    <header class="content">
        <div class="rounded-rectangle-upper">
            <h1 style="word-spacing: 5px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-size: 50px; line-height: 1cm;">PAYMENT</h1>
            <p style="font-weight: bold; font-family: serif; font-size: 180%; line-height: 0">A place where resident can pay</p>
            <p style="font-weight: bold; font-family: serif; font-size: 180%; line-height: 0">the latest maintenance fees</p>
        </div>
    </header> 

    <h2 style="font-family: serif; font-size: 280%; font-weight: bold; line-height: 0;">Resident's Personal Information</h2>

    <header>
        <form method="post" action="PaymentInformationPost1.php" enctype="multipart/form-data" onsubmit="return validateForm()">
            <?php foreach($residents01 as $resident01): ?>
                <div class="container">
                <div class="row">
                    <div class="id">
                    <p style="margin-top: 150px; margin-left: 270px; font-size: 26px;">Resident Id:</p>
                    <input type="text1" id="id" name="id" value = "<?php echo htmlspecialchars($resident01['Resident_Id']); ?>" placeholder="Name*">
                    </div>
                </div>

                <div class="row">
                    <div class="name">
                    <p style="margin-top: 150px; margin-left: 270px; font-size: 26px;">Name:</p>
                    <input type="text1" id="name" name="name" value = "<?php echo htmlspecialchars($resident01['First_Name']). ' ' . $resident01['Last_Name']; ?>" placeholder="Name*">
                    </div>
                </div>

                <div class="row">
                    <div class="email">
                    <p style="margin-top: -60px; margin-left: 220px; font-size: 26px;">Email Address:</p>
                    <input type="text1" id="email" name="email" value = "<?php echo htmlspecialchars($resident01['Email_Address']); ?>" placeholder="Email address*">
                    </div>
                </div>
                
                <div class="row">
                    <div class="number">
                    <p style="margin-top: -150px; margin-left: 210px; font-size: 26px;">Telephone Number:</p>
                    <input type="text1" id="number" name="number" value = "<?php echo htmlspecialchars($resident01['Telephone_Number']); ?>" placeholder="Telephone number*">
                    </div>
                </div>

                <div class="row">
                    <div class="unit">
                    <p style="margin-top: -10px; margin-left: 280px; font-size: 26px;">Unit:</p>
                    <input type="text1" id="unit" name="unit" value = "<?php echo htmlspecialchars($resident01['Unit']); ?>" placeholder="Unit*">
                    </div>
                </div>
                </div>
            <?php endforeach; ?>

            <h3 style="font-family: serif; font-size: 280%; font-weight: bold; line-height: 0;">Payment Information</h3>

            <?php foreach($payments02 as $payment02): ?>
                <div class="container">
                <div class="row">
                    <div class="paymentremarks">
                    <p style="margin-top: 70px; margin-left: -635px; font-size: 26px;">Payment Deadline:</p>
                    <input type="text1" id="paymentremarks" name="paymentremarks" value = "<?php echo htmlspecialchars($payment02['Remarks']); ?>" placeholder="Payment Remarks*">
                    </div>
                </div>

                <div class="row">
                    <div class="paymentdeadline">
                    <p style="margin-top: -90px; margin-left: 1110px; font-size: 26px;">Payment Remarks:</p>
                    <input type="text1" id="paymentdeadline" name="paymentdeadline" value = "<?php echo htmlspecialchars($payment02['Deadline']); ?>" placeholder="Payment Deadline*">
                    </div>
                </div>
                </div>
            <?php endforeach; ?>

            <h4 style="font-family: serif; font-size: 280%; font-weight: bold; line-height: 0;">Payment Method</h4>


            <div class="row">
                <div class="radio1">QR Payment
                    <input type="radio" id="radio1" name="paymentmethod" value="QR Payment">
                    <span class="checkmark"></span>
                </div>
                <div class="dialog-box" id="qrPaymentDialog">
                    <?php foreach($residents01 as $resident01): ?>
                        <p style="margin-top: 30px; margin-bottom: 10px; margin-left: 20px; font-size: 26px;">Balance Amount:</p>
                        <input type="text1" id="balance" name="balance" value = "<?php echo htmlspecialchars($resident01['Balance_Amount']); ?>" placeholder="Balance Amount*">
                    <?php endforeach; ?>
                    <?php foreach($payments02 as $payment02): ?>
                        <p style="margin-top: 30px; margin-bottom: 10px; margin-left: 20px; font-size: 26px;">Payment Fees:</p>
                        <input type="text1" id="paymentfees" name="paymentfees" value = "<?php echo htmlspecialchars($payment02['Fees']); ?>" placeholder="Payment Fees*">
                    <?php endforeach; ?>
                    <img class="qr-image" height="700px" style="margin-left: 20px;" src="https://donate.sols247.org/wp-content/uploads/2022/01/duitnow-qr-code-sols247.png" alt="qrImage">
                    <p style="font-size: 24px; line-height: 0; margin-left: 30px;">Please upload the payment receipt</p>
                    <input type="file" id="myFile" name="filename"  accept="image/*">
                    <input type="submit" name="submit2" id="submit2" value="Submit">
                </div>
            </div>

            <div class="row">
                <div class="radio2">Online Payment
                    <input type="radio" id="radio2" name="paymentmethod" value="Online Payment">
                    <span class="checkmark"></span>
                </div>
                <div class="dialog-box" id="onlinePaymentDialog">
                    <?php foreach($residents01 as $resident01): ?>
                        <p style="margin-top: 30px; margin-bottom: 10px; margin-left: 30px; font-size: 26px;">In Account Balance Amount:</p>
                        <input type="text1" id="balance" name="balance" value = "<?php echo htmlspecialchars($resident01['Balance_Amount']); ?>" placeholder="Balance Amount*">
                    <?php endforeach; ?>
                    <?php foreach($payments02 as $payment02): ?>
                        <p style="margin-top: 30px; margin-bottom: 10px; margin-left: 20px; font-size: 26px;">Payment Fees:</p>
                        <input type="text1" id="paymentfees" name="paymentfees" value = "<?php echo htmlspecialchars($payment02['Fees']); ?>" placeholder="Payment Fees*">
                    <?php endforeach; ?>
                    <input style="width: 150px; margin-right: 322px;" type="submit" name="submit1" id="submit1" value="Pay">
                </div>
            </div>
        </form>
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
      // Get references to the radio buttons and dialog boxes
      const radioQr = document.getElementById('radio1');
      const radioOnline = document.getElementById('radio2');
      const qrPaymentDialog = document.getElementById('qrPaymentDialog');
      const onlinePaymentDialog = document.getElementById('onlinePaymentDialog');

      radioQr.addEventListener('click', () => {
          if (radioQr.checked) {
          qrPaymentDialog.style.display = 'block';
          onlinePaymentDialog.style.display = 'none';
          }
      });

      radioOnline.addEventListener('click', () => {
          if (radioOnline.checked) {
          qrPaymentDialog.style.display = 'none';
          onlinePaymentDialog.style.display = 'block';
          }
      });
    </script>

    <script>
      function validateForm() {
          var radio1 = document.getElementById("radio1");
          var paymentimage = document.getElementById("myFile").value;

          if (radio1.checked && paymentimage === "") {
              alert("Please upload payment image.");
              return false; // Prevent form submission
          }
          
          return true; // Allow form submission
      }
    </script>
</body>
</html>
