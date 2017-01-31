<?php
	session_start();
	
	//DB configuration Constants
	define('_HOST_NAME_', 'localhost');
	define('_USER_NAME_', 'root');
	define('_DB_PASSWORD', '');
	define('_DATABASE_NAME_', 'sitebd');
	
	//PDO Database Connection
	try {
		$databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
		$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	
	$errMsg = '';
		//username and password sent from Form
    $username = $_POST['username'];
		$password = $_POST['password'];
		
		if($username == '') {
			$errMsg .= 'You must enter your Username<br>';
      echo $errMsg;
       }
		if($password == '') {
			$errMsg .= 'You must enter your Password<br>';
      echo $errMsg;
		   }
		if($errMsg == ''){
			$records = $databaseConnection->prepare('SELECT id_abonne,prenom,mdp FROM  abonne WHERE prenom = :username');
			$records->bindParam(':username', $username);
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);
			if(count($results) > 0 && $password == $results['mdp']){
				$_SESSION['username'] = $results['prenom'];
				header('location:dashboard.php');
				exit;
			}else{
				$errMsg .= 'Username and Password are not found<br>';
        echo $errMsg;
			}
		} 
    	
?>

