<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<![endif]-->
			<title>LSMD</title>
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
		<?php include( "config.php"); session_start();
		if (isset($_SESSION[ 'id']) and  $_SESSION['Allow'] == 1 ) {

                require 'nav.php';
                $nav = getNavigation($_SERVER['PHP_SELF']);


            function CallAPI($method, $url, $data = false)
            {
                $curl = curl_init();

                switch ($method)
                {
                    case "POST":
                        curl_setopt($curl, CURLOPT_POST, 1);

                        if ($data)
                            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                        break;
                    case "PUT":
                        curl_setopt($curl, CURLOPT_PUT, 1);
                        break;
                    default:
                        if ($data)
                            $url = sprintf("%s?%s", $url, http_build_query($data));
                }

                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

                $result = curl_exec($curl);

                curl_close($curl);

                return $result;
            }



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
						<a class="navbar-brand" href="police.php">
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
			<!-- MENU SECTION END-->
			';

            if(isset($_POST['nom'])){

                $nbdossier = $bdd->query('SELECT COUNT(*) AS nb FROM dossier WHERE nom = "'.$_POST['nom'].'"');
                while($nbdossierData = $nbdossier->fetch()){
                    $nombredossier = $nbdossierData['nb'];
                }
                $nbdossier->closeCursor(); // Complete query


                if($nombredossier == 0) {

                    echo '
<div class="panel panel-info">
				<div class="panel-heading">
					<p></p>
					<p></p>Créer un nouveau dossier médical
					<p></p>
					<p></p>
				</div>
				<div class="panel-body">
					<form action="dossier_post.php" method="post">
						<p>
							<div class="form-group">
								<label for="nom">First and Surname *</label> :
								<p class="help-block">ex: John Cena</p>
								<input type="text"  class="form-control"  value="' . $_POST['nom'] . '" required disabled/>
								<input type="hidden" name="nom" id="nom" value="' . $_POST['nom'] . '">
								<br />
							</div>
							<div class="form-group">
								<label for="message">Telephone</label> :
								<p class="help-block">ex: 555-12345</p>
								<input type="text" name="numero" id="numero" class="form-control" />
								<br />
							</div>
							<div class="form-group">
								<label for="message">Date de naissance *</label> :
								<p class="help-block">ex: 2012-12-21</p>
								<input type="date" name="naissance" id="naissance" class="form-control" required />
								<br />
							</div>
							<div class="form-group">
								<label for="message">Sexe *</label> :
								<p class="help-block"> Homme / Femme </p>
								<select class="form-control" name="sexe" id="sexe" required>
								<option value="Homme">Homme</option>
								<option value="Femme">Femme</option>
								
</select>
								
							</div>
							<div class="form-group">
								<label for="message">Type *</label> :
								<p class="help-block"> Africain/Européen/Asiatique </p>
								<select class="form-control" name="type" id="type" required>
								<option value="Européen">Européen</option>
								<option value="Africain">Africain</option>
								<option value="Asiatique">Asiatique</option>
								
</select>
<br />
							</div>
						
							<input type="submit" value="Send" class="btn btn-info" />
						</p>
					</form>
					<p></p>
					<img src="assets/img/lsmd-bandeau.png" align="center">
					</div>
				</div>
				<!-- CONTENT-WRAPPER SECTION END-->
				<section class="footer-section">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
                   &copy; 2018 LSMD |
								<a href="https://www.youtube.com/user/davendrix" target="_blank"  > Coded by : Davendrix</a> &amp;  Glen McMahon
							</div>
						</div>
					</div>
				</section>
				<!-- FOOTER SECTION END-->
				<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
				<!-- CORE JQUERY  -->
				<script src="assets/js/jquery-1.10.2.js"></script>
				<!-- BOOTSTRAP SCRIPTS  -->
				<script src="assets/js/bootstrap.js"></script>
			</body>';
                }else{
                    header("Location: add_accident.php?dossier=".$_POST['nom']);
                }
            }else {

                if (isset($_GET['dossier'])) {

                    echo'
<div class="panel panel-info">
				<div class="panel-heading">
					<p></p>
					<p></p>Ajouter un accident
					<p></p>
					<p></p>
				</div>
				<div class="panel-body">
					<form action="add_accident_post.php" method="post">
						<p>
							<div class="form-group">
								<label for="nom">First and Surname *</label> :
								<p class="help-block">ex: John Cena</p>
								<input type="text" name="nom" id="nom" class="form-control"  value="'.$_GET['dossier'].'" required disabled/>
								<input type="hidden" name="nom" id="nom" value="'.$_GET['dossier'].'">
								<br />
							</div>
							<div class="form-group">
								<label for="message">Description de l\'accident *</label> :
								<p class="help-block">ex: A trop discuter avec Defesse</p>
								<input type="text" name="description" id="description" class="form-control" />
								<br />
							</div>
							<div class="form-group">
								<label for="message">Action effectué *</label> :
								<p class="help-block">ex: Envoie vers un psychologue</p>
								<input type="text" name="action" id="action" class="form-control" required />
								<br />
							</div>
							<div class="form-group">
								<label for="message">Prix *</label> :
								<p class="help-block">ex: 0</p>
								<input type="number" name="prix" id="prix" class="form-control" required />
								<br />
							</div>
							
							<input type="submit" value="Send" class="btn btn-info" />
						</p>
					</form>
					<p></p>
					<img src="assets/img/lsmd-bandeau.png" align="center">
					</div>
				</div>
				<!-- CONTENT-WRAPPER SECTION END-->
				<section class="footer-section">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
                   &copy; 2018 LSMD |
								 Coded by :  Glen McMahon
							</div>
						</div>
					</div>
				</section>
				<!-- FOOTER SECTION END-->
				<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
				<!-- CORE JQUERY  -->
				<script src="assets/js/jquery-1.10.2.js"></script>
				<!-- BOOTSTRAP SCRIPTS  -->
				<script src="assets/js/bootstrap.js"></script>
			</body>';

                } else {

                    // Ne pas changer :
                    $method = "GET";
                    $url = "https://gta-fivelife.fr/api/players.php";

                    //https://gta-fivelife.fr/api/players.php?password=6a4fdf6da028facc1dc4ba29593e6523


                    $request = array("password" => '6a4fdf6da028facc1dc4ba29593e6523');

                    $res = CallAPI($method, $url, $request);
                    $resultat = json_decode($res);


                    $array = $resultat->{'result'};
                    //print_r($array);


                    echo '
<div class="panel panel-info">
				<div class="panel-heading">
					<p></p>
					<p></p>Ajouter un accident
					<p></p>
					<p></p>
				</div>
				<div class="panel-body">
					<form action="add_accident.php" method="post">
						<p>
							<div class="form-group">
								<label for="nom">First and Surname *</label> :
								<p class="help-block">ex: John Cena</p>
								<select data-live-search="true" name="nom" id="nom" data-live-search-style="startsWith" class="selectpicker">';

                    foreach ($array as $value) {
                        echo '<option value="' . $value . '">' . $value . '</option>';
                    }
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
					<p></p>
					</div>
				</div>
				<!-- CONTENT-WRAPPER SECTION END-->
				<section class="footer-section">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
                   &copy; 2018 LSMD |
								<a href="https://www.youtube.com/user/davendrix" target="_blank"  > Coded by : Davendrix</a> &amp;  Glen McMahon
							</div>
						</div>
					</div>
				</section>
				<!-- FOOTER SECTION END-->
				<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
				<!-- CORE JQUERY  -->
				<script src="assets/js/jquery-1.10.2.js"></script>
				<!-- BOOTSTRAP SCRIPTS  -->
				<script src="assets/js/bootstrap.js"></script>
			</body>';
                }
            }




		} else { header( "Location: login.php"); } ?>
		</html>
