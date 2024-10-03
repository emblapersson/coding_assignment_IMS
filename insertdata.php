<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "things";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection is established
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from POST request

$mname = $_POST['mname'];
$myear = $_POST['myear'];
$mgenreid = $_POST['mgenreid'];
$mrating = $_POST['mrating'];

$sql = "INSERT INTO movies (mname, myear, mgenreid, mrating) VALUES (?, ?, ?, ?)";
$stmt = $link->prepare($sql);

// s for string
$stmt->bind_param("ssss", $mname, $myear, $mgenreid, $mrating);
$result = $stmt->execute();

if ($result) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the database connection
$link->close();
?>