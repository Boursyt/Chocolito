<?php

    require_once('src/model.php');

    function APICommande(){

        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            http_response_code(405);
            die('Méthode non autorisée');
        }


        if(!isset($_POST['token']) || $_POST['token']!=='OWhqS3BMM3EjN3NEZkdIMSJdVjZsJG01bjhlUnhaKg=='){

            http_response_code(401);
            die('Accès non autorisé');

        }

        //test si il faut afficher une  liste de commande ou une commande grace son ididcommande + récuperation des infos en bdd
        if(isset($_POST['idCommande']) && $_POST['idCommande']){

            $idCommande = $_POST['idCommande'];
            $uneCommande = get_result("SELECT * FROM commande where id = $idCommande");
            CommandeSimple($uneCommande);
        }else{

            $lstCommande = get_results("SELECT * FROM commande ");
        
            ListeCommande($lstCommande);

        }


    }

    function ListeCommande($lstCommande){



        echo json_encode($lstCommande);



    }

    function CommandeSimple($uneCommande){

        echo json_encode($uneCommande);


    }