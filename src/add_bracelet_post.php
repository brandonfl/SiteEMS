<?php
// Calls for the config file
include( "config.php" );
session_start();
date_default_timezone_set('Europe/Paris'); //nous sommes en france ;)

if (isset($_SESSION['id']) and $_SESSION['Allow'] == 1) {


    $now = time();
    $datenow = date("Y-m-d H:i:s", $now);

// Insert the information
$req = $bdd->prepare('INSERT INTO bracelet (debut,dernier,nom, raison, fin,par) VALUES("'.$datenow.'","'.$datenow.'",?, ?, ?, ?)');
$req->execute(array($_POST['nom'], $_POST['raison'], $_POST['date'],$_SESSION['pseudo']));

// Redirect user back to the add criminal page
header('Location: contre-visite.php');
} else {
    header("Location: login.php");
}
?>
