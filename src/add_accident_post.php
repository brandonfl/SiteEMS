<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id'])  and  $_SESSION['Allow'] == 1 ) {

    date_default_timezone_set('Europe/Paris');
    $now = time();
    $nowdate = date("Y-m-d H:i:s", $now);


// Insert the information
    $req = $bdd->prepare('INSERT INTO `lsmd` ( `horodateur`, `dossier`, `description`, `effectué`, `prix`, `medecin`) VALUES (\''.$nowdate.'\', \''.$_POST['nom'].'\', \''.$_POST['description'].'\', \''.$_POST['action'].'\', \''.$_POST['prix'].'\', \''.$_SESSION['pseudo'].'\')');
    $req->execute();

    header("Location: lsmd.php");
} else {
    header("Location: login.php");
}
?>
