<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "chat";
$message = $_POST['messagess'];
$name = $_POST['namess'];
$dts = $_POST['datess'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql= "INSERT INTO `chat`( `name`, `message`, `dates`) VALUES ('$name','$message','$dts')";

if (mysqli_query($conn, $sql)) {
    echo "<audio autoplay> <source src='plucky.mp3' type='audio/mp3'></audio>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>