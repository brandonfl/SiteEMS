<?php

include("config.php");

if(isset($_GET['nom'])){


    $reponse3 = $bdd->query('SELECT COUNT(*) AS nb FROM dossier WHERE nom="'.$_GET['nom'].'"');
    $nombre = 0;

    // Display each entry one by one
    while ($data = $reponse3->fetch()){
        $nombre = $data['nb'];

    }
    $reponse3->closeCursor(); // Complete query

   if($nombre == 1){


?>



<html xmlns="http://www.w3.org/1999/html">
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
    <!--<link href="https://lsmd-fivelife.fr/assets/css/bootstrap.css" rel="stylesheet" />-->
   <!-- FONT AWESOME STYLE  -->
    <link href="https://lsmd-fivelife.fr/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="https://lsmd-fivelife.fr/assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<head>

    <style>
        .profile-teaser-left {
            float: left; width: 20%; margin-right: 1%;
        }
        .profile-img img {
            width: 100%; height: auto;
        }

        .profile-teaser-main {
            float: left; width: 79%;
        }

        .info { display: inline-block; margin-right: 10px; color: #777; }
        .info span { font-weight: bold; }

        .tooltp {
            position: absolute;
            background: pink;
            border-bottom:
            float: right;
            width: 0px;
            right: 60px;
            padding: 10px 0px;
            margin: -5px;
            -webkit-transition: width 2s; /* For Safari 3.1 to 6.0 */
            transition: width 2s;
            overflow: hidden;
        }
        .lnk_usr:hover .tooltp{
            overflow: hidden;
            display: block;
            right: 60px;
            width: 100px;
        }



    </style>
</head>

<body>
<!-- MENU SECTION END-->
        <div class="row" style="position: relative">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                    <div class="panel-body">



                                <div class="list-group">
                                    <div class="list-group-item clearfix">
                                        <center><img src="https://lsmd-fivelife.fr/assets/img/lsmd-bandeau.png"></center>

                                        <br><br>

                                        <div class="profile-head">
                                            <div class="col-md-2 col-sm-3 col-xs-5">
                                            </div>
                                            <div class="col-md-9 col-sm-8 col-xs-9">
                                                <div class="row">
                                                    <div class="col-sm-12"><h2><?php echo($_GET['nom'])?></h2>
                                                        <hr/>
                                                    </div>

                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                        <h4 style="all: unset;font-size: 20px">Caractéristiques</h4>
                                                    </div>
                                                    <?php


                                                    $reponse2 = $bdd->query('SELECT * FROM dossier WHERE nom="'.$_GET['nom'].'"');

                                                    // Display each entry one by one
                                                    while ($carac = $reponse2->fetch()){
                                                        $naissance = $carac['naissance'];
                                                        $type = $carac['type'];
                                                        $sexe = $carac['sexe'];
                                                        $numero = $carac['numero'];

                                                    }
                                                    $reponse2->closeCursor(); // Complete query

                                                    ?>

                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                        <p><strong>Date de naissance</strong></p>
                                                        <p><strong>Type</strong></p>
                                                        <p><strong>Sexe</strong></p>
                                                        <p><strong>Numero</strong></p>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                        <p><?php echo($naissance)?></p>
                                                        <p><?php echo($type)?></p>
                                                        <p><?php echo($sexe)?></p>
                                                        <p><?php echo($numero)?></p>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <hr/>
                                                    </div>

                                                </div>
                                                    <h4 style="all: unset;font-size: 20px">Historique medicale</h4>
                                                <br>


                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Horodateur</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Effectué</th>
                                                        <th scope="col">Medecin</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    // Get contents of the lspd table
    $reponse = $bdd->query('SELECT * FROM lsmd WHERE dossier="'.$_GET['nom'].'"');

    // Display each entry one by one
    while ($data = $reponse->fetch()) {
?>
                                               <tr>

                                                    <td>
                                                        <?php
        echo $data['horodateur'];
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
                                                </tr>

                                                <?php
    }
    $reponse->closeCursor(); // Complete query
    ?>

                                                    </tbody>
                                                </table>

                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- item -->

                                </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /. ROW  -->
</div>
<!-- /. ROW  -->
<!-- End  Hover Rows  -->
</div>
</div>
<!-- /. ROW  -->
</div> </div> <!-- CONTENT-WRAPPER SECTION END-->

</body>
</html>
<?php }else{ ?>

       <html xmlns="http://www.w3.org/1999/html">
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

       <head>
           <link rel="icon" type="image/x-icon" href="assets/img/lsmdico.ico" />
           <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="assets/img/lsmdico.ico" /><![endif]-->

           <style>
               .profile-teaser-left {
                   float: left; width: 20%; margin-right: 1%;
               }
               .profile-img img {
                   width: 100%; height: auto;
               }

               .profile-teaser-main {
                   float: left; width: 79%;
               }

               .info { display: inline-block; margin-right: 10px; color: #777; }
               .info span { font-weight: bold; }

               .tooltp {
                   position: absolute;
                   background: pink;
                   border-bottom:
                   float: right;
                   width: 0px;
                   right: 60px;
                   padding: 10px 0px;
                   margin: -5px;
                   -webkit-transition: width 2s; /* For Safari 3.1 to 6.0 */
                   transition: width 2s;
                   overflow: hidden;
               }
               .lnk_usr:hover .tooltp{
                   overflow: hidden;
                   display: block;
                   right: 60px;
                   width: 100px;
               }

           </style>
       </head>

       <body>
       <!-- MENU SECTION END-->
       <div class="row">
           <div class="col-md-12">
               <!-- Advanced Tables -->
               <div class="panel-body">



                   <div class="list-group">
                       <div class="list-group-item clearfix">
                           <center><h3>Aucun dossier présent actuellement</h3></center>
                       </div>

                   </div><!-- item -->

               </div>




           </div>
       </div>
       </div>
       </div>
       </div>
       <!-- /. ROW  -->
       </div>
       <!-- /. ROW  -->
       <!-- End  Hover Rows  -->
       </div>
       </div>
       <!-- /. ROW  -->
       </div> </div> <!-- CONTENT-WRAPPER SECTION END-->

       </body>
       </html>


 <?php

   }
} ?>