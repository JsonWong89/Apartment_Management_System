<?php
    if(isset($_POST['submit']) && isset($_FILES['filename']) && $_SERVER["REQUEST_METHOD"] == "POST")
    {
        $noticenumber = $_POST['noticenumber'];
        $noticetitle = $_POST['noticetitle'];
        $noticedetails = $_POST['noticedetails'];
        $noticelink = $_POST['noticelink'];
    }

    // database details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    // creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

    // Handling the image upload
    if ($_FILES['filename']['error'] === UPLOAD_ERR_OK) {
        $imageData = file_get_contents($_FILES['filename']['tmp_name']);
        $noticeimage = mysqli_real_escape_string($con, $imageData);
    } else {
        // Handle the case when an image upload fails (optional)
        $noticeimage = '';
    }


    $qry = mysqli_query($con, "SELECT * FROM public_notices WHERE Notice_Number = $noticenumber");
    $rowCheck=mysqli_num_rows($qry);
    if ($rowCheck>0) { // if data exist update the data
        $qry=mysqli_query($con,"UPDATE public_notices SET
        Notice_Number = '$noticenumber',
        Notice_Title = '$noticetitle',
        Notice_Details = '$noticedetails',
        Notice_Link = '$noticelink',
        Notice_Image = '$noticeimage'
        WHERE Notice_Number = '$noticenumber'");

        echo "Update successful";
    }
    else{ // insert the data if data is not exist
        $qry=mysqli_query($con,"INSERT INTO public_notices (Notice_Number, Notice_Title, Notice_Details, Notice_Link, Notice_Image)
        VALUES ('$noticenumber', '$noticetitle', '$noticedetails', '$noticelink', '$noticeimage')");

        echo '<script>alert("Published successful! Thank you.");</script>';
    }

    // close connection
    mysqli_close($con);
?>
