<?php
    require_once('src/model.php');


    function paiement(){

        if(isset($_POST['details-id-paiement']) && $_POST['details-id-paiement'])
        {
            paiementSimple($_POST['details-id-paiement']);
        }else{
            paiementListe();

        }
    }

    function paiementSimple(){

        $urlPaiement = 'https://s4-gp87.kevinpecro.info/api/paiement';
        $paiementSimple= curlAPIDetails($urlPaiement, null,$_POST['details-id-paiement'], null);
        $menu['page'] = 'paiement';

        require_once('view/inc/inc.head.php');
        require_once('view/inc/inc.header.php');
        require_once('view/paiement/v_paiement.php');
        require_once('view/inc/inc.footer.php');

    }


    function paiementListe(){
        $urlPaiement = 'https://s4-gp87.kevinpecro.info/api/paiement';

        $paiement= curlAPIList($urlPaiement);
        $menu['page'] = 'paiement';

        require_once('view/inc/inc.head.php');
        require_once('view/inc/inc.header.php');
        require_once('view/paiement/v_paiement_liste.php');
        require_once('view/inc/inc.footer.php');

    }