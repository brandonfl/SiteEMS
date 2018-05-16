<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id'])  and  $_SESSION['Allow'] == 1 ) {


// Insert the information
        $req = $bdd->prepare('INSERT INTO `dossier` (`nom`, `numero`, `naissance`, `type`,`sexe`) VALUES (\''.$_POST['nom'].'\', \''.$_POST['numero'].'\', \''.$_POST['naissance'].'\', \''.$_POST['type'].'\', \''.$_POST['sexe'].'\');');
        $req->execute();

    header("Location: add_accident.php?dossier=".$_POST['nom']);
    } else {
    header("Location: login.php");
}
?>
