<!DOCTYPE html>
<html lang="en">
<head>
  <title>Back office</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Bienvenue, </h1>
<div class="container">

  <button type="button" name="ajouter" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">Ajouter une formation</button>
    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter formation</h4>
        </div>
        <div class="modal-body">
          <form action="ajout.php" method="post">

 <fieldset>
 <legend><b></b></legend>
 <label>nom de la formation</label><input type="text" name="nom_form" size="40" maxlength="256" value=""><br/>
  <label>nom du formateur</label><input type="text" name="formateur" size="40" maxlength="256" value=""><br/>
    <label>date de la formation</label><input type="date" name="date" size="40" maxlength="256" value=""><br/>
  
 <input type="submit" value="ajouter">
 </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  
  
  <button type="button" name="supprimer" class="btn btn-danger btn-block"data-toggle="modal" data-target="#myModal2">Supprimer une formation</button>
    <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Supprimer une formation</h4>
        </div>
        <div class="modal-body">
          <form action="delete.php" method="post">

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
  
</div>
</div>
</div>

<div class="container">
  <h2>Le tableau des formations</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>La formation</th>
		 <th>La date</th>
        <th>Le formateur</th>
       
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
$sql = "SELECT Nom, id_formateur, id_date FROM formations";  
$result = $conn->query($sql);
 while($row = $result->fetch_assoc()) {
$nomfo = $row['Nom'];
$iddate = $row['id_date']; 
$idform = $row['id_formateur'];
$sqlf = "SELECT nom FROM formateur WHERE id= '$idform' ";
$resultf = $conn->query($sqlf); 
 while($row = $resultf->fetch_assoc()) {
 $nom = $row['nom'];
 }
$sqld = "SELECT date_debut FROM date_form WHERE id= '$iddate' ";
$resultd = $conn->query($sqld); 
if (!$resultd) {
    die(mysqli_error($conn)); 
} 
 $row2 = $resultd->fetch_assoc();
 $date = $row2['date_debut'];
 
echo '<tr>';
echo '<td>',$nomfo,'</td>';
echo '<td>',$date,'</td>';
echo '<td>',$nom,'</td>';
echo '</tr> ';
}


?>
</tbody>
  </table>
</div>
	  

</body>
</html>