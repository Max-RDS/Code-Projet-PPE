<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-6 mb-4">                                                                                                                                                                                                <!-- Mise en place des vignette  -->
      <div class="card h-100">
        <div id="contenu">
          <h2>Mes fiches de frais</h2>
          <h3>Mois à sélectionner : </h3>
          <form action="index.php?uc=etatFrais&action=voirEtatFrais" method="post">
            <div class="corpsForm">
              <p>
              <label for="lstMois" accesskey="n">Mois : </label>
              <select id="lstMois" name="lstMois">
                <?php
			          foreach ($lesMois as $unMois)
			          {
			          $mois = $unMois['mois'];
				        $numAnnee =  $unMois['numAnnee'];
				        $numMois =  $unMois['numMois'];
				       if($mois == $moisASelectionner){
				        ?>
				        <option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				        <?php 
				          }
				          else{ 
                ?>
				        <option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				        <?php 
				          }
			            }
		            ?>    
              </select>
              </p>
            </div>
            <div class="piedForm">
              <p>
                <input id="ok" class="btn btn-success" type="submit" value="Valider" size="20" />
                <input id="annuler" class="btn btn-success"  type="reset" value="Effacer" size="20" />
              </p> 
            </div>   
          </form>
        </div>
      </div>
    </div>
  </div>
</div>