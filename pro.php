 <?php
session_start();
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile abonné</title>
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
         echo "WELCOME dear " . $_SESSION["nom"] . " " . $_SESSION["prenom"] . "!!!";
      ?>
	  </font></h1>
<h2 style="text-align:center;"> Institut National de Postes et Télécommunications</h2>
	  <hr>
      <h3>Formation en cours: </h3>
      <p>
	  <?php
	  
	    echo $_SESSION["formation"];
		
      ?>			  
	  </p>
	  <p><font color="#27D9DC"> Aidez nous à amélorer nos services, évaluez la formation que vous venez de finir!!! </font></p>
	   <form action="eval.php" method="post">
	   <label>évaluation de la formation (choisissez un nombre de 1 à 10)</label><input type="number" name="eval" size="40" maxlength="256" value=""><br/>
	    <input type="submit" value="submit">
 </form>
	  </p>
	  
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
