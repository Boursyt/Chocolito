<?php foreach ($lstProduitPanier as $unProduit): ?>

    <div class="UnProduitDansPanier">
        <div >
            <img class="imageProdPan grid-item" src="<?=$unProduit['image']?>" alt="image"/>
        </div>
        <div class="nomProdPan grid-item">
            <p><?=$unProduit['nom']?></p>
        </div>
        <div class="prixProdPan grid-item">
            <p><?=$unProduit['prix']?>€</p>
        </div>
        <div class="quantiteProdPan grid-item">
            <p> quantité :  <?=$unProduit['quantite']?></p>
        </div>
        <div class="AjusterQuantiteProdPan grid-item">
            <form  action="<?=$_GET['url']?>" method="post" >
                <input type="hidden" name="id" value="<?=$unProduit['id_produit']?>"/>
                <input type="number" required name="quantite" value="1" min="1" max="5">
                <input  type="submit" class="bouton"  value="Modifier"/>
            </form>
        </div>
        <div class="suppProdPan grid-item">
            <form action="<?=$_GET['url']?>" method="post" >
                <input type="hidden" name="id" value="<?=$unProduit['id_produit']?>"/>
                <input  type="submit" class="bouton"  value="X"/>
            </form>
        </div>
    </div>
    
<?php endforeach; ?>

<div class="acheter">
    <p class="bouton" style="margin-right: 1rem; background-color: white; color: black; font-weight:bold ">Prix total : <?=$prixTotal?>€</p>
    <form action="/commande" method="post">
        <input type="submit" class="bouton" required name="acheter" value="Acheter"/>
    </form>
</div>