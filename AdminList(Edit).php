<?php
include 'dbConn.php';
echo $userid = $_GET['userid'];//retrieve userid from the url

if ($userid == null){
    header('location: AdminList(A).php');
}

$query = "SELECT * FROM `adminname` WHERE ID ='$userid' ";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results);// $row['email']
    $count = mysqli_num_rows($results);// 1 or 0
    if ($count == 1) {
        echo 'record found';
        echo $row['ID'] . ' '
            . $row['Name'] . ' '
            . $row['Email'] . ' '
            . $row['Phone'];
            


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(A)Admin Edit Page</title>
    <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
</head>
<body background="AdminPage.jpg">
    <style>
        body{
            /* background-image: url("AdminPage.jpg"); */
            background-size: cover;
            background-repeat: no-repeat;
        }
        .all{
            margin-top: 10%;
            margin-left: 40%;
            border-radius: 20px;
            background-color: rgba(211, 211, 211, 0.766);
            padding: 20px;
            height: auto;
            width:20%;
        }
        input{
            padding:1%;
            margin-bottom:1rem;
            border: none;
            border-bottom: 2px solid rgb(33, 30, 30);
            background-color: rgba(141, 138, 138, 0.067);
        }

        .btnUp {
            align-items: center;
            appearance: none;
            background-color: #3EB2FD;
            background-image: linear-gradient(1deg, #4F58FD, #149BF3 99%);
            background-size: calc(100% + 20px) calc(100% + 20px);
            border-radius: 100px;
            border-width: 0;
            box-shadow: none;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-flex;
            font-family: CircularStd,sans-serif;
            font-size: 1rem;
            height: auto;
            justify-content: center;
            line-height: 1.5;
            padding: 6px 20px;
            position: relative;
            text-align: center;
            text-decoration: none;
            transition: background-color .2s,background-position .2s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: top;
            white-space: nowrap;
            margin-top: 3%;
        }
        
        .btnUp:active,
        .btnUp:focus {
            outline: none;
        }
        
        .btnUp:hover {
            background-position: -20px -20px;
        }
        
        .btnUp:focus:not(:active) {
            box-shadow: rgba(40, 170, 255, 0.25) 0 0 0 .125em;
        }
        .arrow{
            height:80px;
            width: 80px;
            margin-left: 1%;
            margin-top: 1%;
        }
    </style>
    <a href="AdminList(A).php">
        <img src="Arrow2.png" class="arrow" alt="">
    </a>
    <div class="all">
    <h2>Resident Details</h2>
    <form action="" method="post">
        ID :<input type="text" value = "<?php echo $row['ID']; ?>" name="txtID" disabled><br>
        Name :<input type="text" value = "<?php echo $row['Name']; ?>" name="txtFName"><br>
        Email Address :<input type="text" value = "<?php echo $row['Email']; ?>" name="txtEmail" ><br>
        Phone Number :<input type="text" value = "<?php echo $row['Phone']; ?>" name="txtPhone"><br>
        <input type="submit" value="Update" name="btnUpdate" class="btnUp">
        </select>
        <br>
    </form>
    </div>
</body>
</html>

<?php
    
    } else {
        echo 'record not found, try again';
    }
?>

<?php
//step 2 - check if the user clicked register button
if(isset($_POST['btnUpdate'])){
    $fname = $_POST['txtFName']; 
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];


    $query = "UPDATE `adminname` SET Name = '$fname',Email='$email',Phone='$phone' WHERE ID = '$userid'";
    if(mysqli_query($connection,$query)){
        echo " Successfully Updated!";
        header('location: namelist(Edit).php');
    } else {
        echo "Error Updating the Information. Please try again.";
    }
    mysqli_close($connection);
}
?>