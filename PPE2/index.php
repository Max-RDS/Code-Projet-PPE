<?php
require_once("include/fct.inc.php");
require_once("include/class.pdogsb.inc.php");
include("vues/v_entete.php") ;
session_start();
?>
	<link rel="StyleSheet" href="styles/bootstrap.css"/>
	<link rel="StyleSheet" href="styles/style.css"/>

	<div id="rectangle_1" class="container" ><?php
  $pdo = PdoGsb::getPdoGsb();
  $estConnecte = estConnecte();

  if(!isset($_REQUEST['uc']) || !$estConnecte){
       $_REQUEST['uc'] = 'connexion';
  }
  $uc = $_REQUEST['uc'];
  switch($uc){
    case 'connexion':{
      include("controleurs/c_connexion.php");break;
    }
    case 'gererFrais' :{
      include("controleurs/c_gererFrais.php");break;
    }
    case 'etatFrais' :{
      include("controleurs/c_etatFrais.php");break;
    }
    case 'validerFrais' :{
      include("controleurs/c_validerFrais.php");break;
    }
    case 'validerfichefrais' :{

      include("controleurs/c_validerFrais.php");break;
    }
    case 'ajoutFrais' :{
      include("controleurs/c_ajoutFrais.php");break;
    }
  }
  include("vues/v_pied.php") ;
  ?></div>
	<div id="rectangle_2"  ></div>
