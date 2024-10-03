<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "things";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname); 

if (mysqli_connect_error()) { 
    die("Connection failed: " . mysqli_connect_error());  
}

echo '<table><tr><th>mid</th><th>mname</th><th>myear</th><th>mgenreid</th><th>mrating</th></tr>';

$sql = "SELECT * FROM `movies`";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td>" . $row["mid"] . "</td><td>" . $row["mname"] . "</td><td>" . $row["myear"] . "</td><td>" . $row["mgenreid"] . "</td><td>" . $row["mrating"] . "</td></tr>";
    }
} else {
    echo "0 results";
}

echo '</table>';
?>