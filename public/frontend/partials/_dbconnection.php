<?php
$username = "root";
$servername = "localhost";
$password = "";
$database = "gym";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    // echo "Sorry! connection failed to join " . mysqli_connect_error();
} else {
    // echo "connection sucssesfull";
}
?>