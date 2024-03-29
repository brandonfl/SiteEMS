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

        include("config.php");

if (isset($_GET['statut'])) {
    $statut = $_GET['statut'];
    
}
session_start();




if (isset($_SESSION['id']) and  $_SESSION['Allow'] == 1) {

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
                                    '.$nav.'
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="panel panel-info">
				<div class="panel-heading">
					<p></p>
					<p></p>Contre visites médicales (bandage à changer, medecine du travail,etc...)
					<p></p>
					<p></p>
				</div>
				</div>
				
            <!-- MENU SECTION END-->
            <div class="content-wrapper">
                <div class="container">
                    <div class="row pad-botm">
                        <div class="col-md-12">
                            <h4 class="header-line">Visites PANEL</h4>
                        </div> 
                    </div>
                    <a href="add_visite.php" class="btn btn-success pull-right">Ajouter un patient</a>
                    </br>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Raison</th>
                                                    <th>Debut</th>
                                                    <th>Fin</th>
                                                    <th>Derniere visite</th>
                                                    <th>Fait par</th>
                                                    <th>Controler</th>
                                                    <th>Supprimer</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                    ';
    if (isset($statut)) {
    
    if($statut == 2){
    echo '
    <div class="alert alert-success alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Sucess !</strong> Vous avez bien controlé un patient  </div>
    
    ';
    }

    
}
    // Get contents of the lspd table
    $reponse = $bdd->query('SELECT * FROM bracelet');

    // Display each entry one by one
    while ($data = $reponse->fetch()) {
?>
                                               <tr class="odd gradeX">
                                                    
                                                    
                                                    <td>
                                                        <?php
        echo $data['nom'];
?>
                                                   </td>
                                                    <td>
                                                        <?php
        echo $data['raison'];
?>
                                                   </td>
                                                    
                                                    <td class="center">
                                                        <?php
        echo $data['debut'];
?>
                                                   </td>
                                                    <td class="center">
                                                        <?php
        echo $data['fin'];
?>
                                                   </td>
                                                   <td class="center">
                                                        <?php
        echo $data['dernier'];
?>
                                                   </td>
                                                   <td class="center">
                                                        <?php
        echo $data['par'];
?>
                                                   </td>
                                                   
                                                    <form action='pointer_bracelet.php' method='post'>
                                                     <?php
        echo '<td>
                                                             <input type="submit" name="updateItem" class="btn btn-success" value="' . $data['id'] . '" />
                                                     </td>';
?>
                                                </form>
                                                   
                                                 <form action='delete_bracelet.php' method='post'>
                                                     <?php
        echo '<td>
                                                             <input type="submit" name="deleteItem" class="btn btn-danger" value="' . $data['id'] . '" />
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
                   &copy; 2017 LSPD | Coded by Glen McMahon
        </div>
    </div>
</div> </section> <!-- FOOTER SECTION END--> <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  --> <!-- CORE JQUERY  --> <script src="assets/js/jquery-1.10.2.js"></script> <!-- BOOTSTRAP SCRIPTS  --> <script src="assets/js/bootstrap.js"></script> <!-- DATATABLE SCRIPTS  --> <script src="assets/js/dataTables/jquery.dataTables.js"></script> <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> <!-- CUSTOM SCRIPTS  --> <script src="assets/js/custom.js"></script> </body>';
} else {
    header("Location: login.php");
}
?> </html>
