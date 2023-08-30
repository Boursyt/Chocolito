<?php

    require_once('src/model.php');

    function APIListe(){

        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            http_response_code(405);
            die('Méthode non autorisée');
        }


        if(!isset($_POST['token']) || $_POST['token']!=='OWhqS3BMM3EjN3NEZkdIMSJdVjZsJG01bjhlUnhaKg=='){

            http_response_code(401);
            die('Accès non autorisé');

        }

        $listeAPI = array(
            array(

                "url" => "/api/liste",
                "param"=> null,
                "method" => "POST",
                "statut" => 1
            
            
            ),
            array(

                "url" => "/api/commande",
                "param"=> null,
                "method" => "POST",
                "statut" => 1
            
            
            ),
            array(

                "url" => "/api/commande",
                "param"=> "idCommande",
                "method" => "POST",
                "statut" => 1
            
            
            ),
            array(

                "url" => "/api/paiement",
                "param"=> null,
                "method" => "POST",
                "statut" => 1
            
            
            ),
            array(

                "url" => "/api/paiement",
                "param"=> "idPaiement",
                "method" => "POST",
                "statut" => 1
            
            
            ),
            array(

                "url" => "/api/test",
                "param"=> null,
                "method" => "POST",
                "statut" => 1
            ),
            array(

                "url" => "/api/test",
                "param"=> "idTest",
                "method" => "POST",
                "statut" => 1


            ),

        );

        echo json_encode($listeAPI);
    }