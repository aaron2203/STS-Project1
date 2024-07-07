<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "Signup"; 

$con = mysqli_connect("localhost","root","","Signup",3308);
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
