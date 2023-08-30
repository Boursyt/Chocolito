
<div>
    <h3 class="titre">Détails du paiement</h3>
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

                <td class="ligne"><?=$paiementSimple->id?></td>
                <td class="ligne"><?=$paiementSimple->id_client?></td>
                <td class="ligne"><?=$paiementSimple->id_commande?></td>
                <td class="ligne"><?=$paiementSimple->typecarte?></td>
                <td class="ligne"><?=$paiementSimple->date?></td>
                <td class="ligne"><?=$paiementSimple->heure?></td>
                <td class="ligne"><?=$paiementSimple->montant/100?>€</td>
                <td class="ligne"><?=$paiementSimple->pin6?></td>


        </tbody>
    </table>
</div>
