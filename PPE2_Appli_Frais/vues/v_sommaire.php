    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">

        <h2>

</h2>

      </div>
      <?php if(isset($_SESSION['idVisiteur'])){ ?>
			<li >
				  Visiteur :<br>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
			</li>
           <li class="smenu">
              <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
           </li>
           <li class="smenu">
              <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
           </li>
 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>
         <br>
         <br>
     <?php } else if($_SESSION['idComptable']){ ?>

     <li >
         Comptable :<br>
       <?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
     </li>
         <li class="smenu">
            <a href="index.php?uc=validerFrais&action=" title="Validation fiche de frais ">Validation fiche frais</a>
         </li>

         <li class="smenu">
            <a href="index.php?uc=connexion&action=ajoutFrais" title="Ajout fiche de frais">Ajout fiche frais</a>
         </li>

         <li class="smenu">
            <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
         </li>
      </ul>
      <br>
      <br>
     <?php } ?>

    </div>
