<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "site_formations";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$keywords=$_GET['keywords'];
$sql = "SELECT * FROM formations WHERE Nom LIKE '%$keywords%' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<a href="',$row["url_formation"],'">', $row["Nom"],'</a><br />';
    }
} else {
    echo "0 results";
}
$conn->close();
?>
