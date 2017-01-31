<?php
  if((!$_POST['nom']) || (!$_POST['date']) || (!$_POST['formateur'])){
  header('location:ajouter.html');
  exit;
  }
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_site";
  $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$nom=$_POST['nom'];
$date= $_POST['date'];
$formateur=$_POST['formateur'];
$sqld = "SELECT id_date FROM date WHERE date_de_formation= '$date' ";
$resultd = $conn->query($sqld);
if ($resultd->num_rows > 0) {  
 while($row = $resultd->fetch_assoc()) {
$iddate = $row['id_date']; 
$insertd = "INSERT INTO formation (id_date,nom_de_formation) VALUES ('$iddate','$nom') ";
$recordd = $conn->query($insertd);
$last_id = $conn->insert_id; 
} 
   } else {
$insertdate = "INSERT INTO date(date_de_formation) VALUES('$date') ";
$statement = $conn->query($insertdate);
$last_id = $conn->insert_id;
$insertd = "INSERT INTO formation(id_date,nom_de_formation) VALUES ('$last_id','$nom') ";
$recordd = $conn->query($insertd);
$last_id = $conn->insert_id;
  } 
$sqlf = "SELECT id_formateur FROM formateur WHERE nom= '$formateur' ";
$resultf = $conn->query($sqlf);
if ($resultf->num_rows > 0) {
 while($row = $resultf->fetch_assoc()) {
$idfor = $row['id_formateur'];
$insertf = "UPDATE formation SET id_formateur='$idfor' WHERE id_formation='$last_id'";
$recordf = $conn->query($insertf);
$lastid = $conn->insert_id;
} } 
    else {
$insertformateur = "INSERT INTO formateur(nom) VALUES('$formateur') ";
$stat = $conn->query($insertformateur);
$lastid = $conn->insert_id;
$insertf =  "UPDATE formation SET id_formateur='$lastid' WHERE id_formation='$last_id'";
$recordf = $conn->query($insertf);
   }
   $myfile = fopen($nom. ".html", "w") or die("can't open file");
		 
		  $data="<html>\n<body>\n<h1> Vous etes dans la page de la formation ". $nom ."</h1>\n</body>\n</html>";
		  fwrite($myfile, $data);
		  
	 header("location:".$nom. ".html");}
$conn->close();    
?>