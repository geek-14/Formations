<!DOCTYPE html>
<html lang="en">
<head>
  <title>Web Development</title>
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
      background-color: #33fcff;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #33fcff;
      color: black;
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
        
        <li><a href="#">Sign in</a></li>    
      </ul>
	  <form method="get" action="recherche.php" style="text-align:center;">
    <input type="text" name="keywords">
    <input type="submit" value="Rechercher">
</form>
	  
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logform.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      
    </div>
    <div class="col-sm-8 text-left"> 
      <h3 style="text-align:center;"><b><font color='#3C85CE'>Evaluation des formations</font></b></h3>
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
$sql="SELECT id_form FROM evaluation";
$result = mysqli_query($conn,$sql);
      
      if (!$result) {
    die(mysqli_error($conn)); 
}

$tabl = Array();
while ($row = mysqli_fetch_assoc($result)) {
    $tabl[] =  $row['id_form'];  
}

$tab=array_count_values($tabl);
$keys=array_keys($tab);
$len= count($keys); 


		for ($i=0; $i< $len; $i++){
		  $id= $keys[$i];
		
	 $sql2="SELECT SUM(eval) FROM evaluation WHERE id_form= '$id' ";
     $result2 = mysqli_query($conn,$sql2);
	 $tab2= mysqli_fetch_assoc($result2); 
	 $sql3="SELECT Nom FROM formations WHERE id_form='$id'";
	 $result3 = mysqli_query($conn,$sql3);
	 $tab3= mysqli_fetch_assoc($result3);
	 echo "La formation ", $tab3['Nom'], " est évaluée comme suit: ", $tab2['SUM(eval)'], "/ " , $tab[$id], "<br>";
	
	  
	 }
	  
	  ?>
  
      
    </div>
    <div class="col-sm-2 sidenav">
      
        
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Institut de postes et télécommunications</p>
  <p>Address: Avenue Allal El Fassi, Rabat, Morocco</p>
</footer>

</body>
</html>