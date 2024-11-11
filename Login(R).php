<?php
session_start();
include "dbConn.php";

if (isset($_POST['loginbtn'])) {

    $Email = $_POST['Email'];
    $password = $_POST['Password'];

    // Validate the user credentials
    $query = "SELECT * FROM residents_table WHERE Email_Address=? AND Password=?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $Email, $password);
    $stmt->execute();
    $results = $stmt->get_result();
  
    $count = mysqli_num_rows($results);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($results);
        $_SESSION['id'] = $row['Resident_Id'];
        $_SESSION['FName'] = $row['First_Name'];
        $_SESSION['LName'] = $row['Last_Name'];
        $_SESSION['PNumber'] = $row['Telephone_Number'];
        $_SESSION['UNumber'] = $row['Unit'];
        $_SESSION['Email'] = $row['Email_Address'];
        $_SESSION['gender'] = $row['Gender'];
        $_SESSION['race'] = $row['Race'];
        $_SESSION['religion'] = $row['Religion'];
        $_SESSION['age'] = $row['Age'];


        // Update the Login field
        $query2 = "UPDATE residents_table SET Login='Yes' WHERE Email_Address=? AND Password=?";
        $stmt2 = $connection->prepare($query2);
        $stmt2->bind_param("ss", $Email, $password);
        if ($stmt2->execute()) {
            header("Location: Homepage(R).php");
            exit(); // Make sure to exit after the redirect
        } else {
            echo "Error updating login status. Please try again.";
        }
    } else {
        echo "Record not found!";
    }
}


?> 

<!doctype html>
<html lang="en">
<head>
  <title>(R)Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel ='icon' href ='Logo.jpeg' type="image/icon">
</head>
<body>
  <a href="Homepage(G).php" target="_blank">
    <img src="Arrow2.png" class="arrow" alt="">
  </a>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');
    body{
      font-family: 'Poppins', sans-serif;
      font-weight: 300;
      line-height: 1.7;
      color: #ffeba7;
      background-image: url("https://d35w1c74a0khau.cloudfront.net/wp-content/uploads/2019/02/88988.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }
    .arrow{
        height:80px;
        width: 80px;
        /* margin-left: 1%; */
        margin-top: 1%;
    }
    a:hover {
      text-decoration: none;
    }
    .link {
      color: #ffeba7;
    }
    .link:hover {
      color: #c4c3ca;
    }
    p {
      font-weight: 500;
      font-size: 14px;
    }
    h4 {
      font-weight: 600;
    }
    h6 span{
      padding: 0 20px;
      font-weight: 700;
      color:#ffeba7;
    }
    .section{
      position: relative;
      width: 100%;
      display: block;
    }
    .full-height{
      min-height: 100vh;
    }
    [type="checkbox"]:checked,
    [type="checkbox"]:not(:checked){
    display: none;
    }
    .checkbox:checked + label,
    .checkbox:not(:checked) + label{
      position: relative;
      display: block;
      text-align: center;
      width: 60px;
      height: 16px;
      border-radius: 8px;
      padding: 0;
      margin: 10px auto;
      cursor: pointer;
      background-color: #ffeba7;
    }
    .checkbox:checked + label:before,
    .checkbox:not(:checked) + label:before{
      position: absolute;
      display: block;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      color: #ffeba7;
      background-color: #020305;
      font-family: 'unicons';
      content: '\eb4f';
      z-index: 20;
      top: -10px;
      left: -10px;
      line-height: 36px;
      text-align: center;
      font-size: 24px;
      transition: all 0.5s ease;
    }
    .checkbox:checked + label:before {
      transform: translateX(44px) rotate(-270deg);
    }
    .card-3d-wrap {
      position: relative;
      width: 440px;
      max-width: 100%;
      height: 400px;
      -webkit-transform-style: preserve-3d;
      transform-style: preserve-3d;
      perspective: 800px;
      margin-top: -80px;
    }
    .card-3d-wrapper {
      width: 100%;
      height: 100%;
      position:absolute;
      -webkit-transform-style: preserve-3d;
      transform-style: preserve-3d;
      transition: all 600ms ease-out; 
    }
    .card-front{
      width: 100%;
      height: 100%;
      background-color: #2b2e38;
      background-image: url('/img/pattern_japanese-pattern-2_1_2_0-0_0_1__ffffff00_000000.png');
      position: absolute;
      border-radius: 6px;
      transform-style: preserve-3d;
    }
    /* .card-back {
      transform: rotateY(180deg);
    } */
    /* .checkbox:checked ~ .card-3d-wrap .card-3d-wrapper {
      transform: rotateY(180deg);
    } */
    .center-wrap{
      position: absolute;
      width: 100%;
      padding: 0 35px;
      top: 50%;
      left: 0;
      transform: translate3d(0, -50%, 35px) perspective(100px);
      z-index: 20;
      display: block;
    }
    .form-group{ 
      position: relative;
      display: block;
        margin: 0;
        padding: 0;
    }
    .form-style {
      padding: 13px 20px;
      padding-left: 55px;
      height: 48px;
      width: 100%;
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
    }
    .form-style:focus,
    .form-style:active {
      border: none;
      outline: none;
      box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
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
    }
    .btn:hover{  
      background-color: #000000;
      color: #ffeba7;
      box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
    }

	</style>
<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
			          	<!-- <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/> -->
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<form method="POST">
											<div class="form-group" action="UserProfile(R).php">
												<input type="email" name="Email" class="form-style" placeholder="Email" required>
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="Password" class="form-style" placeholder="Password" required>
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<button type="submit" name="loginbtn" class="btn mt-4">Login</a></button>
                      <p class="mb-0 mt-4 text-center"><a href="ChangePassword(R).php" class="link">Forgot your password?</a></p>
                      <p class="mb-0 mt-4 text-center"><a href="UserSign(R).php" class="link">Sign Up</a></p>
                      
					  	<!-- Display error message if applicable -->
					  	<?php if(isset($error)): ?>
						<p><?php echo $error; ?></p>
						<?php endif; ?>
              </form>
				      					</div>
			      					</div>
			      				</div>
</body>
</html>
