
<html> 
    <table>
        <tr>
            <td>id produit</td>
            <td>nom</td>
            <td>quantite</td>
            <td>retour</td>
        </tr>
      
    <?php foreach($lstRetour as $unRetour): ?>
        <tr>
            <td><?= $unRetour['id'] ?></td>
            <td><?= $unRetour['nom'] ?></td>
            <td><?= $unRetour['quantite'] ?></td>
            <td><?= $unRetour['retour'] ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</html>
