<?php
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "lights";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$led_On = 1;
$led_Off = 0;
// telling it to grab all the data
$sql = "SELECT * FROM led";
$sql = "UPDATE led SET lToggle= 1";
// holds whatever is spat out
$result = $conn->query($sql);

// tell us if the record has been changed
if ($conn->query($sql) === TRUE) {	

    echo "SUCCESS.";
} 
	else {
    echo "Err";
}

$conn->close();
include 'led.php';
?>