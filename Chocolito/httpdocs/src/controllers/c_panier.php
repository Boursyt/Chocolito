<?php 
require_once('src/model.php');

function panier(){
    global $idUser;
    //on selectionne les info de produit, si il sont dans le panier_produit et si id_panier = id de panier
    $lstProduitPanier = get_results("SELECT * FROM produit INNER JOIN panier_produit ON produit.id = panier_produit.id_produit INNER JOIN panier ON panier_produit.id_panier = panier.id WHERE panier.id_client = $idUser");
    
    panier_liste($lstProduitPanier);
    
}

function panier_liste($lstProduitPanier){

    global $idUser;
    if(isset($_POST['id']) && !isset($_POST['quantite'])){
        supprimer_produit_panier($_POST['id']);
        rafraichir_page_panier();
    }
    if(isset($_POST['id']) && isset($_POST['quantite'])){
        Ajuster_quantite($_POST['id'], $_POST['quantite']);
        rafraichir_page_panier();
    }

    $prixTotal = prix_total_panier($lstProduitPanier);


    $menu['page'] = "panier";
    require_once('view/inc/head.php');
    require_once('view/inc/header.php');
    require_once('view/panier/v_panier_liste.php');
    require_once('view/inc/footer.php');
}

function supprimer_produit_panier($unProduit){
    global $idUser,$pdo;
    
    try{
        if($unProduit){

            $pdo->query("DELETE FROM panier_produit WHERE id_produit=".$unProduit."");

            if($pdo->errorCode()=="00000") return 1;
            else return 0;
        }else{
            return 0;
        }     
    }catch(Exception $e){
        return 0;
    }
}
function Ajuster_quantite($unProduit, $quantite){

    global $idUser;
    update("UPDATE panier_produit SET quantite=$quantite where id_produit=$unProduit");
}

function rafraichir_page_panier(){
    header('Location: /panier');
}

function prix_total_panier($lstProduitPanier){
    $prixTotal = 0;
    foreach($lstProduitPanier as $unProduit){
        $prixTotal += $unProduit['prix'] * $unProduit['quantite'];
    }
    return $prixTotal;
}


?>