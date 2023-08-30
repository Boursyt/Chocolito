<?php

    require_once('src/model.php');

    function cgu(){

        cgu_simple();
    }

    function cgu_simple(){

        $menu['page'] = "cgu";
        require_once('view/inc/head.php');
        require_once('view/inc/header.php');
        require_once('view/cgu/v_cgu.php');
        require_once('view/inc/footer.php');

    }