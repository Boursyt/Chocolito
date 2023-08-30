<?php

    require_once('src/model.php');

    function commande(){

        //si l'url contient un id ==> afficher la commande (commandeSimple) sinon afficher la liste des commandes (commandeListe)
        if(isset($_POST['details-id_produit']) && $_POST['details-id_produit'])
        {
            commandeSimple($_POST['details-id_produit']);
        }else{
            commandeListe();

        }
        


    }


    function commandeSimple($idCommande){

        $menu['page'] = 'commande';
        $urlCommande = 'https://s4-gp87.kevinpecro.info/api/commande';
        $detailsCommande=curlAPIDetails($urlCommande, $idCommande, null, null);

        require_once('view/inc/inc.head.php');
        require_once('view/inc/inc.header.php');
        require_once('view/commande/v_commande.php');
        require_once('view/inc/inc.footer.php');


    }


    function commandeListe(){
        $urlCommande = 'https://s4-gp87.kevinpecro.info/api/commande';
        $commandes= curlAPIList($urlCommande);


        $menu['page'] = 'commande';

        require_once('view/inc/inc.head.php');
        require_once('view/inc/inc.header.php');
        require_once('view/commande/v_commande_liste.php');
        require_once('view/inc/inc.footer.php');

    }



