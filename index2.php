<?php
		session_start();
		if(!$_SESSION['auth']){
			header (location:'login.php');
		}
?>
<h1><b><font color='#00FFFF'>Bienvenue aux MEILLEURS formations de l'internet...!</font></b></h1>