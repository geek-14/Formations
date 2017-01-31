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
session_start();
$nom= $_SESSION["nom"];
$prenom= $_SESSION["prenom"];
$form= $_SESSION["formation"];
$eval= $_POST["eval"];
$sql= "SELECT id FROM subscribers WHERE Nom= '$nom' AND Prenom= '$prenom' ";
$result = mysqli_query($conn,$sql);
      
      if (!$result) {
    die(mysqli_error($conn)); 
} $tab= mysqli_fetch_assoc($result);
$id_abonne= $tab['id'];

$sql2= "SELECT id_form FROM formations WHERE Nom= '$form' ";
$result2 = mysqli_query($conn,$sql2);
      
      if (!$result2) {
    die(mysqli_error($conn)); 
} $tab2= mysqli_fetch_assoc($result2);
$id_form= $tab2['id_form'];

$sql3= "INSERT INTO evaluation( id_form, id_abonne, eval) VALUES ('$id_form', '$id_abonne', '$eval')";

if ($conn->query($sql3) === TRUE)  
	?>
	<script>

    alert("thank you for your help!");

</script>

<?php
$conn->close();
?>

</body>
</html>
