<?php
$insert = false;
if (isset($_POST['ISBN'])) {
    $server = "localhost";
    $username = "root";
    $password = "saibaba5";
    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    $sqldb="use onlinelib;";
    $con->query($sqldb);
    $ISBN = $_POST['ISBN'];
    $bookname = $_POST['bookname'];
    $author = $_POST['author'];
    $s = "INSERT INTO onlinelib.books VALUES ('$ISBN', '$bookname','$author');";
    if ($con->query($s) == true) {
        $insert = true;
    }
    $s2 = "SELECT * from onlinelib.books where ISBN = '$ISBN';";
    $info = $con->query($s2);
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
    <img class="bg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAI9JR9fLR5cLB5NIhdzWVTx1M3WdFbe4dVdGoVAoFAolfv4HW4kvyxBx0mYAAAAASUVORK5CYII=" alt="add">
    <div class="container">
        <h1>ADMIN</h1>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Book Details</p>";
            while ($row = $info->fetch_assoc()) {
                echo "<p class='submitMsg'>***************************************************<br>ISBN : " . $row['ISBN'] . "<br>Book Name :" . $row['bookname'] . "<br>Author:" . $row['author'] . "</p>";
            }
            echo "<p class='submitMsg'>***********************************************************<br>";
        }
        ?>
        <br>
        <a href="admin1.html"><button class="btn"> Back to Admin Page</button></a>
        <br>
        <br>
        <a href="front-end.html"><button class="btn"> Back to Main Page</button></a>
    </div>
</body>

</html>