
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Harmonixdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$productid= $_SESSION['productid'];
$username= $_SESSION['Username'];
$sql = "INSERT INTO cart (Username, productid) VALUES ('".$username."', '".$productid."')";

if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<meta http-equiv="refresh" content="0;cart.php">
