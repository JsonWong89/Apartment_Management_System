<!DOCTYPE html>
<html>
<head>
    <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
    <title>(A)Appointment Timetable</title>
    <style>
    * {
        box-sizing: border-box;
    }

    ul {
        list-style-type: none;
    }

    body {
        font-family: Verdana, sans-serif;
        background-image: url("https://ihdwall.com/storage/202101/mountain-lake-forest-landscape-nature-scenery-hd-wallpaper-1920x1080.jpg");
        background-size:cover;
        background-repeat: no-repeat;
        height: 600px;
    }

    .header {
        background-color: #d0d0d0; /* Light Grey color */
        padding: 20px;
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
    }

    .header-right {
        display: flex;
        align-items: center;
        margin-right: 100px;
    }

    .header-right a{
        text-decoration: none;
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
        top: 37px;
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
        height: (100%);
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
        height: 100%;
    }

    .menu ul li {
        padding:18px; /* Increase this value to make more spacing between items */
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
        text-align: center;
        font-size: 40px;
    }

    .month {
    padding: 70px 45px;
    width: 100%;
    background: #1abc9c;
    text-align: center;
    opacity: 80%;
    }

    .month ul {
    margin: 0;
    padding: 0px;
    }

    .month ul li {
    color: white;
    font-size: 20px;
    text-transform: uppercase;
    letter-spacing: 3px;
    }

    .month .prev {
    float: left;
    padding-top: 10px;
    cursor: pointer;
    }

    .month .next {
    float: right;
    padding-top: 10px;
    cursor: pointer;
    }

    .weekdays {
        margin: 0;
        padding: 10px 30px 10px 0px;
        background-color: #ddd;
        font-weight: bold;
        opacity: 80%;
        text-align: center; /* Add this line to center the list items */
    }

    .weekdays li {
        display: inline-block;
        width: 13.6%;
        text-align: center;
        color: #666;
    }

    .days {
        padding: 10px 20px;
        background: #eee;
        margin: 0;
        font-weight: bold;
        font-size: 20px;
        opacity: 80%;
    }

    .days li {
        list-style-type: none;
        display: inline-block;
        width: 13.6%;
        text-align: center;
        margin-bottom: 5px;
        font-size: 12px;
        color: #777;
        padding: 10px;
    }

    .days li a {
        text-decoration: none;
        color: #777;
        display: block;
        width: 100%;
        height: 100%;
        padding: 10px;
        border-radius: 50px;
    }

    .days li a.active {
        padding: 5px;
        background: #1abc9c;
        color: white !important;
    }

    /* Add media queries for smaller screens */
    @media screen and (max-width:720px) {
    .weekdays li, .days li {width: 13.1%;}
    }

    @media screen and (max-width: 420px) {
    .weekdays li, .days li {width: 12.5%;}
    .days li .active {padding: 2px;}
    }

    @media screen and (max-width: 290px) {
    .weekdays li, .days li {width: 12.2%;}
    }

    /* Add this in your CSS */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .modal-title {
        text-align: center;
        font-weight: bold;
        font-size: 26px;
    }

    #closeModal {
        margin-top: 10px;
    }

    </style>
</head>
<body>
    <header class="header">
      <div class="header-left">
        <a href="Homepage(A).php"><img class="header-left" src="Screenshot 2023-07-07 113345.png" alt="Logo"></a>
        <a href="Homepage(A).php"><div class="header-text">ECO CITY</div></a>
      </div>
      <div class="header-right">
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
    <div class="onfooter">
        <h1>Appointment Calendar</h1>

        <div class="month">      
        <ul>
            <li class="prev">&#10094;</li>
            <li class="next">&#10095;</li>
            <li>
            August<br>
            <span style="font-size:18px">2023</span>
            </li>
        </ul>
        </div>

        <ul class="weekdays">
        </ul>

        <ul class="days" id="dayList">  
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li><a href="#">7</a></li>
        <li><a href="#">8</a></li>
        <li><a href="#">9</a></li>
        <li><a href="#">10</a></li>
        <li><a href="#">11</a></li>
        <li><a href="#">12</a></li>
        <li><a href="#">13</a></li>
        <li><a href="#">14</a></li>
        <li><a href="#">15</a></li>
        <li><a href="#">16</a></li>
        <li><a href="#">17</a></li>
        <li><a href="#">18</a></li>
        <li><a href="#">19</a></li>
        <li><a href="#">20</a></li>
        <li><a href="#">21</a></li>
        <li><a href="#">22</a></li>
        <li><a href="#">23</a></li>
        <li><a href="#">24</a></li>
        <li><a href="#">25</a></li>
        <li><a href="#">26</a></li>
        <li><a href="#">27</a></li>
        <li><a href="#">28</a></li>
        <li><a href="#">29</a></li>
        <li><a href="#">30</a></li>
        <li><a href="#">31</a></li>
        </ul>

        <!-- Add this within the <body> tag -->
        <div class="modal-overlay" id="modalOverlay">
            <div class="modal-content">
                <p id="modalContent"></p>
                <button id="closeModal">Close</button>
            </div>
        </div>

        <script>
            const prevButton = document.querySelector('.prev');
            const nextButton = document.querySelector('.next');
            const monthLabel = document.querySelector('.month li:last-child');
            const weekdaysList = document.querySelector('.weekdays');

            let currentMonth = 7; // August is the 8th month, but array index starts from 0

            prevButton.addEventListener('click', function() {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11; // December is the 12th month
                }
                updateCalendar();
            });

            nextButton.addEventListener('click', function() {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0; // January is the 1st month
                }
                updateCalendar();
            });
            
            function updateCalendar() {
                const months = [
                    'January', 'February', 'March', 'April', 'May', 'June',
                    'July', 'August', 'September', 'October', 'November', 'December'
                ];

                monthLabel.innerHTML = months[currentMonth] + '<br><span style="font-size:18px">2023</span>';
                updateWeekdays(currentMonth);
            }

            function updateWeekdays(monthIndex) {
                const weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                const firstDay = new Date(2023, monthIndex, 1).getDay();

                const adjustedWeekdays = [...weekdays.slice(firstDay), ...weekdays.slice(0, firstDay)];

                let weekdaysHTML = '';
                for (const day of adjustedWeekdays) {
                    weekdaysHTML += `<li>${day}</li>`;
                }

                weekdaysList.innerHTML = weekdaysHTML;
            }
            updateCalendar(); // Initialize the calendar


            const dayList = document.getElementById('dayList');
            const days = dayList.getElementsByTagName('a');

            for (const day of days) {
                day.addEventListener('click', function() {
                    for (const d of days) {
                        d.classList.remove('active');
                    }
                    this.classList.add('active');

                    const clickedMonth = currentMonth + 1; // Add 1 because array index starts from 0
                    const clickedDay = parseInt(this.textContent);   

                    // Send the selected date to the server
                    const formattedDate = `2023-${clickedMonth.toString().padStart(2, '0')}-${clickedDay.toString().padStart(2, '0')}`;
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'AppointmentFetch.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            const responseData = JSON.parse(xhr.responseText);
                            if (responseData) {  
                                let cleanedData = '<div class="modal-title"><u>APPOINTMENTS (' + formattedDate + ')</u></div><br><br>';
                                for (let i = 0; i < responseData.length; i++) {
                                    cleanedData += `Plan Type: ${responseData[i].Plan_Type}<br><br>`;
                                    cleanedData += `Start Time: ${responseData[i].Start_Time}<br><br>`;
                                    cleanedData += `End Time: ${responseData[i].End_Time}<br><br><br><br>`;
                                }
                                modalContent.innerHTML = cleanedData;
                            } else {
                                modalContent.textContent = `No data found for ${formattedDate}`;
                            }
                            modalOverlay.style.display = 'flex';
                        }
                    };
                    xhr.send(`selectedDate=${formattedDate}`);

                    const closeModalButton = document.getElementById('closeModal');
                    closeModalButton.addEventListener('click', function() {
                        modalOverlay.style.display = 'none';
                    });
                });
            }
        </script>
    </div>
</body>
</html>
