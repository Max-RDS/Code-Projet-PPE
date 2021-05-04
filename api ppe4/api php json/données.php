<?php
include('template.php');

if( !empty($_GET['activite_compl']) && !empty($_GET['composant']) && !empty($_GET['constituer']) && !empty($_GET['dosage']) && !empty($_GET['famille']) && !empty($_GET['formuler']) && !empty($_GET['interagir']) && !empty($_GET['inviter']) && !empty($_GET['labo']) && !empty($_GET['medicament']) && !empty($_GET['offrir']) && !empty($_GET['posseder']) && !empty($_GET['praticien']) && !empty($_GET['prescrire']) && !empty($_GET['presentation']) && !empty($_GET['rapport_visite']) && !empty($_GET['realiser']) && !empty($_GET['region']) && !empty($_GET['secteur']) && !empty($_GET['specialite']) && !empty($_GET['travailler']) && !empty($_GET['type_individu']) && !empty($_GET['type_praticien']) && !empty($_GET['visiteur'])){
	//Si toutes les données sont saisie par le client

	$requete = $pdo->prepare("INSERT INTO `ppe4bts` (`activite_compl`, `composant`, `constituer`, `dosage`, `famille`, `formuler`, `interagir`, `inviter`, `labo`, `meidcament`, `offrir`, `posseder`, `praticien`, `prescrire`, `presentation`, `rapport_visite`, `realiser`, `region`, `secteur`, `specialite`, `travailler`, `type_individu`, `type_praticien`, `visiteur`) VALUES (NULL, :activite_compl, :composant, :constituer, :dosage, :famille, :formuler, :interagir, :inviter, :labo, :medicament, :offrir, :posseder, :praticien, :prescrire, :presentation, :rapport_visite, :realiser, :region, :secteur :specialite, :travailler, :type_individu, :type_praticien, :visiteur);");
	$requete->bindParam(':activite_compl', $_GET['activite_compl']);
	$requete->bindParam(':composant', $_GET['composant']);
	$requete->bindParam(':constituer', $_GET['constituer']);
	$requete->bindParam(':dosage', $_GET['dosage']);
	$requete->bindParam(':famille', $_GET['famille']);
	$requete->bindParam(':formuler', $_GET['formuler']);
	$requete->bindParam(':interagir', $_GET['interagir']);
	$requete->bindParam(':inviter', $_GET['inviter']);
	$requete->bindParam(':labo', $_GET['labo']);
	$requete->bindParam(':medicament', $_GET['medicament']);
	$requete->bindParam(':offrir', $_GET['offrir']);
	$requete->bindParam(':posseder', $_GET['posseder']);
	$requete->bindParam(':praticien', $_GET['praticien']);
	$requete->bindParam(':prescrire', $_GET['prescrire']);
	$requete->bindParam(':presentation', $_GET['presentation']);
	$requete->bindParam(':rapport_visite', $_GET['rapport_visite']);
	$requete->bindParam(':realiser', $_GET['realiser']);
	$requete->bindParam(':region', $_GET['region']);
	$requete->bindParam(':secteur', $_GET['secteur']);
	$requete->bindParam(':specialite', $_GET['specialite']);
	$requete->bindParam(':travailler', $_GET['travailler']);
	$requete->bindParam(':type_individu', $_GET['type_individu']);
	$requete->bindParam(':type_praticien', $_GET['type_praticien']);
	$requete->bindParam(':visiteur', $_GET['visiteur']);
	if( $requete->execute() ){
		$success = true;
		$msg = 'Les données en bien été ajouté';
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "tout est correcte";
}

reponse_json($success, $data, $msg);
