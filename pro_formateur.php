 <?php
session_start();
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile formateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #33d4ff;
     
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>




<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="formulaire1.html">Sign in</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logform.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="http://www.inpt.ac.ma/Pages/Default.aspx">INPT</a></p>
      
    </div>
    <div class="col-sm-8 text-left"> 
	<h1 style="text-align:center;"><font color="#33d4ff">
      <?php
         echo "Bienvenue Mr(s) " . $_SESSION["nom"] . " " . $_SESSION["prenom"] . "!!!";
      ?>
	  </font></h1>
<h2 style="text-align:center;"> <font color="#33d4ff">I</font>nstitut <font color="#33d4ff">N</font>ational de <font color="#33d4ff">P</font>ostes et <font color="#33d4ff">T</font>élécommunications</h2>
	  <hr>
      <h3>Formations sous votre tutèle: </h3>
      <hr>
	  <div class="container">
             
  <table class="table">
    <thead>
      <tr>
        <th>La formation</th>
		 <th>La date</th>
       
      </tr>
    </thead>
    <tbody>
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

$nom= $_SESSION["nom"];
$prenom= $_SESSION["prenom"];
$sql = "SELECT id FROM formateur where nom='$nom'";  
$result = $conn->query($sql);
     
	 while ($row = mysqli_fetch_assoc($result)) {
    $idform =  $row['id'];  
}

$sqlf = "SELECT Nom, id_date FROM formations WHERE id_formateur= '$idform' ";
$resultf = $conn->query($sqlf); 
 $tabls = Array();
 $tablk = Array();
	 while ($row3 = mysqli_fetch_assoc($resultf)) {
    $tabls[] =  $row3['Nom'];  
	$tablk[]= $row3['id_date'];
}
	 
$tab=array_count_values($tabls);
$keys=array_keys($tab);
$tabl=array_count_values($tablk);
$keyss=array_keys($tablk);
$len= count($keys); //echo $len;
for($i=0; $i< $len; $i++){
 $nom = $keys[$i];
 $id_date=$keyss[$i];
 
$sqld = "SELECT date_debut FROM date_form WHERE id= '$id_date' ";
$resultd = $conn->query($sqld); 
if (!$resultd) {
    die(mysqli_error($conn)); 
} 
 $row2 = $resultd->fetch_assoc();
 $date = $row2['date_debut'];
 
echo '<tr>';
echo '<td>',$nom,'</td>';
echo '<td>',$date,'</td>';

echo '</tr> ';
}


?>
</tbody>
  </table>
</div>
	   
</div>
</div>
<button type="button" name="supprimer" class="btn btn-danger btn-block"data-toggle="modal" data-target="#myModal2">Annuler une formation</button>
    <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Annuler une formation</h4>
        </div>
        <div class="modal-body">
          <form action="formateur_del.php" method="post">

 <fieldset>
 <legend><b></b></legend>
 <label>nom de la formation</label><input type="text" name="nom_form" size="40" maxlength="256" value=""><br/>
 
 <input type="submit" value="supprimer">
 </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<div class="col-sm-2 sidenav">
      
    </div>
  </div>


<footer class="container-fluid text-center">
  <p>Institut de postes et télécommunications</p>
  <p>Address: Avenue Allal El Fassi, Rabat, Morocco</p>
</footer>
</body>
</html>

	  