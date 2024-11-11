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
    } else {
        $sql = "SELECT * FROM payment WHERE Payment_Method = 'QR Payment'"; 
        $result = $conn->query($sql);

        $payments = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $payments[] = $row;
            }
        }
    }

    $conn->close();
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
      transform: translate(-40%, -70%);
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

    h1 {
        transform: translate(43.5%, -1000%);
        letter-spacing: 0.2cm;
    }

    h2 {
        transform: translate(40.5%, -1000%);
        letter-spacing: 0.2cm;
    }

    table {
    border-collapse: collapse;
    margin-left: 50px;
    margin-top: -200px;
    width: 95%;
    }

    th {
    font-size: 23px;
    color: black;
    width: 150px; 
    height: 80px;
    font-weight: BOLD;
    border-bottom: 3px solid black;
    background-color: #FFFFFF;
    }

    td {
    font-size: 22px;
    color: black;
    width: 100px; 
    height: 90px;
    background-color: #FFFFFF;
    text-align:center;
    }

    .button {
        font-size: 20px; /* Increase the font size for the buttons */
        width: 120px; /* Increase the width of the buttons */
        height: 40px; /* Increase the height of the buttons */
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .modal1 {
    display: none; /* Hidden by default */
    position: flex; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    transform: translate(0%, -40%);
    }

    /* Modal Content */
    .modal1-content {
    background-color: #fefefe;
    margin-top: 200px;
    margin-left: 680px;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
    height: 20%;
    border-radius: 50px;
    }

    .modal2 {
    display: none; /* Hidden by default */
    position: flex; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    transform: translate(0%, -40%);
    }

    /* Modal Content */
    .modal2-content {
    background-color: #fefefe;
    margin-top: 200px;
    margin-left: 680px;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
    height: 20%;
    border-radius: 50px;
    }

    /* The Close Button */
    .close {
    color: #aaaaaa;
    float: right;
    font-size: 50px;
    font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    }

    .zoomable-image {
        cursor: pointer;
        max-width: 100%;
        transition: transform 0.3s;
    }

    .zoomable-image.zoomed {
        transform: scale(4); /* Change the scale value for desired zoom level */
        border: 3px solid black;
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

    <h1 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: #000000  ; font-size: 50px; line-height: 1cm;">RESIDENTS QR</h1>
    <h2 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: #000000  ; font-size: 50px; line-height: 1cm;">PAYMENT REQUESTS</h2>

    <header class="content">
        <div class="rounded-rectangle-upper">
            <p style="font-weight: bold; font-family: serif; font-size: 180%; line-height: 0">For admin to either </p>
            <p style="font-weight: bold; font-family: serif; font-size: 180%; line-height: 0">approve or reject payment requests</p>
        </div>
    </header>

    <table>
        <thead>
            <tr>
                <th>Payment Id</th>
                <th>Resident Name</th>
                <th>Unit</th>
                <th>Fees</th>
                <th>Method</th>
                <th>QR Payment Image</th>
                <th>Date</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($payments as $index => $payment): ?>
                <tr data-id="<?php echo htmlspecialchars($payment['Payment_Id']); ?>">
                <td><?php echo htmlspecialchars($payment['Payment_Id']); ?></td>
                    <td><?php echo htmlspecialchars($payment['Resident_Name']); ?></td>
                    <td><?php echo htmlspecialchars($payment['Unit']); ?></td>
                    <td><?php echo htmlspecialchars($payment['Payment_Fees']); ?></td>
                    <td><?php echo htmlspecialchars($payment['Payment_Method']); ?></td>    
                    <td><a href="data:image/jpeg;base64, <?php echo base64_encode($payment['Payment_Image']); ?>" target="_blank">Link</a></td> 
                    <td><?php echo htmlspecialchars($payment['Payment_Date']); ?></td>
                    <td><?php echo htmlspecialchars($payment['Payment_Deadline']); ?></td>
                    <td><?php echo htmlspecialchars($payment['Payment_Status']); ?></td>
                    <td>
                        <?php if ($payment['Payment_Status'] === 'Approved' || $payment['Payment_Status'] === 'Rejected'): ?>
                          <!-- If the status is already Approved or Rejected, disable the buttons -->
                          <button id="approvebutton_<?php echo $index; ?>" type="submit" disabled name="status" value="Approved" class="button approve-button">Approve</button>
                          <button id="rejectbutton_<?php echo $index; ?>" type="submit" disabled name="status" value="Rejected" class="button reject-button">Reject</button>
                        <?php else: ?>
                            <form action="PaymentInformationUpdate1.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="payment_id" value="<?php echo htmlspecialchars($payment['Payment_Id']); ?>">
                                <button id="approvebutton_<?php echo $index; ?>" type="submit" name="status" value="Approved" class="button approve-button">Approve</button>
                                <button id="rejectbutton_<?php echo $index; ?>"type="submit" name="status" value="Rejected" class="button reject-button">Reject</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>

                <!-- The Modal -->
                <div id="myModal1_<?php echo $index; ?>" class="modal1">
                    <!-- Modal content -->
                    <div class="modal1-content">
                        <span style='font-size:80px; margin-left: 250px;'>&#9989</span>
                        <span class="close">&times;</span>
                        <h3 style="font-size: 50px; transform: translate(29%, 20%);">Approved !</h1>
                    </div>
                </div>

                <!-- The Modal -->
                <div id="myModal2_<?php echo $index; ?>" class="modal2">
                    <!-- Modal content -->
                    <div class="modal2-content">
                        <span style='font-size:80px; margin-left: 250px;'>&#10060</span>
                        <span class="close">&times;</span>
                        <h3 style="font-size: 50px; transform: translate(29%, 20%);">Rejected !</h1>
                    </div>
                </div>

                <script>
                  var btn1_<?php echo $index; ?> = document.getElementById("approvebutton_<?php echo $index; ?>");
                  var modal1_<?php echo $index; ?> = document.getElementById("myModal1_<?php echo $index; ?>");
                  var span1_<?php echo $index; ?> = modal1_<?php echo $index; ?>.getElementsByClassName("close")[0];

                  var btn2_<?php echo $index; ?> = document.getElementById("rejectbutton_<?php echo $index; ?>");
                  var modal2_<?php echo $index; ?> = document.getElementById("myModal2_<?php echo $index; ?>");
                  var span2_<?php echo $index; ?> = modal2_<?php echo $index; ?>.getElementsByClassName("close")[0];

                  btn1_<?php echo $index; ?>.onclick = function() {
                    modal1_<?php echo $index; ?>.style.display = "block";
                  };

                  span1_<?php echo $index; ?>.onclick = function() {
                    modal1_<?php echo $index; ?>.style.display = "none";
                  };

                  btn2_<?php echo $index; ?>.onclick = function() {
                    modal2_<?php echo $index; ?>.style.display = "block";
                  };

                  span2_<?php echo $index; ?>.onclick = function() {
                    modal2_<?php echo $index; ?>.style.display = "none";
                  };

                  window.onclick = function(event) {
                    if (event.target == modal1_<?php echo $index; ?>) {
                      modal1_<?php echo $index; ?>.style.display = "none";
                    }
                    if (event.target == modal2_<?php echo $index; ?>) {
                      modal2_<?php echo $index; ?>.style.display = "none";
                    }
                  };
                </script>
            <?php endforeach; ?>
        </tbody>       
    </table>

    
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
        // Get all the approve buttons
        var approveButtons = document.querySelectorAll('.approve-button');

        // Loop through each approve button and add a click event listener
        approveButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default form submission behavior
                var paymentId = button.form.querySelector('input[name="payment_id"]').value;
                updateStatus(paymentId, 'Approved', button);
            });
        });

        // Get all the reject buttons
        var rejectButtons = document.querySelectorAll('.reject-button');

        // Loop through each reject button and add a click event listener
        rejectButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default form submission behavior
                var paymentId = button.form.querySelector('input[name="payment_id"]').value;
                updateStatus(paymentId, 'Rejected', button);
            });
        });
    </script>

    <script>
        function updateStatus(paymentId, status, button) {
            // Disable the button to prevent multiple clicks
            button.disabled = true;

            // Send an AJAX request to the server
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    // Re-enable the button regardless of success or failure
                    button.disabled = false;

                    if (this.status == 200 && this.responseText.trim() === 'Success') {
                        // Update the status in the current table cell
                        var statusCell = document.querySelector('tr[data-id="' + paymentId + '"] td:nth-child(8)');
                        if (statusCell) {
                            statusCell.textContent = status;
                        }
                    } else {
                        // Display an error message (optional)
                        console.error("Failed to update status.");
                    }
                }
            };
            xhttp.open("POST", "PaymentInformationUpdate1.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("payment_id=" + paymentId + "&status=" + status);
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var zoomableImages = document.querySelectorAll(".zoomable-image");

            zoomableImages.forEach(function(image) {
                image.addEventListener("click", function() {
                    image.classList.toggle("zoomed");
                });
            });
        });
    </script>
</body>
</html>
