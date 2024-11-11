<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="path/to/hammer.min.css">
    <title>(A)Homepage</title>
</head>
<style>

  @import url(https://fonts.googleapis.com/css?family=Merriweather:300,900);

  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .onfooter{
    margin-bottom: 354px;
    padding: 0px 10px 80px 10px;
    font-size: 20px;
    font-family: Georgia, 'Times New Roman', Times, serif;
    backdrop-filter: blur(50px 10px -10px 10px);
    background-image: url('condo.jpg');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    margin-top: 4%;
    z-index: 0;
  }

  h1{
    align-items: center;
    font-style: bold;
    margin: auto;
    text-align: center;
    text-transform: uppercase;
    perspective: 1000px;
    color: rgb(230, 226, 226);
    font-size: 3em;
    transition: 1.0s;
    display: inline-block;
    font-family: Arial, Helvetica, sans-serif;
  }
  h1::before {
    content: attr(data-text); /* Get the text content from the data-text attribute */
    position: absolute;
    top: 0;
    left: 0;
    transform: translateZ(-10px); /* Adjust the translation value to control the depth */
    color: rgba(0, 0, 0, 0.2);
  }
  h1:hover {
    text-shadow: 0 1px 0 #000000, 0 2px 0 #000000,
                0 3px 0 #000000, 0 4px 0 #000000,
                0 5px 0 #000000, 0 6px 0 #000000,
                0 7px 0 #000000, 0 8px 0 #000000,
                0 9px 0 #000000, 0 10px 0 #000000,
                0 11px 0 #000000, 0 12px 0 #000000,
                0 20px 30px rgba(0, 0, 0, 0.5);
  }

  .container {
    max-width: 1050px;
    width: 90%;
    margin: auto;
    text-align: center;
    padding: 50px;
    background-color: rgba(112, 110, 110, 0.8);
  }

  .info img{
    height: 20em;
    width: 35em;

  }

  .row {
    display: flex;
    overflow: hidden;
  }

  .column {
    flex: 0 0 25%;
    transition: transform 0.5s ease-in-out;
    list-style: none;
    position: relative;
  }

  .column img {
    height: 10em;
    width: 10em;
  }

  .overlay {
    display: none;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .column:hover .overlay {
    display: flex;
  }

  .overlay ul {
    list-style: none;
    padding: 0;
  }

  .overlay ul li img {
    max-width: 100%;
    height: auto;
  }

  .overlay ul li {
    margin-top: 10px;
    display: none;
  }

  .column:hover .overlay ul li {
    display: block;
  }

  /* body {
    font-size: 20px;
    font-family: Georgia, 'Times New Roman', Times, serif;
    margin: auto;
    padding: auto;
    backdrop-filter: blur(50px 10px -10px 10px);
    background-image: url('condo.jpg');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    margin-top: 6%;
    z-index: 0;
  } */
  
  /* .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
  } */
  
  .logo a {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: white;
    font-weight: bold;
  }
  
  .logo img {
    width: 35px;
    height: 35px;
    margin-right: 10px;
  }
  
  .right-menu {
    display: flex;
    align-items: center;
  }

  /* Slideshow container */
  .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
  }

  /* Hide the images by default */
  .mySlides {
    display: none;
  }
  .slideshow-container img{
    display: block;
    height: 500px;
    width: 500px;
    background-color: #393939;
  }
  /* Next & previous buttons */
  .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    margin-top: -22px;
    padding: 16px;
    color: rgb(255, 255, 255);
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
  }
  /* Add your desired styles for the "Booking" button here */
  .button {
    cursor: pointer;
    background-color: grey;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
  }

  /* Position the "next button" to the right */
  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

  /* On hover, add a black background color with a little bit see-through */
  .prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  /* The dots/bullets/indicators */
  .dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #7676ce;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }

  .active, .dot:hover {
    background-color: #717171;
  }

  /* Fading animation */
  .fade {
    animation-name: fade;
    animation-duration: 1.5s;
  }

  @keyframes fade {
    from {opacity: .4}
    to {opacity: 1}
  }


  /* Calander */
  #calendar.body {
    margin: 0;
    padding: 0;
    font-family: 'HelveticaNeue-Light', Helvetica Neue, Helvetica;
    display: flex;
    align-items:center;
    height: 100%;
    height: 100vh;
    min-height: 500px;
    background: rgba(76,76,76,1);
    background: -moz-radial-gradient(center, ellipse cover, rgba(76,76,76,1) 0%, rgba(43,43,43,1) 0%, rgba(23,23,23,1) 91%, rgba(23,23,23,1) 100%);
    background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(76,76,76,1)), color-stop(0%, rgba(43,43,43,1)), color-stop(91%, rgba(23,23,23,1)), color-stop(100%, rgba(23,23,23,1)));
    background: -webkit-radial-gradient(center, ellipse cover, rgba(76,76,76,1) 0%, rgba(43,43,43,1) 0%, rgba(23,23,23,1) 91%, rgba(23,23,23,1) 100%);
    background: -o-radial-gradient(center, ellipse cover, rgba(76,76,76,1) 0%, rgba(43,43,43,1) 0%, rgba(23,23,23,1) 91%, rgba(23,23,23,1) 100%);
    background: -ms-radial-gradient(center, ellipse cover, rgba(76,76,76,1) 0%, rgba(43,43,43,1) 0%, rgba(23,23,23,1) 91%, rgba(23,23,23,1) 100%);
    background: radial-gradient(ellipse at center, rgba(76,76,76,1) 0%, rgba(43,43,43,1) 0%, rgba(23,23,23,1) 91%, rgba(23,23,23,1) 100%);
  }
  .calendar{
    color: #fff;
    margin: 10px auto;
    background: #04b6e2;
    padding: 80px 60px 80px 60px;
    width: 95%;
    max-width: 600px;
    height: auto;
    border-radius: 5px;
    box-shadow: 0px 2px 6px rgba(2,2,2,0.2);
    position: relative;
  }
  .calendar__title{
    text-align: center;
  }
  .calendar--day-view{
    position: absolute;
    border-radius: 3px;
    top: -2.5%;
    left: -2.5%;
    width: 100%;
    height: 100%;
    background: rgba(255,255,255,1);
    box-shadow: 3px 12px 5px rgba(2,2,2,0.16);
    z-index: 2;
    overflow: hidden;
    transform: scale(0.9) translate(30px,30px);
    opacity: 0;
    visibility: hidden;
  /*   border-radius: 5px; */
    display: none;
    align-items: flex-start;
    flex-wrap: wrap;
  }
  .day-view-content{
    color: #222;
    width: 100%;
    padding-top: 55px;
  }
  .day-highlight, .day-add-event{
    padding: 8px 10px;
    margin: 12px 15px;
    border-radius: 4px;
    background: #e7e8e8;
    color: #222;
    font-size: 14px;
    font-weight: 600;
    font-family: "Avenir", sans-serif;
  }
  .row{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }
  .row .qtr{
    width: 40%;
  }
  .row .half{
    width: 100%;
  }
  @media (min-width: 800px){
    .row{
      flex-wrap: nowrap;
    }
    .row .half{
      width: 35%;
    }
    .row .qtr{
      width: 25%;
    }
  }
  
  .day-add-event{
    background: #04b6e2;
    color: #fff;
    padding: 16px;
    display: none;
    transform: translateY(-15px);
    opacity: 0;
  }
  .day-add-event[data-active="true"]{
    display: block;
    animation: popIn 250ms 1 forwards;
  }
  .add-event-label{
    padding: 10px 0;
    font-size: 18px;
    font-family: 'Avenir', sans-serif;
    color: #fff;
    font-weight: 400;
    font-size: 12px;
    color: rgba(255,255,255,0.8);
  }
  .add-event-edit{
    display: block;
    margin: 4px 0;
    max-width: 70%;
    border-bottom: 2px solid #fff;
    font-size: 18px;
    font-weight: 800;
    color: #fff;
  }
  .add-event-edit--long{
    max-width: 90%;
  }
  
  input.add-event-edit{
    border: none;
    border-bottom: 2px solid #fff;
    background: transparent;
    outline: none;
    font: inherit;
    color: #fff;
    font-size: 18px;
    font-weight: 800;
  }
  .add-event-edit--error, input.add-event-edit--error{
    border-color: #ff5151;
    animation: shake 300ms 1 forwards;
  }
  @keyframes shake {
    20%, 60%{
      transform: translateX(4px);
    }
    40%, 80%{
      transform: translateX(-4px);
    }
  }
  input.add-event-edit::-webkit-input-placeholder {
    color: #fff;
  }
  
  input.add-event-edit:-moz-placeholder { /* Firefox 18- */
    color: #fff;  
  }
  
  input.add-event-edit::-moz-placeholder {  /* Firefox 19+ */
    color: #fff;  
  }
  
  input.add-event-edit:-ms-input-placeholder {  
    color: #fff;  
  }
  .event-btn{
    padding: 3px 8px;
    border: 3px solid #fff;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    width: 65px;
    margin: 5px 0;
    text-align: center;
  }
  
  .event-btn--save{
    border-color: #fff;
    background: #74c500;
    color: #fff;
    border-color: transparent;
  }
  .event-btn--save:hover{
    box-shadow: 0px 2px 4px rgba(2,2,2,0.2);
  }
  .event-btn--cancel{
    background: #ff5151;
    color: #fff;
    border-color: transparent;
  }
  .event-btn--cancel:hover{
    box-shadow: 0px 2px 4px rgba(2,2,2,0.2);
  }
  /* .add-event-btn:hover, .add.event-btn:focus{
    background: #00258e;
    box-shadow: 0px -1px 2px rgba(3,2,2,0.2);
  } */
  .day-highlight .day-events-link{
    border-bottom: 2px solid #222;
    padding: 0;
    cursor: pointer;
  }
  #add-event{
    color: #04b6e2;
    border-color: #04b6e2;
  }
  .day-view-exit{
    position: absolute;
    top: 24px;
    line-height: 1em;
    left: 22px;
    font-size: 22px;
    color: #252525;
    font-family: 'Avenir', sans-serif;
    font-weight: 800;
    cursor: pointer;
    opacity: 0;
    animation: popIn 200ms 1 forwards;
    text-transform: uppercase;
  }
  .day-view-date{
    position: absolute;
    top: 19px;
    right: 22px;
    text-align: right;
    font-size: 22px;
    font-family: 'Avenir', sans-serif;
    font-weight: 800;
    color: #393939;
    border-bottom: 2px solid #222;
    cursor: pointer;
  }
  .day-inspiration-quote{
    position: absolute;
  /*   top: 90px; */
    margin-top: -40px;
    left: 10%;
    width: 80%;
    height: calc(100% - 110px);
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    font-size: 32px;
    font-weight: 800;
    letter-spacing: -1px;
    color: #ddd;
    line-height: 1.1em;
    font-family: 'Avenir', sans-serif;
    z-index: -1;
  }
  .day-event-list-ul{
    list-style: none;
    margin: auto;
    width: 95%;
    padding: 0;
    max-height: 300px;
    overflow: auto;
  }
  .day-event-list-ul li {
    padding: 10px;
    margin: 10px 0;
  /*   background: #04b6e2; */
  /*   box-shadow: 0px 1px 1px  rgba(2,2,2,0.5); */
    position: relative;
  }
  .event-dates small{
    font-size: 0.65em;
    color: #444;
  }
  .event-dates{
    font-weight: 800;
    font-family: 'Avenir', sans-serif;
    color: #04b6e2;
    font-size: 18px;
    text-transform: lowercase;
  /*   position: relative; */
  }
  .event-delete{
    position: absolute;
    right: 10px;
    top: 0px;
    font-size: 12px;
    color: #f25656;
    cursor: pointer;
  }
  .event-name{
    font-size: 19px;
    font-family: 'Avenir', sans-serif;
    color: #222;
    padding:10px;
    background: #f7f7f7;
    margin: 2px 0;
    display: block;
    text-transform: initial;
  }
  .calendar--day-view-active{
    animation: popIn 200ms 1 forwards;
    visibility: visible;
    display: flex;
    transition: visibility 0ms;
  
  }
  .calendar--view{
    display: flex;
    flex-wrap: wrap;
    align-content: center;
    justify-content: flex-start;
    width: 100%;
  }
  .cview__month{
    width: 100%;
    text-align: center;
    font-weight: 800;
    font-size: 22px;
    font-family: 'Avenir', sans-serif;
    padding-bottom: 20px;
    color: #222;
    text-transform: uppercase;
    display: flex;
    flex-wrap: nowrap;
    align-items: baseline;
    justify-content: space-around;
  }
  .cview__month-last,.cview__month-next,.cview__month-current{
    width: 33.33333%;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    color: #222;
  }
  .cview__month-last:hover,.cview__month-next:hover{
    color: #fff;
  }
  
  .cview__month-current{
    font-size: 22px;
    cursor: default;
    animation: popIn 200ms 1 forwards;
    transform: translateY(20px);
    opacity: 0;
    position: relative;
  }
  .cview__month-reset{
    animation: none;
  }
  .cview__month-activate{
    animation: popIn 100ms 1 forwards;
  }
  .cview--spacer, .cview__header, .cview--date{
    width: 14.28571428571429%;
    max-width: 14.28571428571429%;
    padding: 10px;
    box-sizing: border-box;
    position: relative;
    text-align: center;
    overflow: hidden;
    text-overflow: clip;
    font-size: 14px;
    font-weight: 900;
  }
  .cview--date{
    font-size: 16px;
    font-weight: 400;
    cursor: pointer;
  }
  .has-events::after{
    border-radius:100%;
    animation: popIn 200ms 1 forwards;
    background: rgba(255,255,255,0.95);
    transform: scale(0);
    content: '';
    display: block;
    position: absolute;
    width: 8px;
    height: 8px;
    top: 8px;
    left: 12px;
    
  }
  .cview--date:hover::before{
    background: rgba(255,255,255,0.2);
  }
  .cview--date.today{
    color: #111;  
  }
  .cview--date.today::before{
    animation: popIn 200ms 1 forwards;
    background: rgba(255,255,255,0.2);
    transform: scale(0);
  }
  @keyframes popIn{
    100%{
      transform: scale(1);
      opacity: 1;
    }
  }
  .cview--date::before{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    content: '';
    transform: scale(0.8);
    z-index: 0;
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

  .fixed_footer{
    width: 100%;
    height: 360px;
    background: #111;
    position: fixed; left: 0; bottom: 0;
    z-index: -2;
    box-sizing: border-box;
    font: 300 1em/1.5 'Merriweather', serif; color: #ffffff;
    padding: 0;
    margin: 0;
  }

  .fixed_footer p{
    color: #696969;
    font-size: 1em;
    font-weight: 300;
  }

  .footer {
    height: 350px;
    width: 100%;
    background: #00121b;
    display: block;
  }

  .inner-footer {
    width: 95%;
    margin: auto;
    padding: 20px 10px 0px ;
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
    padding: 5px;
    background: #00121b;
    color: #fff;
    font-size: 12px;
    text-align: center;
  }

</style>
<body>
  <div class="onfooter">
    <header class="header">
      <div class="header-left">
        <a href="Homepage.php(A)"><img class="header-left" src="Screenshot 2023-07-07 113345.png" alt="Logo"></a>
        <a href="Homepage.php(A)"><div class="header-text">ECO CITY (Admin)</div></a>
      </div>
      <div class="header-right">
<!-- <a href="#f1"><div class="header-right-text">CONTACT US</div></a>
        <div class="dropdown">
          <button class = "dropbtn">
            <img class="header-right-logo" src="https://lordicon.com/icons/system/solid/46-notification-bell.svg" alt="Logo">
            <div class="dropdown-content" >
              <a href="PublicNotices(R).php">
                <div class="dropdown-text">
                <?php //foreach($noticesA01 as $noticeA01){?>
                    <p><?php //echo htmlspecialchars("Notice " . $noticeA01['Notice_Number'] . " : " . $noticeA01['Notice_Title']); ?></p>
                  <?php //} ?>
                </div>
              </a>
              <a href="PublicNotices(R).php">
                <div class="dropdown-text">
                  <?php //foreach($noticesA02 as $noticeA02){?>
                    <p><?php //echo htmlspecialchars("Notice " . $noticeA02['Notice_Number'] . " : " . $noticeA02['Notice_Title']); ?></p>
                  <?php //} ?>
                </div>
              </a>
              <a href="PublicNotices(R).php">
                <div class="dropdown-text">
                  <?php //$sqlA03 = "SELECT * FROM public_notices WHERE Notice_Number = 3"; ?>
                  <?php //$resultA03 = $connection->query($sqlA03); ?>
                          
                  <?php //$noticesA03 = array();?>
                  <?php //if ($resultA03->num_rows > 0) {?>
                    <?php //while ($row = $resultA03->fetch_assoc()) { ?>
                      <?php //$noticesA03[] = $row;?>
                      <?php //} ?>
                      <?php //} else { ?>
                        <?php //echo "No Event";?>
                        <?php //}?>
                          <?php// $connection->close();?>
                  <?php //foreach($noticesA03 as $noticeA03){?>
                    <p><?php //echo htmlspecialchars("Notice " . $noticesA03['Notice_Number'] . " : " . $noticesA03['Notice_Title']); ?></p>
                  <?php //} ?>
                </div>
              </a>
              <a href="PublicNotices(R).php"><strong>View Details</strong></a>
              <br>
            </div>
          </button>
        </div>
      </div> -->
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
    <div id="h1"></div>
    <td><center><br><h1>WELCOME COME BACK YOUR SWEET HOME</h1><br></center></td>
    <div class="slideshow-container">
      <div class="mySlides fade">
        <img src="gym.jpg" style="width:100%">
        <div class="text">GYM ROOM
        </div>
      </div>
      <div class="mySlides fade">
        <img src="karaoke.jpg" style="width:100%">
        <div class="text">KARAOKE ROOM
        </div>
      </div>
      <div class="mySlides fade">
        <img src="yoga.jpg" style="width:100%">
        <div class="text">YOGA ROOM
        </div>
      </div>
      <div class="mySlides fade">
        <img src="badminton1.jpg" style="width:100%">
        <div class="text">BADMINTION COURT
        </div>
      </div>
      <div class="mySlides fade">
        <img src="Amphitheatre.jpg" style="width:100%">
        <div class="text">AMPHITHEATRE
        </div>
      </div>
      <div class="mySlides fade">
        <img src="Swimming-Pool.jpg" style="width:100%">
        <div class="text">SWIMMING POOL
        </div>
      </div>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
        <span class="dot" onclick="currentSlide(6)"></span>
    </div>
    <script>
      let slideIndex = 1;
      showSlides(slideIndex);
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
      }
    </script>
    <script>
      // script.js
      document.addEventListener('DOMContentLoaded', function() {
        const columns = document.querySelectorAll('.column');
      
        columns.forEach(column => {
          column.addEventListener('mouseover', () => {
            const overlay = column.querySelector('.overlay');
            // overlay.style.display = 'flex';
            overlay.style.display = 'none';

          });
      
          column.addEventListener('mouseout', () => {
            const overlay = column.querySelector('.overlay');
            overlay.style.display = 'none';
            overlay.style.display = 'flex';
          });
        });
        
        // Hide the initial <li> content
        const overlayItems = document.querySelectorAll('.overlay ul li');
        overlayItems.forEach(item => {
          item.style.display = 'none';
        });
      });
    </script>
    <br>
    <br>
    <div class="container" id="h2">
      <center><h1>CONDOMINIUM PLAN</h1></center>
      <br><br>
      <div class="row">
        <div class="column">
        <img src="Type A.webp">
          <p>Plan A</p>
          <div class="overlay">
            <ul>              
              <img src="A kitchen.webp">
              <p>Plan A</p>
            </ul>
          </div>
        </div>
        <div class="column">
           <img src="Type B.webp">
          
          <p>Plan B</p>
          <div class="overlay">
            <ul>
              <img src="B Kitchen.jpeg">
            <p>Plan B</p>              
            </ul>
          </div>
        </div>
        <div class="column">
          <img src="Type C.webp">
          <p>Plan C</p>
          <div class="overlay">
            <ul>
              <img src="C Kitchen.jpg">
              <p>Plan C</p>
            </ul>
          </div>
        </div>
        <div class="column">
          <img src="Type C.webp">
          <p>Plan D</p>
          <div class="overlay">
            <ul>
              <img src="D Kitchen.jpg">
              <p>Plan D</p>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container" id="h3">
      <div class="info">
        <h1>KEY FEATURES</h1>
        <img src="ecocity.jpg">
        <p>An Ecocity embodies my dream dwelling, seamlessly blending nature's grace with sustainable design. Solar panels adorn rooftops, powering homes and electric vehicles. Lush green spaces flourish, offering a serene escape. Smart systems optimize energy use. Rainwater nurtures gardens. An Ecocity, where harmony between humanity and Earth thrives. </p>
        <img src="park.jpg">
        <p>In the pursuit of the most impeccable urban planning, the presence of abundant green spaces and inviting public areas stands as an imperative. These spaces offer a refuge from the bustling city life, providing residents with opportunities for relaxation, recreation, and social interaction. Parks, plazas, and gardens interspersed throughout the cityscape create a harmonious balance between the urban environment and the natural world, fostering a sense of tranquility and well-being.</p>
        <img src="MRT.jpeg">
        <p>MRT is just walk around 300 meter far form here. A hallmark of urban perfection is an efficient and comprehensive public transportation network that reduces the dependence on private vehicles. This system not only eases traffic congestion but also minimizes the city's carbon footprint. Well-connected buses, trains, trams, and bike-sharing programs make commuting seamless and sustainable, enabling citizens to move effortlessly from one corner of the city to another while contributing to cleaner air and reduced noise pollution.</p>
        <img src="Go green.avif">
        <p>
        A city that aspires to be flawlessly planned embraces sustainable energy sources as a core tenet. Solar panels adorning rooftops, wind turbines on the horizon, and other renewable energy solutions power homes, businesses, and public spaces. This commitment to clean energy not only mitigates environmental impact but also ensures a reliable energy supply, reducing the strain on traditional fossil fuels and promoting a greener, healthier future.
        </p>
      </div>
    </div>
    <div id="f1"></div>
  </div>
  <footer class="fixed_footer">
    <div class="footer">
      <div class="inner-footer">
        <div class="footer-big">
          <h1>EcoCity</h1>
          <p>We build a better life for you. Your satisfaction is our priority.</p>
          <br>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.14662745759!2d101.69798647488507!3d3.0554056969203804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4abb795025d9%3A0x1c37182a714ba968!2z5Lqa5aSq56eR5oqA5aSn5a2m!5e0!3m2!1szh-CN!2smy!4v1692107884384!5m2!1szh-CN!2smy" width="350" height="125" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="footer-items">
          <h2>Quick Links</h2>
          <div class="border1" width="100px"></div>
          <ul>
            <a href="#h1">
              <li>Home</li>
            </a>
            <a href="#h2">
              <li>Condominium Plan</li>
            </a>
            <a href="#h3">
              <li>Condominium Features</li>
            </a>
          </ul>
        </div>
        <div class="footer-items">
          <h2>Social Media</h2>
          <div class="border1"></div>
          <ul>
            <a href="https://www.facebook.com/apuniversity">
              <li>Facebook</li>
            </a>
              <li>Whatsapp : 012-345 6789</li>
            <a href="https://www.instagram.com/asiapacificuniversity/">
              <li>Instagram</li>
            </a>
          </ul>
        </div>
        <div class="footer-items">
          <h2>Our Location</h2>
          <div class="border1"></div>
          <ul>
            <li>Address : </li>
            <li>Jalan Teknologi 5, Taman Teknologi Malaysia, 57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        Copyright &copy; MG Tech Company 2023.
      </div>
    </div>
  </footer>
</body>
</html>
