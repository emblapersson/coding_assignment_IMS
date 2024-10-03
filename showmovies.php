<!--Getting the search query-->
<form method="GET" action="">
    <input type="text" id="search" name="search" placeholder="Search by movie name...">
    <input type="submit" value="Search">
</form>


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

// Get the search query if searched
$search_query = "";
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
}


echo '<table><tr><th>Movie name</th><th>Publication year</th><th>Genre</th><th>Rating</th></tr>';

//selecting the items in the table if searching 
if (!empty($search_query)) {
    $search_query = "%" . $search_query . "%";
    $sql = "SELECT movies.mname, movies.myear, genres.mgenre, movies.mrating FROM movies INNER JOIN genres ON movies.mgenreid = genres.gid WHERE movies.mname LIKE ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param('s', $search_query); // 's' specifies the type (string)
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT movies.mname, movies.myear, genres.mgenre, movies.mrating FROM movies INNER JOIN genres ON movies.mgenreid = genres.gid";
    $result = $link->query($sql);
}

//selecting the items in the table if not searching
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["mname"] . "</td><td>" . $row["myear"] . "</td><td>" . $row["mgenre"] . "</td><td>" . $row["mrating"] . "</td></tr>";
    }
} else {
    echo "0 results";
}


echo '</table>';
?>