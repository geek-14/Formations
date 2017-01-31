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
$nom= $_SESSION["nom"];
$prenom= $_SESSION["prenom"];
$sql1="select id from formateur where nom='$nom' and prenom='$prenom'";
$result1 = mysqli_query($conn,$sql1);
      
      if (!$result1) {
    die(mysqli_error($conn)); 
}
$count1 = mysqli_num_rows($result1); 
if($count1> 0) {
      $tab= mysqli_fetch_assoc($result1);
	  $id= $tab['id'];
}
else {
echo "Oops1";}



$nom= $_POST["nom_form"];
$sql= "DELETE FROM formations WHERE id_formateur= '$id' and Nom='$nom'";
$result = mysqli_query($conn,$sql);
      
      if (!$result) {
    die(mysqli_error($conn)); 
}
      /*$tab= mysqli_fetch_assoc($result); 
      if ($conn->query($sql) === TRUE) */
		  
       ?>
	<script>

    alert("formation annulee");

</script>
<?php
$conn->close();
?>
