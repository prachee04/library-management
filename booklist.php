<?php
$insert = false;
$server = "localhost";
$username = "root";
$password = "saibaba5";
$con = mysqli_connect($server, $username, $password);
if (!$con) {
    die("Connection to this database failed due to
" . mysqli_connect_error());
}
$sqldb="use onlinelib;";
$con->query($sqldb);
$sql2="CREATE TABLE IF NOT EXISTS books( ISBN bigint(10) primary key,bookname varchar(500),author varchar(100));";
$con->query($sql2);
$sql = "SELECT * from onlinelib.books;";
$info = $con->query($sql);
$insert = true;
$con->close();
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
    <img class="bg" src="image3.png" alt="booklist">
    <div class="container">
        <h1>Book List</h1>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Details</p>";
            while ($row = $info->fetch_assoc()) {
                echo "<p class='submitMsg'>***********************************************************<br> ISBN : " . $row['ISBN'] . "<br>Book Name :" .$row['bookname'] . "<br>Author Name :" . $row['author'] . "</p>";
            }
            echo "<p class='submitMsg'>***********************************************************<br>";
        }
        ?>
        <br>
        <br>
        <a href="front-end.html"><button class="btn"> Back to Main Page</button></a>
    </div>
</body>

</html>