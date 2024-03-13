<?php

$hostname = 'localhost';
$username = 'root';
$password = '123lion123';
$database = 'exptracker';

$conn = mysqli_connect($hostname, $username, $password, $database); 
if(! $conn ) {
    die('Could not connect: ' . mysqli_error());
}
?>