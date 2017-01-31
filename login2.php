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
      $sql= mysqli_fetch_assoc($result); 
      $count = mysqli_num_rows($result); 
	  if($count == 1) {
       
		 session_start(); 
		 $_SESSION['loggedin']=true;
         $_SESSION['login_user'] = $Mail;
		 $_SESSION["nom"] = $sql['Nom']; 
         $_SESSION["prenom"] = $sql['Prenom']; echo "Session variables are set.";
         //echo "Nice work!!" ;
         header("location:form 2.html");
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }
?>
