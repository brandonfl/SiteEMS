<?php

function getNavigation($current){ //$_SERVER['PHP_SELF']

    $resultat = '';

    if($current == "/lsmd.php"){
        $resultat .= '<li>
                                        <a href="lsmd.php" class="menu-top-active">Home</a>
                                    </li>';
    }else{
        $resultat .= '<li>
                                        <a href="lsmd.php">Home</a>
                                    </li>';
    }

    if($current == "/add_accident.php"){
        $resultat .= '<li>
										<a href="add_accident.php" class="menu-top-active">Ajouter un accident</a>
									</li>';
    }else{
        $resultat .= '<li>
										<a href="add_accident.php">Ajouter un accident</a>
									</li>';
    }

    if($current == "/contre-visite.php" or $current == "/add_visite.php"){
        $resultat .= '<li>
										<a href="contre-visite.php" class="menu-top-active">Contre Visites</a>
									</li>';
    }else{
        $resultat .= '<li>
										<a href="contre-visite.php">Contre Visites</a>
									</li>';
    }


    if($current == "/vehicule.php"){
        $resultat .= '<li>
										<a href="vehicule.php" class="menu-top-active">Vehicule</a>
									</li>';

    }else{
        $resultat .= '<li>
										<a href="vehicule.php">Vehicule</a>
									</li>';

    }

/*
    $resultat .= '<li>
											<a href="trello" target="_blank">Informations Internes</a>
										</li>
										<li>
											<a href="drive" target="_blank">Documents</a>
										</li>';
*/

    return $resultat;

}


function getAdminNavigation($current){ //$_SERVER['PHP_SELF']

    $resultat = '<li>
                                        <a href="lsmd.php">LSMD</a>
                                    </li>';



    if($current == "/administration.php"){
        $resultat .= ' <li>
										<a href="administration.php" class="menu-top-active">Administration</a>
									</li>';
    }else{
        $resultat .= ' <li>
										<a href="administration.php">Administration</a>
									</li>';
    }

    if($current == "/administration_annonce.php" or $current == "/administration_annonce_add.php"){
        $resultat .= '<li>
										<a href="administration_annonce.php" class="menu-top-active">Annonce</a>
									</li>';
    }else{
        $resultat .= '<li>
										<a href="administration_annonce.php">Annonce</a>
									</li>';
    }


    if($current == "/administration_vehicule.php" or $current == "/administration_vehicule_type_add.php" or $current == "/administration_vehicule_type.php" or $current == "/administration_vehicule_add.php"){
        $resultat .= '<li>
										<a href="administration_vehicule.php" class="menu-top-active">Véhicule</a>
									</li>';
    }else{
        $resultat .= '<li>
										<a href="administration_vehicule.php">Véhicule</a>
									</li>';
    }




    return $resultat;

}



/*
$nav = '                    <li>
                                        <a href="lsmd.php" class="menu-top-active">Home</a>
                                    </li>
                                    <li>
										<a href="add_criminal.php">Ajouter un criminel</a>
									</li>
									<li>
										<a href="bracelet.php">Bracelet</a>
									</li>
									<li>
											<a href="concessionnaire.php">Plaques</a>
										</li>
										<li>
										<a href="vehicule.php">Vehicule</a>
									</li>
										<li>
											<a href="trello" target="_blank">Informations Internes</a>
										</li>
										<li>
											<a href="drive" target="_blank">Documents</a>
										</li>';
*/

?>