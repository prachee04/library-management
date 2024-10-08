<?php
$insert = false;
$insert1 = false;
if (isset($_POST['ch'])) {
    $server = "localhost";
    $username = "root";
    $password = "saibaba5";
    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    $sql5="use onlinelib;";
    $con->query($sql5);
    $ch = $_POST['ch'];
    if ($ch == 1) {
        $sql = "SELECT * from onlinelib.books;";
        $info = $con->query($sql);
        $insert1 = true;
    } elseif ($ch == 2) {
        $sql = "SELECT * from onlinelib.student;";
        $info = $con->query($sql);
        $insert = true;
    } elseif ($ch == 3) {
        $sql = "SELECT * from onlinelib.student where returndate<current_timestamp();";
        $info = $con->query($sql);
        $insert = true;
    } else {
        echo "Error";
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
    <img class="bg" src="image3.png" alt="admin">
    <div class="container">
        <h1>ADMIN</h1>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Details</p>";
            while ($row = $info->fetch_assoc()) {
                echo "<p class='submitMsg'>***********************************************************<br> Enrollment number : " . $row['eno'] . "<br>Name :" .$row['name'] . "<br>Book :" . $row['book'] . "<br>Issuedate:" . $row['issuedate'] . "<br>Returndate :" . $row['returndate'] . "</p>";
            }
        }
        if ($insert1 == true) {
            echo "<p class='submitMsg'>Details</p>";
            while ($row = $info->fetch_assoc()) {
                echo "<p class='submitMsg'>************************************************************<br> ISBN :" . $row['ISBN'] . "<br>Book Name :" .$row['bookname'] . "<br>Author :" . $row['author'] . "</p>";
            }
        }
        echo "<p class='submitMsg'>***********************************************************<br>";
        ?>
        <a href="admin1.html"><button class="btn"> Back to Admin Page</button></a>
        <br>
        <br>
        <a href="front-end.html"><button class="btn"> Back to Main Page</button></a>
    </div>
</body>

</html>