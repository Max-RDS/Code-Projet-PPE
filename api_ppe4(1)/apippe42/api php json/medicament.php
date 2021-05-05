<?php
include('template.php');

	//Sinon on affiche tous les médicament
  $requete = $pdo->prepare("SELECT * FROM `medicament`");
if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);

	$success = true;
	$data['numéro dépôt local'] = count($resultats);
	$data['nom médicament'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);
