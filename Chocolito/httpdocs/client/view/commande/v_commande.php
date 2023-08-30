
<div>
    <h3 class="titre">Détails de la facturation</h3>
    <table class="tableCmdLst" style="margin-right: auto; margin-left: auto;">
        <thead>
        <tr>
            <th class="ligne">Identifiant Commande</th>
            <th class="ligne">Nom de livraison</th>
            <th class="ligne">Prénom </th>
            <th class="ligne">E-mail </th>
            <th class="ligne">Téléphone </th>
            <th class="ligne">Adresse </th>
            <th class="ligne">Complément</th>
            <th class="ligne">Code postal </th>
            <th class="ligne">Ville</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td class="ligne"><?=$detailsCommande->id?></td>
            <td class="ligne"><?=$detailsCommande->nom?></td>
            <td class="ligne"><?=$detailsCommande->prenom?></td>
            <td class="ligne"><?=$detailsCommande->email?></td>
            <td class="ligne"><?=$detailsCommande->telephone?></td>
            <td class="ligne"><?=$detailsCommande->adresse?></td>
            <td class="ligne"><?=$detailsCommande->complement?></td>
            <td class="ligne"><?=$detailsCommande->code_postal?></td>
            <td class="ligne"><?=$detailsCommande->ville?></td>
        </tr>

        </tbody>
    </table>



</div>


<div>
    <h3 class="titre">Détails de la livraison</h3>
    <table class="tableCmdLst" style="margin-right: auto; margin-left: auto;">
        <thead>
        <tr>
            <th class="ligne">Identifiant Commande</th>
            <th class="ligne">Nom de livraison</th>
            <th class="ligne">Prénom de livraison</th>
            <th class="ligne">E-mail de livraison</th>
            <th class="ligne">Téléphone de livraison</th>
            <th class="ligne">Adresse de livraison</th>
            <th class="ligne">Complément</th>
            <th class="ligne">Code postal de livraison</th>
            <th class="ligne">Ville de livraison</th>
        </tr>
        </thead>
        <tbody>

                    <tr>
                        <td class="ligne"><?=$detailsCommande->id?></td>
                        <td class="ligne"><?=$detailsCommande->nom_livraison?></td>
                        <td class="ligne"><?=$detailsCommande->prenom_livraison?></td>
                        <td class="ligne"><?=$detailsCommande->email_livraison?></td>
                        <td class="ligne"><?=$detailsCommande->telephone_livraison?></td>
                        <td class="ligne"><?=$detailsCommande->adresse_livraison?></td>
                        <td class="ligne"><?=$detailsCommande->complement_livraison?></td>
                        <td class="ligne"><?=$detailsCommande->code_postal_livraison?></td>
                        <td class="ligne"><?=$detailsCommande->ville_livraison?></td>
                    </tr>

        </tbody>
    </table>

    <h3 class="titre">total de la commande:</h3>
    <p class="prix"><?=$detailsCommande->prix_TOT?>€</p>

</div>
