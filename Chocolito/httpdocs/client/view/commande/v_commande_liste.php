


<div>
    <h3 class="titre">vos commandes</h3>

    <table class="tableCmdLst" style="margin-right: auto; margin-left: auto;">
        <thead>
        <tr>
            <th class="ligne">id</th>
            <th class="ligne">Nom</th>
            <th class="ligne">Prénom</th>
            <th class="ligne">E-mail</th>
            <th class="ligne">Date</th>
            <th class="ligne">Total</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($commandes as $uneCommande) : ?>
                <tr>
                
                    <td class="ligne"><?=$uneCommande->id?></td>
                    <td class="ligne"><?=$uneCommande->nom?></td>
                    <td class="ligne"><?=$uneCommande->prenom?></td>
                    <td class="ligne"><?=$uneCommande->email?></td>
                    <td class="ligne"><?=$uneCommande->date_creation?></td>
                    <td class="ligne"><?=$uneCommande->prix_TOT?>€</td>
                    <td class="td-btn">
                        <form action="<?=$_GET['url']?>" method="post">
                            <button class="bouton" name="details-id_produit" value="<?=$uneCommande->id?>">
                                voir
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
