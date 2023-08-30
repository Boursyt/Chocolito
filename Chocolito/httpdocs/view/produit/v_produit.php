<?php

///var_dump($unProduit);



?>
<meta name="viewport" content="width=device-width"/>

<div class="Page_Produit">
    <div class="imageProduit">
        <img class="imageProduit" src="<?=$unProduit['image']?>" alt="image"/>
    </div>
    <div class="info_produit">

        <div class="nomProduit">
            <h1><?=$unProduit['nom'] ?></h1>

            <div class="descriptionProduit">
                <p><?=$unProduit['description'] ?>  </p>
            </div>

            <div class="prixProduit">
                <h2><?=$unProduit['prix']; echo("€")?></h2>
            </div>
            <div class="stock">
                <p><?=$unProduit['stock']; echo(" produit en stock")?></p>

                <div class="boutonAjouterPanier">
                    <form action="<?=$_GET['url'].'/'.$unProduit['identifiant']?>/" method="post" >
                        quantite : <input type="number" required name="quantite" value="1" min="1" max="5">
                        <input type="submit" class="bouton"  value="Ajouter au panier"/>
                    </form>


                </div>


            </div>

</div>






