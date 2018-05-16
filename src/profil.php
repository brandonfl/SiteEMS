<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
            <title>LSMD PROFIL</title>
            <!-- BOOTSTRAP CORE STYLE  -->
            <link href="assets/css/bootstrap.css" rel="stylesheet" />
            <!-- FONT AWESOME STYLE  -->
            <link href="assets/css/font-awesome.css" rel="stylesheet" />
            <!-- CUSTOM STYLE  -->
            <link href="assets/css/style.css" rel="stylesheet" /> 
            <!-- GOOGLE FONT -->
            <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <style type="text/css">a:link{text-decoration:none}</style>
        <script>

            $(document).ready(function()
            {
                var navItems = $('.admin-menu li > a');
                var navListItems = $('.admin-menu li');
                var allWells = $('.admin-content');
                var allWellsExceptFirst = $('.admin-content:not(:first)');
                allWellsExceptFirst.hide();
                navItems.click(function(e)
                {
                    e.preventDefault();
                    navListItems.removeClass('active');
                    $(this).closest('li').addClass('active');
                    allWells.hide();
                    var target = $(this).attr('data-target-id');
                    $('#' + target).show();
                });
            });
        </script>
        </head>
        <?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
session_start();





if (isset($_SESSION['id']) and $_SESSION['Allow'] == 1) {
    include("config.php");
    $ID=$_SESSION['id'];

    $rang = "Medecin";




            $logo = '<a class="navbar-brand" href="lsmd.php">
                            <img src="assets/img/lsmd-bandeau.png" height=70/>
                        </a>';

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
                                    '. $nav .'
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
                            <h4 class="header-line">Profil</h4>
                        </div>
                    </div>
                                        

                                    ';

    if (isset($error)) {

        if($error == 0){
            echo '
    <div class="alert alert-success alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> Le mot de passe a été modifié</div>
    
    ';}

        if($error == 1){
    echo '
    <div class="alert alert-danger alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Le mot de passe de confirmation doit être le même que le nouveau proposé</div>
    
    ';}

    
}

    if($_SESSION['Admin'] == 1){
        $ad = '<a href="administration.php"><div class="label label-danger">Administrateur</div></a>';
    }else{
        $ad = ' ';
    }

    if($_SESSION['PDG'] == 1){
        $pdg = '<a href="pdg.php"><div class="label label-danger">PDG</div></a>';
    }else{
        $pdg = ' ';
    }


    echo '
                                            
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  
        <div class="row">

            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked admin-menu" >
                    <li class="active"><a href="" data-target-id="profile"><i class="glyphicon glyphicon-user"></i> Profil</a></li>
                    <li><a href="" data-target-id="change-password"><i class="glyphicon glyphicon-lock"></i> Changer son mot de passe</a></li>
                </ul>
            </div>

            <div class="col-md-9  admin-content" id="profile">
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nom</h3>
                    </div>
                    <div class="panel-body">
                        '.$_SESSION['pseudo'].'
                    </div>
                </div>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Email</h3>
                    </div>
                    <div class="panel-body">
                        '.$_SESSION['mail'].'
                    </div>
                </div>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Rang</h3>
                    </div>
                    <div class="panel-body">
                         <div class="label label-success">'.$rang.'</div>
                         '.$pdg.'<strong> </strong>'.$ad.'
                    </div>
                </div>
                
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Derniere Connexion</h3>

                    </div>
                    <div class="panel-body">
                        '.$_SESSION['connexion'].'
                    </div>
                </div>

            </div>

            <div class="col-md-9  admin-content" id="change-password">
                <form action="edit-password.php" method="post">

           
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><label for="new_password" class="control-label panel-title">Nouveau mot de passe</label></h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="new_password" >
                                </div>
                            </div>

                        </div>
                    </div>

             
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><label for="confirm_password" class="control-label panel-title">Confirmez le nouveau mot de passe</label></h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password_confirmation" id="confirm_password" >
                                </div>
                            </div>
                        </div>
                    </div>

           
                    <div class="panel panel-info border" style="margin: 1em;">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="pull-left">
                                        <input type="hidden" name="id" id="id" value="' . $_SESSION['id'] . '">
                                    <input type="submit" class="form-control btn btn-primary" name="submit" id="submit">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

           



                </div>

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
             Coded by :  Glen McMahon
        </div>
    </div>
</div> </section> <!-- FOOTER SECTION END--> <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  --> <!-- CORE JQUERY  --> <script src="assets/js/jquery-1.10.2.js"></script> <!-- BOOTSTRAP SCRIPTS  --> <script src="assets/js/bootstrap.js"></script> <!-- DATATABLE SCRIPTS  --> <script src="assets/js/dataTables/jquery.dataTables.js"></script> <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> <!-- CUSTOM SCRIPTS  --> <script src="assets/js/custom.js"></script> </body>';
} else {
    header("Location: login.php");
}
?> </html>
