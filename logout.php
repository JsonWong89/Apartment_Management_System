<?php
session_start();
if (isset($_POST['btnUpdate'])) 
$query2 = "UPDATE residents_table SET Login='No' WHERE Login='Yes'";
session_destroy(); //destroy all sessions

header("Location: Login(R).php");
exit();
?>