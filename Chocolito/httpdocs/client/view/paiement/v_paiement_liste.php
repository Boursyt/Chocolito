
<div>
    <h3 class="titre">vos paiements</h3>
    <table class="tableCmdLst" style="margin-right: auto; margin-left: auto;">
        <thead>
        <tr>
            <th class="ligne">id</th>
            <th class="ligne">id_client</th>
            <th class="ligne">id_commande</th>
            <th class="ligne">typecarte</th>
            <th class="ligne">date</th>
            <th class="ligne">heure</th>
            <th class="ligne">montant</th>
            <th class="ligne">pin6</th>




        </tr>
        </thead>
        <tbody>
        <?php foreach ($paiement as $unpaiement) : ?>
            <tr>

                <td class="ligne"><?=$unpaiement->id?></td>
                <td class="ligne"><?=$unpaiement->id_client?></td>
                <td class="ligne"><?=$unpaiement->id_commande?></td>
                <td class="ligne"><?=$unpaiement->typecarte?></td>
                <td class="ligne"><?=$unpaiement->date?></td>
                <td class="ligne"><?=$unpaiement->heure?></td>
                <td class="ligne"><?=$unpaiement->montant/100?>€</td>
                <td class="ligne"><?=$unpaiement->pin6?></td>

                <td class="td-btn">
                <form action="<?=$_GET['url']?>" method="post">
                    <button class="bouton" name="details-id-paiement" value="<?=$unpaiement->id?>">
                        voir
                    </button>
                </form>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
