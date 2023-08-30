<?php

function curlAPIList($url)
{
    $curl = curl_init();

    $data = array(
        'token' => 'OWhqS3BMM3EjN3NEZkdIMSJdVjZsJG01bjhlUnhaKg==',
    );

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $reponse = curl_exec($curl);

    if($reponse === false)
    {
        $decode = 'Erreur cURL : '. curl_error($curl);
    }
    else
    {
        $decode = json_decode($reponse);
    }
    curl_close($curl);

    return $decode;
}

function curlAPIDetails($url, $idCommande, $idPaiement, $idTest)
{
    $curl = curl_init();

    if($idCommande != null)
    {
        $data = array(
            'token' => 'OWhqS3BMM3EjN3NEZkdIMSJdVjZsJG01bjhlUnhaKg==',
            'idCommande' => $idCommande,
        );
    }

    if($idPaiement != null)
    {
        $data = array(
            'token' => 'OWhqS3BMM3EjN3NEZkdIMSJdVjZsJG01bjhlUnhaKg==',
            'idPaiement' => $idPaiement,
        );
    }

    if ($idTest !=null){
        $data=array(
            'token'=> 'OWhqS3BMM3EjN3NEZkdIMSJdVjZsJG01bjhlUnhaKg==',
            'idTest'=>$idTest,
        );
    }

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $reponse = curl_exec($curl);

    if($reponse === false)
    {
        $decode = 'Erreur cURL : '. curl_error($curl);
    }
    else
    {
        $decode = json_decode($reponse);
    }
    curl_close($curl);

    return $decode;
}

?>