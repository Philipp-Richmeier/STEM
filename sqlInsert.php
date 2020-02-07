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

// write out the data being inserted into the table in values
$sql = "INSERT INTO students (name, age, gradeLevel) VALUES ('John', '22', '15')";

// when you connect to the server echo out New record created successfully
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
