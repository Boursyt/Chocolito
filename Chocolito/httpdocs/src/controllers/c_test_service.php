<?php

/*

erreur 200 ==>ok

erreur 401 ==> pas token/faux

erreur 405 ==> requete avec get au lieu de poste

l'objectif de cette page et est de tester les requete de l'api*/


    require_once('src/model.php');
function CurlTestAPI($url, $token, $method)
{
    $curl = curl_init();

    $data = array(
        'token' => $token,
    );

    if($method == "POST")
    {
        $POSTMethod = true;
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    }
    else
    {
        $POSTMethod = false;
    }

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, $POSTMethod);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $reponse=curl_exec($curl);

    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);



    InsertionTestBDD($url, $httpCode,$reponse);
}

function InsertionTestBDD($url, $httpCode,$reponse)
{
    $dateDuTest = date('Y-m-d H:i:s');

    switch($url)
    {
        case "https://s4-gp87.kevinpecro.info/api/liste" : $tablo[':nom'] = "apiListe".$httpCode; break;
        case "https://s4-gp87.kevinpecro.info/api/commande" : $tablo[':nom'] = "apiCommande".$httpCode; break;
        case "https://s4-gp87.kevinpecro.info/api/paiement" : $tablo[':nom'] = "apiPaiement".$httpCode; break;
    }

    $tablo[':url'] = $url;
    $tablo[':httpCode'] = $httpCode;
    $tablo[':dateTest'] = $dateDuTest;
    $tablo[':reponse'] = $reponse;

    $requete = "INSERT INTO TestAPI (Nom, Url, Code, json, date) VALUES (:nom, :url, :httpCode, :reponse, :dateTest)";
    set_results_prepared($requete, $tablo);
}
function testServiceApi(){

    $urlListe = "https://s4-gp87.kevinpecro.info/api/liste";
    $urlCommande = "https://s4-gp87.kevinpecro.info/api/commande";
    $urlPaiement = "https://s4-gp87.kevinpecro.info/api/paiement";

    $VraiToken='OWhqS3BMM3EjN3NEZkdIMSJdVjZsJG01bjhlUnhaKg==' ;
    $FauxToken='CeciEstPasUnTokenEtCestNormaleCestPourTest==';

    $tabloUrl = array($urlListe, $urlCommande, $urlPaiement);
    $tabloToken = array($VraiToken, $FauxToken);
    //erreur 200 et 401
    foreach($tabloUrl as $url)
    {
        foreach($tabloToken as $token)
        {
            CurlTestAPI($url, $token, "POST");
        }
    }
    //erreur 405
    foreach($tabloUrl as $url)
    {
        CurlTestAPI($url, $VraiToken, "GET");
    }



}


?>