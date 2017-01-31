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
$errMsg = '';
		//username and password sent from Form
    $username = $_POST['username'];
		$pass = $_POST['password'];
		
		if($username == '') {
			$errMsg .= 'You must enter your Username<br>';
      echo $errMsg;
       }
		if($pass == '') {
			$errMsg .= 'You must enter your Password<br>';
      echo $errMsg;
		   }
		if($errMsg == ''){
			$sql2= "SELECT * FROM admin WHERE username='$username' AND paswd='$pass'";
$result = mysqli_query($conn,$sql2);
      
      if (!$result) {
    die(mysqli_error($conn)); 
}
      $sql= mysqli_fetch_assoc($result); 
      $count = mysqli_num_rows($result); 
	  if($count == 1) {
       
		 session_start(); 
		 $_SESSION['loggedin']=true;
         $_SESSION['login_user'] = $username;
		 $_SESSION["nom"] = $sql['nom']; 
         $_SESSION["prenom"] = $sql['prenom'];
         header("location:dashboard.php");
      }else {
         echo "Your Login Name or Password is invalid";
      }
		}  
  }
?>