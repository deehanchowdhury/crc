<?php
$host = 'localhost';
$db   = 'crc_website';
$user = 'root'; // replace with your DB username
$pass = '';     // replace with your DB password

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
