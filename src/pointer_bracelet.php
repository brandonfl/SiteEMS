<?php
include( "config.php" );
session_start();
date_default_timezone_set('Europe/Paris'); //nous sommes en france ;)
if (isset($_SESSION['id'])) {
      if ($_SESSION['Allow'] == 1) {
          if (isset($_POST['updateItem']) and is_numeric($_POST['updateItem'])) {

              $now = time();
              $datenow = date("Y-m-d H:i:s", $now);

              $id = $_POST['updateItem'];
              $count = $bdd->prepare("UPDATE bracelet SET dernier= '".$datenow."' , par=:par WHERE bracelet.id=:id");
              $count->bindParam(":par", $_SESSION['pseudo'], PDO::PARAM_STR);
              $count->bindParam(":id", $id, PDO::PARAM_INT);

              $count->execute();

              $statut = "2";
              header('Location: contre-visite.php?statut=' . $statut);



          }
      } else {
        header('Location: login.php');
      }

}else{
    header('Location: login.php');
}

?>
