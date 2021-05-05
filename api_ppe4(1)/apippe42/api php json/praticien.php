<?php
include('template.php');

	//Sinon on affiche tous les vols
	$requete = $pdo->prepare("SELECT * FROM `praticien`");
if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);

	$success = true;
	$data['code postal'] = count($resultats);
	$data['nom praticien et medicament'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);
