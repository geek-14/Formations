<?php
  if((!$_POST['nom_form']) || (!$_POST['date']) || (!$_POST['formateur'])){
  header('location:ajouter.html');
  exit;
  }
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "site_formations";
  $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$nom=$_POST['nom_form'];
$date= $_POST['date'];
$formateur=$_POST['formateur'];
$sqld = "SELECT id FROM date_form WHERE date_debut= '$date' ";
$resultd = $conn->query($sqld);
if ($resultd->num_rows > 0) {  
 while($row = $resultd->fetch_assoc()) {
$iddate = $row['id']; 
$insertd = "INSERT INTO formations (id_date,Nom) VALUES ('$iddate','$nom') ";
$recordd = $conn->query($insertd);
$last_id = $conn->insert_id; 
} 
   } else {
$insertdate = "INSERT INTO date_form(date_debut) VALUES('$date') ";
$statement = $conn->query($insertdate);
$last_id = $conn->insert_id;
$insertd = "INSERT INTO formations(id_date,Nom) VALUES ('$last_id','$nom') ";
$recordd = $conn->query($insertd);
$last_id = $conn->insert_id;
  } 
$sqlf = "SELECT id FROM formateur WHERE nom= '$formateur' ";
$resultf = $conn->query($sqlf);
if ($resultf->num_rows > 0) {
 while($row = $resultf->fetch_assoc()) {
$idfor = $row['id'];
$insertf = "UPDATE formations SET id_formateur='$idfor' WHERE id_form='$last_id'";
$recordf = $conn->query($insertf);
$lastid = $conn->insert_id;
} 
		 $myfile = fopen($nom. ".html", "w") or die("can't open file");
		 
		  $data="<html>\n<body>\n<h1> Vous etes dans la page de la formation ". $nom ."</h1>\n</body>\n</html>";
		  fwrite($myfile, $data);
		  
	 header("location:".$nom. ".html"); 
   }  else {
$insertformateur = "INSERT INTO formateur(nom) VALUES('$formateur') ";
$stat = $conn->query($insertformateur);
$lastid = $conn->insert_id;
$insertf =  "UPDATE formations SET id_formateur='$lastid' WHERE id_form='$last_id'";
$recordf = $conn->query($insertf);
  		 $myfile = fopen($nom. ".html", "w") or die("can't open file");
		 
		  $data="<html>\n<body>\n<h1> Vous etes dans la page de la formation ". $nom ."</h1>\n</body>\n</html>";
		  fwrite($myfile, $data);
		  
	 header("location:".$nom. ".html");
   }
$conn->close();    
?>