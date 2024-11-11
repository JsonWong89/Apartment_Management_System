<?php
//step 1 - create a database connection
$host = 'localhost:3306'; //127.0.0.1
$user = 'root';
$password = '';
$database = 'login';
$connection = mysqli_connect($host,$user,$password,$database);

if($connection === false){
    die('Connection failed' . mysqli_connect_eror());
}
?>