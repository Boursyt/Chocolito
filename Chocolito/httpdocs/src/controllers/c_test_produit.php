<?php
require_once('src/model.php');

function testProduit(){
    $lstRetour= array();
    $lstProduit = get_results("SELECT * FROM produit where statut = 1");

    foreach($lstProduit as $unProduit){
        $quantite=rand(0,10);
        $lstRetour=execTest($unProduit['identifiant'],$unProduit['nom'],$quantite,$lstRetour);

    }
    $max=max(array_column($lstProduit, 'id'));
    $lstRetour=execTest($max+1,'test+1',5,$lstRetour);
    $lstRetour=execTest($max+2,'test+2',8,$lstRetour);
    require_once('view/inc/head.php');
    require_once('view/inc/header.php');
    require_once('view/produit/v_test_produit.php');
    require_once('view/inc/footer.php');
}

function execTest($id,$nom,$quantite,$lstRetour){
    require_once('src/controllers/c_produit.php');
    $retour = ajouterAuPanier($quantite,$id);
    $new = array(
        'id'=>$id,
        'nom'=>$nom,
        'quantite'=>$quantite,
        'retour'=>$retour);


    array_push($lstRetour,$new);

    return $lstRetour;
}
?>
