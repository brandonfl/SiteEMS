<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
            <title>LSMD PANEL</title>
            <!-- BOOTSTRAP CORE STYLE  -->
            <link href="assets/css/bootstrap.css" rel="stylesheet" />
            <!-- FONT AWESOME STYLE  -->
            <link href="assets/css/font-awesome.css" rel="stylesheet" />
            <!-- CUSTOM STYLE  -->
            <link href="assets/css/style.css" rel="stylesheet" /> 
            <!-- GOOGLE FONT -->
            <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />



        </head>
        <?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
session_start();





if (isset($_SESSION['id']) and $_SESSION['Allow'] == 1) {

    require 'nav.php';
    $nav = getNavigation($_SERVER['PHP_SELF']);



    echo '
    <head>
    <link rel="icon" type="image/x-icon" href="assets/img/lsmdico.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="assets/img/lsmdico.ico" /><![endif]-->
    </head>

        <body>
            <div class="navbar navbar-inverse set-radius-zero" >
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="lsmd.php">
                            <img src="assets/img/lsmd-bandeau.png" height=70/>
                        </a>
                    </div>
                    <div class="right-div">';

    if($_SESSION['Admin']==1){
        echo'<a href="administration.php" class="btn btn-info">ADMIN</a>';
    }else{
        if($_SESSION['PDG']==1){
            echo'<a href="pdg.php" class="btn btn-info">PDG</a>';
        }
    }

    echo'
                        <a href="profil.php" class="btn btn-info">PROFIL</a>
                        <a href="logout.php" class="btn btn-danger">DECONNEXION</a>
                    </div>
                </div>
            </div>
            <!-- LOGO HEADER END-->
            <section class="menu-section">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="navbar-collapse collapse ">
                                <ul id="menu-top" class="nav navbar-nav navbar-right">
                                    '. $nav .'
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="panel panel-info">
				<div class="panel-heading">
					<p></p>
					<p></p>Liste des derniers controles medicales 
					<p></p>
					<p></p>
				</div>
				</div>
            <!-- MENU SECTION END-->
            <div class="content-wrapper">
                <div class="container">
                    <div class="row pad-botm">
                        <div class="col-md-12">
                            <h4 class="header-line">LSMD PANEL</h4>
                        </div>
                    </div>
                    
                    

                                    ';
    include("config.php");


    if(isset($_SESSION['annonce']) and is_numeric($_SESSION['annonce']) and $_SESSION['annonce'] == 0){
        $_SESSION['annonce'] = 1;


        $nbannonce = $bdd->query('SELECT COUNT(*) AS nb FROM annonce WHERE isActive = 1');
            while($nbannoncedata = $nbannonce->fetch()){
                $nombreannonce = $nbannoncedata['nb'];
                }

                $alerte = false;

            if($_SESSION['Admin']){
                $nbalerte = $bdd->query('SELECT COUNT(*) AS nb FROM vehicule WHERE perdu = 1');
                while($nbalertedata = $nbalerte->fetch()){
                    $nombrealerte = $nbalertedata['nb'];
                }

                $alerte = ($nombrealerte > 0);
            }


            if($alerte and isset($nombrealerte) and is_numeric($nombrealerte)){
             if($_SESSION['Admin']==1){

                 echo '
    <div class="alert alert-danger alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Administration :</strong> Il y a actuellement ' . $nombrealerte . ' vehicules perdu
    
    <a href="administration_vehicule.php?showOnlyLost=1"><button type="button" class="btn btn-link">Voir les vehicules</button></a>
    
    </div>';


             }
            }else {
                if (isset($nombreannonce) and is_numeric($nombreannonce) and $nombreannonce == 1) {
                    $annonce = $bdd->query('SELECT * FROM annonce WHERE isActive = 1');
                    while ($annoncedata = $annonce->fetch()) {

                        echo '
    <div class="alert alert-info alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Annonce :</strong> ' . $annoncedata["texte"] . '</div>';


                    }
                }

                }
    }else {

                    if (isset($error)) {
                        if ($error == 1) {
                            echo '
    <div class="alert alert-danger alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Uniquement les medecins avec un haut niveau d\'habilitation peuvent effacer un controle medicale  </div>
    
    ';
                        }

                    }
                }

                echo'<div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Horodateur</th>
                                                    <th>Patient</th>
                                                    <th>Description</th>
                                                    <th>Effectué</th>
                                                    <th>Medecin</th>
                                                    <th>delete</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>';
    // Get contents of the lspd table
    $reponse = $bdd->query('SELECT * FROM lsmd');

    // Display each entry one by one
    while ($data = $reponse->fetch()) {
?>
                                               <tr class="odd gradeX">
                                                    <form action='delete_entry.php' method='post'>
                                                    <td>
                                                        <?php
        echo $data['horodateur'];
?>
                                                   </td>
                                                    <td>
                                                        <?php
        echo $data['dossier'];
?>
                                                   </td>
                                                    <td>
                                                        <?php
        echo $data['description'];
?>
                                                   </td>

                                                    <td class="center">
                                                        <?php
        echo $data['effectué'];
?>
                                                   </td>
                                                    <td class="center">
                                                        <?php
        echo $data['medecin'];
?>
                                                   </td>
                                                 <form action='delete_entry.php' method='post'>
                                                     <?php
                                                      echo '<td>
                                                             <input type="submit" name="deleteItem" class="btn btn-danger delete-callback" value="' . $data['id'] . '" />
                                                     </td>';
?>
                                                </form>
                                                </tr>

                                                <?php
    }
    $reponse->closeCursor(); // Complete query
    echo '

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>
                    </div>
                    <!-- /. ROW  -->
                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. ROW  -->
            <!-- End  Hover Rows  -->
        </div>
        <div class="col-md-6">
            <!--    Context Classes  -->
            <!--  end  Context Classes  -->
        </div>
    </div>
    <!-- /. ROW  -->
</div> </div> <!-- CONTENT-WRAPPER SECTION END--> <section class="footer-section">
<div class="container">
    <div class="row">
        <div class="col-md-12">
                   &copy; 2018 LSMD |
            <a href="https://www.youtube.com/user/davendrix" target="_blank"  > Coded by : Davendrix</a> &amp; Glen McMahon
        </div>
    </div>
</div> </section> <!-- FOOTER SECTION END--> <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  --> <!-- CORE JQUERY  --> <script src="assets/js/jquery-1.10.2.js"></script> <!-- BOOTSTRAP SCRIPTS  --> <script src="assets/js/bootstrap.js"></script> <!-- DATATABLE SCRIPTS  --> <script src="assets/js/dataTables/jquery.dataTables.js"></script> <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> <!-- CUSTOM SCRIPTS  --> <script src="assets/js/custom.js"></script> </body>';
} else {
    header("Location: login.php");
}

?> </html>