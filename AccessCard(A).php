<?php
session_start();
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
        // Fetch all columns from the table and store in $requests array
        $sql = "SELECT * FROM access_card"; // Replace 'your_table_name' with the actual table name
        $result = $connection->query($sql);
        $requests = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $requests[] = $row;
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
  <title>(A)Access Card</title>
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
      /* margin-right:100px; */
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
      top: 47px;
      right: 60px;
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
        transform: translate(6.5%, -1100%);
        letter-spacing: 0.2cm;
    }

    h2 {
        transform: translate(8%, -1100%);
        letter-spacing: 0.2cm;
    }

    table {
    border-collapse: collapse;
    margin-left: 50px;
    margin-top: -200px;
    width: 95%;
    z-index: 1;
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
    font-size: 16px;
    }

    .modal1 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    transform: translate(0%, 0%);
    }

    /* Modal Content */
    .modal1-content {
    background-color: #fefefe;
    margin-top: 300px auto;
    margin-left: 680px;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
    height: 40%;
    border-radius: 50px;
    z-index: 2;
    }

    .modal2 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    transform: translate(0%, 0%);
    }

    /* Modal Content */
    .modal2-content {
    background-color: #fefefe;
    margin-top: 300px auto;
    margin-left: 680px;
    padding: 40px;
    border: 1px solid #888;
    width: 30%;
    height: 40%;
    border-radius: 50px;
    z-index: 2;
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
          <li><a href="#"  >Statistcs</a></li>
          <hr>
          <li><a href="AccessCard(A).php"  >Access Card Requests</a></li>
          <hr>
          <li><a href="Appointment(A).php"  >Appointment Timetable</a></li>
          <hr>
          <li><a href="PaymentSetDetails(A).php"  >Set Payment Details</a></li>
          <hr>
          <li><a href="Enquiry(A).php"  >Enquiries</a></li>
          <hr>
          <li><a href="PublicNotices(A).php"  >Publish Public Notices</a></li>
          <hr>
          <li><a href="Homepage(G).php" onclick="session_destroy()">Logout</a></li>
          <br>
        </ul>
      </div>
    </header>

    <h1 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: #FFFFFF  ; font-size: 60px; line-height: 1cm;">RESIDENT'S</h1>
    <h2 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: #FFFFFF  ; font-size: 60px; line-height: 1cm;">REQUEST</h2>

    <header class="content">
        <div class="rounded-rectangle-upper">
            <p style="font-family: serif; font-size: 180%; font-weight: bold; line-height: 0">For admin to either approve</p>
            <p style="font-family: serif; font-size: 180%; font-weight: bold; line-height: 0">or reject resident's access card request</p>
        </div>      
    </header> 

    <table>
        <thead>
            <tr>
                <th>Request Id</th>
                <th>Requester Name</th>
                <th>Email Address</th>
                <th>Contact Number</th>
                <th>Unit</th>
                <th>Request Reason</th>
                <th>Descriptions</th>
                <th>Created</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody> 
            <?php foreach($requests as $index => $request): ?>
                <tr data-id="<?php echo htmlspecialchars($request['Request_Id']); ?>">
                    <td><?php echo htmlspecialchars($request['Request_Id']); ?></td>
                    <td><?php echo htmlspecialchars($request['Resident_Name']); ?></td>
                    <td><?php echo htmlspecialchars($request['Email_Address']); ?></td>
                    <td><?php echo htmlspecialchars($request['Telephone_Number']); ?></td>
                    <td><?php echo htmlspecialchars($request['Unit']); ?></td>
                    <td><?php echo htmlspecialchars($request['Reasons']); ?></td>
                    <td><?php echo htmlspecialchars($request['Descriptions']); ?></td>
                    <td><?php echo htmlspecialchars($request['Created_At']); ?></td>
                    <td><?php echo htmlspecialchars($request['Status']); ?></td>
                    <td>
                      <?php if ($request['Status'] === 'Approved' || $request['Status'] === 'Rejected'): ?>
                          <!-- If the status is already Approved or Rejected, disable the buttons -->
                          <button id="approvebutton_<?php echo $index; ?>" type="submit" disabled name="status" value="Approved" style="width: 120px; height: 40px; font-size: 16px; margin-top: 10px;">Approve</button>
                          <button id="rejectbutton_<?php echo $index; ?>" type="submit" disabled name="status" value="Rejected" style="width: 120px; height: 40px; font-size: 16px; margin-top: 10px; margin-bottom: 10px;">Reject</button>
                      <?php else: ?>
                        <form action="AccessCardUpdate.php" method="post">
                            <input type="hidden" name="request_id" value="<?php echo htmlspecialchars($request['Request_Id']); ?>">
                            <button id="approvebutton_<?php echo $index; ?>" type="submit" name="status" value="Approved" style="width: 120px; height: 40px; font-size: 16px; margin-top: 10px;">Approve</button>
                            <button id="rejectbutton_<?php echo $index; ?>" type="submit" name="status" value="Rejected" style="width: 120px; height: 40px; font-size: 16px; margin-top: 10px; margin-bottom: 10px;">Reject</button>
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
        // Get all the buttons with the name "status"
        var statusButtons = document.querySelectorAll('button[name="status"]');

        // Loop through each status button and add a click event listener
        statusButtons.forEach(function(button) {
            button.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent the default form submission behavior
                var requestId = button.form.querySelector('input[name="request_id"]').value;
                var status = button.value;
                updateStatus(requestId, status, button);
            });
        });
    </script>

    <script>
        function updateStatus(requestId, status, button) {
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
                        var statusCell = document.querySelector('tr[data-id="' + requestId + '"] td:nth-child(8)');
                        if (statusCell) {
                            statusCell.textContent = status;
                        }
                    } else {
                        // Display an error message (optional)
                        console.error("Failed to update status.");
                    }
                }
            };
            xhttp.open("POST", "AccessCardUpdate.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("request_id=" + requestId + "&status=" + status);
        }
    </script>
</body>
</html>
