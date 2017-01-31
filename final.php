<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "WELCOME dear " . $_SESSION["nom"] . $_SESSION["prenom"] . "!!!";

?>

</body>
</html>