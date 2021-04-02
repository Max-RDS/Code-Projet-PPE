<table>
    <tr><th>Nom</th><th>Prénom</th>
    <tr>
        <form>
            <td>
                <?= $ligne['nom'];?>
            </td>
            <td>
                <?= $ligne['prenom'];?>
            </td>
            <td>
                <a href='index.php?uc=validerFrais&action=details&detail=<?= $ligne['id']; ?>'>Détails</a>
            </td>
        </form>
    </tr>
</table>