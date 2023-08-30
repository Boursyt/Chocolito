<?php

require_once('src/model.php');

function produit(){

    if(isset($_GET['identifiant'])&& $_GET['identifiant']){
        $_GET['identifiant']= rtrim($_GET['identifiant'],'/');
        $unProduit = get_result("SELECT * FROM produit where identifiant ='" .$_GET['identifiant']."' ");
        produit_simple($unProduit);}
    else{
        $lstProduit = get_results("SELECT * FROM produit where statut = 1");
        produit_liste($lstProduit);}
}


function produit_simple($unProduit){

    $menu['page'] = 'produit';

    //condition si le POST "stock"==> ajouterAuPanier
    //$checkajout = true ou false
    if (isset($_POST['quantite']) && $_POST['quantite']){
        ajouterAuPanier($_POST['quantite'],$unProduit['identifiant']);
    }


    require_once('view/inc/head.php');
    require_once('view/inc/header.php');
    require_once('view/produit/v_produit.php');
    require_once('view/inc/footer.php');


}

function produit_liste($lstProduit){

    $menu['page'] = 'produit';
    require_once('view/inc/head.php');
    require_once('view/inc/header.php');
    require_once('view/produit/v_produit_liste.php');
    require_once('view/inc/footer.php');

}

function ajouterAuPanier($quantite, $identifiant)
{


    //la produit existe?
    //==> oui=continuer==>1
    //==> non=erreur==>0
    $unProduit = get_result("SELECT * FROM produit where identifiant ='".$identifiant."'");

    
    try{
        if ($unProduit) {
            global $idUser,$pdo;
            $ExistPanier = get_result("SELECT id FROM panier WHERE id_client = $idUser");
    //echo("SELECT * FROM panier WHERE id_client = $idUser    ");

    //est-ce que le client a un panier?
    //creation du panier si besoin
            if (!$ExistPanier) {
            $pdo->query("INSERT INTO panier (id_client) VALUES ($idUser)");
        //echo("INSERT INTO panier (id_client) VALUES ($idUser)    ");
            }


            $idPanier = get_result("SELECT id FROM panier WHERE id_client = ".$idUser."");
            $idProduit = get_result("SELECT id FROM produit where identifiant ='".$identifiant."'");
    
    
            $EstDansPanier =get_result("SELECT * FROM panier_produit where id_produit ='".$idProduit['id']."' AND id_panier ='".$idPanier['id']."'");

            $quantiteDansPanier =get_result("SELECT quantite FROM panier_produit where id_produit ='".$idProduit['id']."' AND id_panier ='".$idPanier['id']."'");

    

    //echo("SELECT quantite FROM panier_produit where id_produit = '".$idProduit['id']."' and id_panier ='".$idPanier['id']."'     ");

    //produit deja dans le panier?
    //==> oui=Upadte +quantité
    //==> non=Insert dans le paniers
    


            $quantiteDansPanier =get_result("SELECT quantite FROM panier_produit where id_produit ='".$idProduit['id']."' AND id_panier ='".$idPanier['id']."'");
            if (!$EstDansPanier) {
                $pdo->query("INSERT INTO panier_produit (id_panier, id_produit, quantite) VALUES (".$idPanier['id'].", ".$idProduit['id'].", ".$quantite.")");

            }
            else{
                $quantite+= $quantiteDansPanier['quantite'];
                $pdo->query("UPDATE panier_produit SET quantite=$quantite WHERE id_produit=".$idProduit['id']." AND id_panier=".$idPanier['id']."");       
            }
    
            if($pdo->errorCode()=="00000") return 1;
            else return 0;
            }
        else{
            return 0;
        }
    
    }catch (Exception $e) {
        return 0;}

}


/*function ajouterAuPanier($quantite, $identifiant){
    //try{
        global $idUser,$pdo;
        $inPanier=false;
        $unProduit = get_result("SELECT id FROM produit where identifiant ='".$identifiant."'");

        if($unProduit){

            $unPanier=get_result("SELECT * FROM panier where id_client=$idUser");

            if($unPanier){

                $idPanier=$unPanier['id'];
                $inPanier=get_result("SELECT * FROM panier_produit where id_panier=".$idPanier." and id_produit=".$identifiant."");

            }
            else{

                $pdo->query("INSERT INTO panier (id_client,date_creation) VALUES ($idUser,'" . date('Y-m-d H:i:s') . "')");
                $idPanier=$pdo->lastInsertId();

            }
            if($inPanier){

                
                update("update panier_produit set quantite=quantite+$quantite where id_panier=$idPanier and id_produit=$unProduit");
            }
            else{

                insert("INSERT INTO panier_produit (id_panier, id_produit, quantite) VALUES (".$idPanier['id'].", ".$unProduit.", ".$quantite.")");

            }

            if($pdo->errorCode()=="00000") return 1;
            else return 0;
        }else return 0;*/
   // }catch (Exception $e) {
       // return 0;} }








?>