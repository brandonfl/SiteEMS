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

        <link rel="stylesheet" href="assets/bootstrap-select-1.12.4/dist/css/bootstrap-select.css" />
        <script src="assets/bootstrap-select-1.12.4/dist/jquery.min.js"></script>
        <script src="assets/bootstrap-select-1.12.4/dist/js/bootstrap-select.js"></script>

        </head>
        <?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
session_start();





if (isset($_SESSION['id']) and  $_SESSION['Allow'] == 1) {
    include("config.php");

    require 'nav.php';
    $nav = getNavigation($_SERVER['PHP_SELF']);

    $logo = '<a class="navbar-brand" href="lsmd.php.php">
                            <img src="assets/img/lsmd-bandeau.png" height=70/>
                        </a>';


    if(isset($_GET['nom'])) {


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
                        '.$logo.'
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
                                    ' . $nav . '
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- MENU SECTION END-->
            <div class="content-wrapper">
                <div class="container">
                    <div class="row pad-botm">
                        <div class="col-md-12">
                            <h4 class="header-line">Dossier Medicale : ' .$_GET['plaque']. '</h4>
                        </div>
                    </div>
                    ';

        $nbplaque = $bdd->query('SELECT COUNT(*) AS nb FROM dossier WHERE nom="'.$_GET['nom'].'"');

        if(isset($nbplaque)){
            while($datanbplaque = $nbplaque->fetch()){
                $nombreplaque = $datanbplaque['nb'];
            }
        }

        if($nombreplaque==0){
                header('Location: dossier.php?error=1');
            }else {

            echo' <div class="content-wrapper">
                <div class="container">';

            $homepage = file_get_contents('https://lsmd-fivelife.fr/dossier_preview.php?nom='.urlencode($_GET['nom']));

            echo $homepage;


            echo ' 
                    </br>
                    </br>
            <!-- /. ROW  -->
            <!-- End  Hover Rows  -->
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
                   &copy; 2017 LSPD | Coded by :  Glen McMahon
        </div>
    </div>
</div> </section> <!-- FOOTER SECTION END--> <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  --> <!-- CORE JQUERY  --> <script src="assets/js/jquery-1.10.2.js"></script> <!-- BOOTSTRAP SCRIPTS  --> <script src="assets/js/bootstrap.js"></script> <!-- DATATABLE SCRIPTS  --> <script src="assets/js/dataTables/jquery.dataTables.js"></script> <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> <!-- CUSTOM SCRIPTS  --> <script src="assets/js/custom.js"></script> </body>';
        }


    }else{


        echo '
    <head>
    <link rel="icon" type="image/x-icon" href="https://lspd-fivelife.fr/assets/img/lspdlogo.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="https://lspd-fivelife.fr/assets/img/lspdlogo.ico" /><![endif]-->
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
                        '.$logo.'
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
                                    '.$nav .'
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- MENU SECTION END-->
            <div class="content-wrapper">
                <div class="container">
                    <div class="row pad-botm">
                        <div class="col-md-12">
                            <h4 class="header-line">Rechercher un dossier</h4>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">';

        if(isset($_GET['error']) and $_GET['error'] == 1){
            echo '<div class="alert alert-danger alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Aucune dossier trouvé </div>';
        }

                                
                             echo'   <form action="dossier.php" method="get">
						<p>
							<div class="form-group">
								<label for="nom">First and Surname *</label> :
								<p class="help-block">ex: John Cena</p>
								<select data-live-search="true" name="nom" id="nom" data-live-search-style="startsWith" class="selectpicker" required>';

                    $reponse = $bdd->query('SELECT nom FROM dossier');

                    // Display each entry one by one
                    while ($data = $reponse->fetch()) {
                        echo '<option value="' . $data['nom'] . '">' . $data['nom'] . '</option>';

                    }
                    $reponse->closeCursor(); // Complete query

                    /*

            <option value="4444">4444</option>
            <option value="Fedex">Fedex</option>
            <option value="Elite">Elite</option>
            <option value="Interp">Interp</option>
            <option value="Test">Test</option>
                    */
                    echo '
    </select>
								<br />
							</div>
							<input type="submit" value="Send" class="btn btn-info" />
						</p>
					</form>
                                        
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
                   &copy; 2018 LSMD | Coded by : Glen McMahon
        </div>
    </div>
</div> </section> <!-- FOOTER SECTION END--> <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  --> <!-- CORE JQUERY  --> <script src="assets/js/jquery-1.10.2.js"></script> <!-- BOOTSTRAP SCRIPTS  --> <script src="assets/js/bootstrap.js"></script> <!-- DATATABLE SCRIPTS  --> <script src="assets/js/dataTables/jquery.dataTables.js"></script> <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> <!-- CUSTOM SCRIPTS  --> <script src="assets/js/custom.js"></script> </body> ';


    }

    } else {
    header("Location: login.php");
}
?> </html>
