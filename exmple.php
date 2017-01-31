<?php

 @mysql_connect("localhost","root") or die ("echec de connexion au serveur");
 @mysql_select_db("site des formations") or die("echec de sélection de la base");
 echo "connexion_etablie";
?>