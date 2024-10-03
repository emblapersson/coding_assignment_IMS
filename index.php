<!--The form for adding a movie-->
<form action="insertdata.php" method="POST">
    <h2> Add a movie: </h2>
    Movie name:<input type="text" name="mname"><br>
    Publication year:<input type="text" name="myear"><br> 
    Genre:<select id="mgenreid" name="mgenreid"> <!--Beginning of the drop-down menu for selecting genre-->
    <option value="" disable selected></option> 
    <?php
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

    //Fetch categories from genres
    $sql = "SELECT gid, mgenre FROM genres";
    $result = $link->query($sql);

    //Add the categories from genres
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value=' " . $row['gid'] . "'>" . $row['mgenre'] . "</option>\n";
        }
    }

    // Close the database connection
    $link->close();

    ?>
    </select><br>
    Movie rating:<input type="text" name="mrating"><br> <!--ska vara integer, behöver vi ändra från text?-->
    <input type="submit" value="Add">
</form>

<?php