<?php

#require_once('vendor/autoload.php');

$idUser= 1;

require_once('src/controllers/c_acceuil.php');
require_once('src/controllers/c_post.php');
require_once('src/controllers/c_produit.php');
require_once('src/controllers/c_panier.php');
require_once('src/controllers/c_commande.php');
require_once('src/controllers/c_cgu.php');
require_once('src/controllers/c_paiement.php');
require_once('src/controllers/c_test_produit.php');
require_once('src/controllers/c_pbx.php');
require_once('src/controllers/c_pageAuto.php');
require_once('src/controllers/c_test_panier.php');
require_once('src/controllers/api/c_api_commande.php');
require_once('src/controllers/api/c_api_paiement.php');
require_once('src/controllers/api/c_api_liste.php');
require_once ('src/controllers/c_test_service.php');
require_once ('src/controllers/api/c_api_test.php');
$idUser = 1;
$idPanierClient = get_result("SELECT id FROM panier WHERE id_client = $idUser");

if(isset($_GET['url']) && $_GET['url'])
{
    $url = rtrim($_GET['url'], '/'); //on prend notre url et on lui retire le /

    if($url)
    {
        switch ($url)
        {
            case "pageAuto" : pageAuto(); break;
            case "post" : post(); break;
            case "produit" : produit(); break;
            case "panier" : panier(); break;
            case "commande" : commande(); break;
            case "paiement" : paiement(); break;
            case "test-produit" : testProduit(); break;
            case "testPanier" : testPanier(); break;
            case "api/liste" : APIListe(); break;
            case "api/commande" : APICommande(); break;
            case "api/paiement" : APIPaiement(); break;
            case "api/test" : APITest(); break;
            case "cgu" : cgu(); break;
            case "test-service" : testServiceApi(); break;
            default: acceuil(); break;
        }
    }
    else
    {
        acceuil();
    }
}
else
{
    acceuil();
}

?>



