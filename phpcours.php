<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP</title>
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
    
        <li><a href="formulaire1.html">Sign in</a></li> 
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
      <p><a href="http://www.inpt.ac.ma/Pages/Default.aspx">INPT</a></p>
      
    </div>
    <div class="col-sm-8 text-left"> 
      <h1 style="text-align:center;"><em><font color="#33d4ff">PHP</font></em></h1>
	  <h2 style="text-align:center;"> Institut National de Postes et Télécommunications</h2>
	  <hr>
      <p> Engagement: 1-4 semaines</p>
	  <hr>
	  <h3> A propos du cours</h3>
	  <p> Blogs, réseaux sociaux, pages d'accueil personnalisables... Depuis quelques années, les sites web ont gagné en fonctionnalités et sont devenus dans le même temps de plus en plus ﻿complexes.﻿﻿﻿﻿‌

Que le temps de la "page web perso" est loin ! Il y a une époque où l'on pouvait se contenter de créer un site basique. Un peu de texte, quelques images : hop là, notre site perso était prêt. :-° 
Aujourd'hui, c'est différent : il faut que ça bouge ! On s'attend à ce qu'un site soit régulièrement mis à jour : on veut voir des actualités sur la page d'accueil, on veut pouvoir les commenter, discuter sur des forums, bref, participer à la vie du site.

Le langage PHP a justement été conçu pour créer des sites "vivants" (on parle de sites dynamiques). Et si vous voulez apprendre à créer vous aussi des sites web dynamiques, c'est votre jour de chance : vous êtes sur un cours pour vrais débutants en PHP !
L'essentiel, c'est de lire en entier les chapitres dans l'ordre. Après, ça passe tout seul et vous vous étonnerez bientôt de ce que vous êtes capable de faire !</p>
	  <hr>
      
	  <hr>
	  <h3>Programme de la formation:</h3>
	  <ul>
	  <li>Semaine1: Les balises de PHP</li>
	  <li>Semaine2: transmettre les données en pages</li>
	  <li>Semaine3: Stocker des informations dans une base de données</li>
	  <li>Semaine4: Utilisation avancée de PHP</li>
	  </ul>
	  <hr>
	  <h3 id="tar"> Tarifes de la formations</h3>
	  <h5>Prix total d'inscription: 2000DHs  Inclut:</h5>
	  <h6>1-Les balises de PHP:400DHs</h6>
	  <h6>2-transmettre les données en pages: 500DHs</h6>
	  <h6>3-Stocker des informations dans une base de données: 600 DHs</h6>
	  <h6>4-Utilisation avancée de PHP:500DHs</h6>
	  <hr>
    </div>
	
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p> <a href="courslogin.html">S'inscrire au Cours (debute le 15 Mai)</a></p>
      </div>
      <div class="well">
        <p><a href="#tar">Tarification</a></p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Institut de postes et télécommunications</p>
  <p>Address: Avenue Allal El Fassi, Rabat, Morocco</p>
</footer>

</body>
</html>