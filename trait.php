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
session_start();
$_SESSION["nom"] = $_POST['nom'];
$_SESSION["prenom"] = $_POST['prenom'];
echo "Session variables are set.";
$nom = $_POST['nom']; //var_dump($_POST);
$prenom = $_POST['prenom'];
$Mail = $_POST['Mail'];
$pswd = $_POST['pswd'];
$sql = "INSERT INTO subscribers(Nom, Prenom, Adresse_mail, Mot_passe) VALUES('$nom','$prenom','$Mail','$pswd')";

if ($conn->query($sql) === TRUE) {
   
	header("location:form 2.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>
