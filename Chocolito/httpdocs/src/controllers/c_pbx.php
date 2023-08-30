
<?php

require_once('src/model.php');
require_once('src/controllers/c_pageAuto.php');

function PBX(){

    //si url est /accepte on exectute la fonction accepte
    if(isset($_GET['url']) && $_GET['url'] == 'accepte'){

        accepte();
    }
    if(isset($_GET['url']) && $_GET['url'] == 'annule'){

        annule();
    }
    if(isset($_GET['url']) && $_GET['url'] == 'refuse'){
        refuse();
    }

}

function accepte(){



    $menu['page'] = 'accepte';
    require_once('view/inc/head.php');
    require_once('view/inc/header.php');
    require_once('view/pbx/v_accepte.php');
    require_once('view/inc/footer.php');

}

function annule(){


    $menu['page'] = 'annule';

    require_once('view/inc/head.php');
    require_once('view/inc/header.php');
    require_once('view/pbx/v_annule.php');
    require_once('view/inc/footer.php');

}

function refuse(){


    $menu['page'] = 'refuse';

    require_once('view/inc/head.php');
    require_once('view/inc/header.php');
    require_once('view/pbx/v_refuse.php');
    require_once('view/inc/footer.php');



    

}
?>