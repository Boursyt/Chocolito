<?php

    function test(){

        if(isset($_POST['details-id_test']) && $_POST['details-id_test'])
        {
            testSimple($_POST['details-id_test']);
        }else{
            testListe();

        }

    }


    function testSimple($idTest){


        $menu['page'] = 'teste';
        $urlTest = 'https://s4-gp87.kevinpecro.info/api/test';
        $detailTest=curlAPIDetails($urlTest, null, null, $idTest);

        require_once('view/inc/inc.head.php');
        require_once('view/inc/inc.header.php');
        require_once('view/test/v_test.php');
        require_once('view/inc/inc.footer.php');




    }


    function testListe(){


        $menu['page'] = 'teste';
        $urlTest = 'https://s4-gp87.kevinpecro.info/api/test';
        $ListeTest=curlAPIList($urlTest);

        require_once('view/inc/inc.head.php');
        require_once('view/inc/inc.header.php');
        require_once('view/test/v_test_liste.php');
        require_once('view/inc/inc.footer.php');
    }