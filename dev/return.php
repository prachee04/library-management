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
    $sqldb="use onlinelib;";
    $con->query($sqldb);
    $eno = $_POST['eno'];
    $book = $_POST['book'];
    $sql = "Select * from onlinelib.student where eno = $eno;";
    $result = $con->query($sql);
    $sql2 = "delete from onlinelib.student WHERE eno = $eno;";
    if ($con->query($sql2) == true) {
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
    <img class="bg" src="https://image.shutterstock.com/image-photo/book-return-sign-on-selfservice-260nw-1726868080.jpg" alt="returnbook">
    <div class="container">
        <h1>RETURN PAGE</h1>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Thanks for returning the book.</p>";
            while ($row = $result->fetch_assoc()) {
                echo "<p class='submitMsg'>The following details have been deleted :<br> Enrollment number : " . $row['eno'] . "<br>Name :" . $row['name'] . "<br>Batch :" . $row['batch'] . "</p>";
            }
        }
        ?>
        <a href="front-end.html"><button class="btn"> Back to Main Page</button></a>
    </div>
</body>

</html>