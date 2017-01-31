<?php
if($_POST){
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
$Mail = $_POST['Mail'];
$pswd = $_POST['pswd'];
$sql2= "SELECT * FROM subscribers(Nom, Prenom, Adresse_mail, Mot_passe) WHERE Adresse_mail='$Mail' AND Mot_passe='$pswd'";
//$result=mysqli_query($conn,$sql2); 
if ($result=mysqli_query($conn,$sql2))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  echo $rowcount;
  // Free result set
  mysqli_free_result($result);
  }
mysqli_close($conn);

	/*if(mysqli_num_rows($result)==1){ 
// $conn->query($sql2) === TRUE
//{
	session_start();
	$_SESSION['site_formations']='true';
	header('location:index2.php');
}
else 
{echo 'not yet initiated, please subscribe!';}
}*/

}
?>