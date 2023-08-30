<?php
    require_once('src/model.php');

    function testPanier(){
        $lstRetour= array();
        //jointure sur la table panier et panier_produit ou panier.id = panier_produit.id_panier       
        $lstPanier= get_results("SELECT * FROM panier_produit INNER JOIN panier ON panier_produit.id_panier = panier.id");
        //nous avons besoin de l'id, du nom du produit, de la quantité  et du retour
        $lstRetour=array();
        foreach($lstPanier as $unPanier){
            $nomProduit = get_result("SELECT * FROM produit WHERE id =".$unPanier['id_produit']."");
            $lstRetour=execTest($unPanier['id_produit'],$nomProduit['identifiant'],$unPanier['quantite'],$lstRetour);

        }
        $max=max(array_column($lstPanier, 'id'));
        $lstRetour=execTest($max+1,'test+1',0,$lstRetour);
        $lstRetour=execTest($max+2,'test+2',0,$lstRetour);

        require_once('view/inc/head.php');
        require_once('view/inc/header.php');
        require_once('view/panier/v_test_panier.php');
        require_once('view/inc/footer.php');
    }

    function execTestPanier($id,$nom,$quantite,$lstRetour){
        require_once('src/controllers/c_panier.php');
        $retour = supprimer_produit_panier($id);
//si le produit est supprimé, la quantité est de 0, sinon elle est de la quantite encore présente dans le panier
        if($retour == 1){
            $quantiteApres = $quantite-$quantite;
        }else{
            $quantiteApres = $quantite;
        }
        $news = array(
            'id'=>$id,
            'nom'=>$nom,
            'quantite'=>$quantite,
            'quantiteApres'=>$quantiteApres,
            'retour'=>$retour);
        
        
        array_push($lstRetour,$news);

        return $lstRetour;
    }

