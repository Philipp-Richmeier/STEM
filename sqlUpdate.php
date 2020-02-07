<?php
$servername = "localhost";
$username = "phiric21";
$password = "password";
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// telling it to grab all the data
$sql = "UPDATE students SET name = 'Holy' WHERE name = 'Slaya' ";
// holds whatever is spat out
$result = $conn->query($sql);

// tell us if the record has been changed
if ($conn->query($sql) === TRUE) {
    echo "Record has been changed. Have A Nice Day.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
