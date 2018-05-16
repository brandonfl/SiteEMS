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

		if (isset($_SESSION[ 'id']) and $_SESSION['Allow'] == 1) {


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


                    $method = "GET";
                    $url = "https://gta-fivelife.fr/api/players.php";

                    //https://gta-fivelife.fr/api/players.php?password=6a4fdf6da028facc1dc4ba29593e6523


                    $request = array("password" => '6a4fdf6da028facc1dc4ba29593e6523');

                    $res = CallAPI($method, $url, $request);
                    $resultat = json_decode($res);


                    $array = $resultat->{'result'};
                    //print_r($array);



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
			<!-- MENU SECTION END-->
			<div class="panel panel-info">
				<div class="panel-heading">
					<p></p>
					<p></p>Ajouter un Patient
					<p></p>
					<p></p>
				</div>
				<div class="panel-body">
					<form action="add_bracelet_post.php" method="post">
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
    </div>
    </br>
							<div class="form-group">
								<label for="message">Raison *</label> :
								<p class="help-block">ex: bandage à controler</p>
								<input type="text" name="raison" id="raison" class="form-control" />
								<br />
							</div>
							<div class="form-group">
								<label for="message">Date de fin *</label> :
								<p class="help-block">ex: 2012-12-21</p>
								<input type="date" name="date" id="date" class="form-control" />
								<br />
							</div>
							<input type="submit" value="Send" class="btn btn-info />
							</p>
					</form>
					<p></p>
					<img src="assets/img/lspdlogo.png" align="center">
					</div>
				</div>
				<!-- CONTENT-WRAPPER SECTION END-->
				<section class="footer-section">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
                   &copy; 2017 LSPD | Coded by :  Glen McMahon
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
			 } else { header( "Location: login.php"); } ?>
		</html>
