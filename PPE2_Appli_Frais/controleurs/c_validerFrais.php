<?php
include("vues/v_sommaire.php");
require_once("include/config.php");
require_once("include/class.pdogsb.inc.php");
$action = $_REQUEST['action'];

if (isset($_SESSION['idVisiteur'])){
  $idVisiteur = $_SESSION['idVisiteur'];
} else if (isset($_SESSION['idComptable'])){
  $idComptable = $_SESSION['idComptable'];
} else {
  echo 'ERROR: Undefined id';
  var_dump($_SESSION);
}?>
<p>Espace Comptable</p>
<?php
switch($action){
  case 'afficherFrais':{
      $login = $_POST['id'];
      $mdp = $_POST['mdp'];
      $P1 = new PdoGsb;
      try {
        if($P1->getInfosVisiteur($login, $mdp) == null){
          echo('ERROR: Wrong id or pass');
          header('Refresh:3; url=index.php?uc=validerFrais&action=');
        } else {
          $ligne = $P1->getInfosVisiteur($login, $mdp);
          include("vues/v_afficherfrais.php");
        }
      } catch (PDOException $e) {
        var_dump($e);
      }
    break;
  }
  case 'details':{
    ?>
    <table>
      <tr>
        <th>Id</th><th>IdFrais</th><th>Libelle</th><th>Montant Unitaire</th><th>Montant Totale</th>
      </tr>
    <?php
    $monPdo = new PDO($serveur.';'.$bdd, $user, $mdp);
    $monPdo->query("SET CHARACTER SET utf8");
    $request = 'select visiteur.id as id, ligneFraisForfait.idFraisForfait as idFrais, ligneFraisForfait.quantite as quantite, fraisforfait.libelle as type, fraisforfait.montant as montant from visiteur inner join ligneFraisForfait inner join fraisforfait where visiteur.id = "'.$_GET['detail'].'" AND lignefraisforfait.idVisiteur = "'.$_GET['detail'].'" AND lignefraisforfait.quantite > 0 AND fraisforfait.id = lignefraisforfait.idFraisForfait';

    $stmt = $monPdo->prepare($request);
    $stmt->execute();
    while($result = $stmt->fetch()){
      ?>
      <tr>
        <form>
          <td>
            <?= $result['id'] ?>
          </td>
          <td>
            <?= $result['idFrais'] ?>
          </td>
          <td>
            <?= $result['type'] ?>
          </td>
          <td>
            <?= $result['montant'] ?>
          </td>
          <td>
            <?= $result['quantite'] * $result['montant'] ?>
          </td>
          <td>
            <div>
              <a href='index.php?uc=validerFrais&action=button&id=<?= $result['id'] ?>&type=<?= $result['idFrais'] ?>'>Del</a>
            </div>
          </td>
        </form>
      </tr><?php
		}
    ?>
    </table>
    <?php
    break;
  }
  case 'button':{
    $monPdo = new PDO($serveur.';'.$bdd, $user, $mdp);
    $monPdo->query("SET CHARACTER SET utf8");
    $request = 'update lignefraisforfait set quantite = 0 where lignefraisforfait.idVisiteur = "'.$_GET['id'].'" AND lignefraisforfait.idFraisForfait = "'.$_GET['type'].'"';
    $stmt = $monPdo->prepare($request);
    $stmt->execute();
    $stmt->fetch();
  break;
  }
  default:{
    ?>
    <form method="POST" action="index.php?uc=validerFrais&action=afficherFrais" class="text-center">
      <label for="id">ID Visiteur</label>
      <p><input id="id" type="text" name="id"  size="30" maxlength="45"></p>
      <label for="date">Date</label>
      <p><input id="date" type="date" name="date"  size="30" maxlength="45"></p>
      <input class = "btn btn-success" type="submit">
    </form>
    <?php
  break;
  }
}
