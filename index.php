<?php
$insert = false;
if (isset($_POST['eno'])) {
    $server = "localhost";
    $username = "root";
    $password = "saibaba5";
    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    $sql4="CREATE DATABASE IF NOT EXISTS onlinelib;";
    $con->query($sql4);
    $sql5="use onlinelib;";
    $con->query($sql5);
    $sql6="CREATE TABLE IF NOT EXISTS student(eno bigint(10) primary key,name varchar(100),batch varchar(3),email varchar(50), book varchar(500),issuedate date, returndate date);";
    $con->query($sql6);
    $eno = $_POST['eno'];
    $name = $_POST['name'];
    $batch = $_POST['batch'];
    $email = $_POST['email'];
    $book = $_POST['book'];
    $sql = "INSERT INTO `onlinelib`.`student` (`eno`, `name`, `batch`,`email`, `book`,`issuedate`) VALUES ('$eno', '$name', '$batch', '$email','$book',current_timestamp());";
    $sql2 = "UPDATE onlinelib.student SET returndate = issuedate + 7 WHERE eno = $eno;";
    $sql3 = "SELECT returndate from onlinelib.student where eno ='$eno';";
    $con->query($sql);
    $con->query($sql2);
    $rdate = $con->query($sql3);
    if ($rdate != NULL) {
        $insert = true;
    } else {
        echo "Error : $sql <br> $con->error";
    }
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Student Library</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="front-end.css">
</head>

<body>
    <img class="bg" src="https://media.istockphoto.com/photos/social-networking-service-concept-streaming-video-video-library-picture-id1194783078?k=20&m=1194783078&s=612x612&w=0&h=uRAiG8wuV31xVMs1R10T3JiPAgve9DxCEzY8KUj14hY=" alt="onlinelibrary">
    <div class="container">
        <h1>DETAILS PAGE</h1>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting your details.</p>";
            while ($row = $rdate->fetch_assoc()) {
                echo "<p class='submitMsg'>Your book return date is : " .$row['returndate'] . "</p>";
            }
        }
        ?>
        <a href="front-end.html"><button class="btn"> Back to Main Page</button></a>
    </div>
</body>

</html>