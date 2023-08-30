<?php

    require_once('src/controllers/c_liste.php');
    require_once('src/controllers/c_commande.php');
    require_once('src/controllers/c_paiement.php');
    require_once('src/controllers/c_test.php');


    if(isset($_GET['url']) && $_GET['url']){

        $url=rtrim($_GET['url'],'/');
        if($url){
            switch ($url){
                default:
                    liste();
                    break;
                
                case "liste":
                    liste();
                    break;
                case "commande":
                    commande();
                    break;
                case "paiement":
                    paiement();
                    break;
                case "teste":
                    test();
                    break;
                

            }
        }else{
            liste();
        }
    }else{
        liste();
    }