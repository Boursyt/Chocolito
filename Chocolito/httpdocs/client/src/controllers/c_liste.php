<?php   


require_once('src/model.php');

function liste()
{
    $menu['page'] = 'liste';
    $urlListe = 'https://s4-gp87.kevinpecro.info/api/liste';

    $listeFonction = curlAPIList($urlListe);


    require_once('view/inc/inc.head.php');
    require_once('view/inc/inc.header.php');
    require_once('view/v_liste.php');
    require_once('view/inc/inc.footer.php');
}
