<?php

require_once('src/model.php');

function APIPaiement(){

    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        http_response_code(405);
        die('Méthode non autorisée');
    }


    if(!isset($_POST['token']) || $_POST['token']!=='OWhqS3BMM3EjN3NEZkdIMSJdVjZsJG01bjhlUnhaKg=='){

        http_response_code(401);
        die('Accès non autorisé');

    }

    if(isset($_POST['idPaiement']) && $_POST['idPaiement']){

        $idPaiement = $_POST['idPaiement'];
        $unPaiement = get_result("SELECT * FROM paiement where id = $idPaiement");
        PaiementSimple($unPaiement);

    }else{

        $lstPaiement = get_results("SELECT * FROM paiement");
        ListePaiement($lstPaiement);

    }
    


}

function ListePaiement($lstPaiement){

    echo json_encode($lstPaiement);

}

function PaiementSimple($unPaiement){

    echo json_encode($unPaiement);


}