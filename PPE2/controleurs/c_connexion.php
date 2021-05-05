<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
// generateToken();
switch($action){
	case 'demandeConnexion':{
		// verifyToken($_SERVER['REMOTE_ADDR'].time());
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		// verifyToken($_SERVER['REMOTE_ADDR'].time());
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		if(!is_array( $visiteur)){
			$comptable = $pdo->getInfosComptable($login,$mdp);
			if(!is_array( $comptable)){
				ajouterErreur("Login ou mot de passe incorrect");
				include("vues/v_erreurs.php");
				include("vues/v_connexion.php");
			} else {
				$id = $comptable['id'];
				$nom = $comptable['nom'];
				$prenom = $comptable['prenom'];
				connecterComptable($id,$nom,$prenom);
				include("vues/v_sommaire.php");
			}
		} else {
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
			connecter($id,$nom,$prenom);
			include("vues/v_sommaire.php");
		}
		break;
	}
	case 'deconnexion':{
		deconnecter();
	}
	default :{
		// verifyToken($_SERVER['REMOTE_ADDR'].time());
		include("vues/v_connexion.php");
		break;
	}
}
?>
