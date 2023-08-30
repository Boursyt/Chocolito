
<div class="PageCommande">

<form action="/commande" method="post">
    <div class="AdresseFacturation">
        <p class="TexteAdresse">Adresse de facturation</p>


            <div class="adresseFacturation">
                <div class="Identite">
                    <label class="nom" for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" required>
                    <label class="prenom" for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" required>
                </div>
                <div class="contactFacturation">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" id="telephone" required>

                </div>
                <div class="AdrrZip">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" id="adresse" required>
                    <label for="complement">Complément</label>
                    <input type="text" name="complement" id="complement" >
                    <label for="code_postal">Code Postal</label>
                    <input type="text" name="code_postal" id="code_postal" required>
                </div>
                <label class="ville" for="ville">Ville</label>
                <input type="text" name="ville" id="ville" required>

            </div>

    </div>

    <div class="AdresseLivraison">
        <p class="TexteAdresse">Adresse de livraison</p>
        <div class="adresseLivraison">
            <div class="Identite">
                <label class="nom" for="nom_livraison">Nom</label>
                <input type="text" name="nom_livraison" id="nom_livraison" required>
                <label class="prenom" for="prenom_livraison">Prénom</label>
                <input type="text" name="prenom_livraison" id="prenom_livraison" required>
            </div>
            <div class="contactLivraison">
                <label for="email_livraison">Email</label>
                <input type="text" name="email_livraison" id="email_livraison" required>
                <label for="telephone_livraison">Téléphone</label>
                <input type="text" name="telephone_livraison" id="telephone_livraison" required>

            </div>
            <div class="AdrrZip">
                <label for="adresse_livraison">Adresse</label>
                <input type="text" name="adresse_livraison" id="adresse_livraison" required>
                <label for="complement_livraison">Complément</label>
                <input type="text" name="complement_livraison" id="complement_livraison" >
                <label for="code_postal_livraison">Code Postal</label>
                <input type="text" name="code_postal_livraison" id="codePostal_livraison" required>

            </div>
                <label class="ville" for="ville_livraison">Ville</label>
                <input type="text" name="ville_livraison" id="ville_livraison" required>
        </div>
        
    </div>

    <div class="paiement">
        <input type="submit" class="bouton"value="Continuer vers le paiement"/>

    </div>
</form>

</div>

