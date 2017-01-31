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
$sql2= "SELECT * FROM subscribers WHERE Adresse_mail='$Mail' and Mot_passe='$pswd'";
$result = mysqli_query($conn,$sql2);
      
      if (!$result) {
    die(mysqli_error($conn)); 
}
$sql= mysqli_fetch_assoc($result); //var_dump($sql);
      $count = mysqli_num_rows($result); 
	  if($count == 1) {
		 $id= $sql['id'];
         $formation = $_POST['formation'];
		 session_start(); 
		 $_SESSION["nom"] = $sql['Nom']; 
         $_SESSION["prenom"] = $sql['Prenom'];
		 $_SESSION["formation"]=$formation;
		 
		 $sql3="SELECT * FROM formations WHERE Nom='$formation'";
		 $result2 = mysqli_query($conn,$sql3);
		 if (!$result2) {
               die(mysqli_error($conn)); 
                           }
         $sqlarray= mysqli_fetch_assoc($result2);
		 $id_form=$sqlarray['id_form'];
		 
	     $sql4="INSERT INTO profile(id_formation,id_abonne) VALUES ('$id_form', '$id')";
	         if ($conn->query($sql4) === TRUE) {
    
	              header("location:pro.php");}
             else {
	              echo "Error: " . $sql4 . "<br>" . $conn->error;}

	  }
   }
?>
