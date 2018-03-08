<?php
session_start();
var_dump($_SESSION['userid']);
If (!isset($_SESSION['userid'])){
	session_destroy();
    echo "Logout erfolgreich";
     die('Logout erfolgreich. Weiter zu <a href="profile.php">internen Bereich</a>');
}
echo "Logout erfolgreich";
var_dump($_SESSION['userid']);
?>