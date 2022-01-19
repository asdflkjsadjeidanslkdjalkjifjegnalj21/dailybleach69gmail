<?php
// start de session
session_start();
 
// leegt de session 
$_SESSION = array();
 
// verwijderd de session.
session_destroy();
 
// stuurt terug naar startpagina
header("location: index.php");
exit;
?>