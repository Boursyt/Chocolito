<?php

require_once('src/model.php');


function acceuil(){

    $menu['page'] = 'acceuil';
    require_once('view/inc/head.php');
    require_once('view/inc/header.php');
    require_once('view/acceuil/v_acceuil.php');
    require_once('view/inc/footer.php');


}

