<?php
//step 1 - create a database connection
$host = 'localhost'; //127.0.0.1
$user = 'root';
$password = '';
$database = 'login';
$connection = mysqli_connect($host,$user,$password,$database);

if ($connection===false){
    die('Connection failed'. mysqli_connect_error());
}

$query = "SELECT * FROM `adminname` WHERE ID";

$results = mysqli_query($connection,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(A)User List</title>
    <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
</head>
<body>
    <style>
        body{
            background-color: #393646;
        }
        .table{
            border: 1px solid #5a5959;
            background-color: #bebebe;
            padding: 8px;
            width: 99%;
            border-radius: 20px;
            box-shadow: 10px 10px 5px lightblue;
        }
        table td{
            padding-top: 12px;
            padding-bottom: 12px;
            color: rgb(10, 10, 10);
        }
        th{
            padding-top: 12px;
            padding-bottom: 12px;
            /* text-align: left; */
            background-color: #5573c5b2;
            color: rgb(232, 215, 86);
        }

        .table,th,td{
            padding-bottom: 3%;
            width: fit-content;
            text-align: center;
            margin: 0 auto;
        }

        a{
            text-decoration: none;
            text-shadow: 0 0 3px #FF0000
        }
        .arrow{
            height:80px;
            width: 80px;
            margin-left: 1%;
            margin-top: 1%;
        }
    </style>
    <a href="AdminPage2(A).html">
        <img src="Arrow2.png" class="arrow" alt="">
    </a>
    <div class="table">
        <h2>Resident List</h2>
        <table border=1>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Action</th>
            
        </th>
        </div>
    <?php while ($row = mysqli_fetch_assoc($results)){?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Phone']; ?></td>
            <td>
                <a href="AdminList(Edit).php?userid=<?php echo $row['ID']; ?></">Edit</a>
            </td>
        </tr>
    <?php } ?>
    
</body>
</html>