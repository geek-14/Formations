<html>
	   <body>
<?php

@mysql_connect("localhost","root") or die ("echec de connexion au serveur");
@mysql_select_db("site_formations") or die("echec de sélection de la base");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "site_formations";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$nom= $_POST["nom_form"];
$sql2="select id_form from formations where Nom='$nom'";
$result2 = mysqli_query($conn,$sql2);
      
      if (!$result2) {
    die(mysqli_error($conn)); 
} 
else{
while ($row = mysqli_fetch_assoc($result2)) {
    $idform =  $row['id_form']; 
$sqls="delete from evaluation where id_form='$idform'";
$results = mysqli_query($conn,$sqls);
      
      if (!$results) {
    die(mysqli_error($conn)); 
} 
	
}
}

$sql= "DELETE FROM formations WHERE Nom= '$nom'";
$result = mysqli_query($conn,$sql);
      
      if (!$result) {
    die(mysqli_error($conn)); 
} 
      
		  
       
header("location:dashboard.php");
?>
</body>
</html>
