
<html> 
    <table>
        <tr>
            <td>id </td>
            <td>nom</td>
            <td>quantite avant</td>
            <td>quantite apres</td>
            <td>retour</td>
        </tr>
      
    <?php foreach($lstRetour as $unRetour): ?>
        <tr>
            <td><?= $unRetour['id'] ?></td>
            <td><?= $unRetour['nom']?></td>
            <td><?= $unRetour['quantite'] ?></td>
            <td><?= $unRetour['quantiteApres'] ?></td>
            <td><?= $unRetour['retour'] ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</html>
