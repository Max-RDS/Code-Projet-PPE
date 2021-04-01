<div class="container">
      <div class="row">
            <div class="col-lg-12 col-md-6 mb-4"> 
                  <div class="card h-100">
                        <div id="contenu">
                              <h2>Identification utilisateur</h2>
                              <form method="POST" action="index.php?uc=connexion&action=valideConnexion"  class="text-center">
                                    <br>   
                                    <label for="nom">Login</label>
                                    <input id="login" type="text" name="login"  size="30" maxlength="45">
                                    <br>
                                    <br>
		                        <label for="mdp">Mot de passe</label>
			                  <input id="mdp"  type="password"  name="mdp" size="30" maxlength="45">
                                    <br>
                                    <br>
                                    <input class = "btn btn-success" type="submit" value="Valider" name="valider">
                                    <input class = "btn btn-success" type="reset" value="Annuler" name="annuler">
                              </form>
                        </div>
                  </div>
            </div>
      </div>      
</div>