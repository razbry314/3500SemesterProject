<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Harmonixdb";

// Create connection

$servername = "localhost"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "Harmonixdb"; // the name of the database that you are going to use for this project
$username = "root"; // the username that you created, or were given, to access your database
$password="";
// the password that you created, or were given, to access your database


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
