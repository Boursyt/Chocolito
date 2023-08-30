<?php

    require_once('src/model.php');

    function paiement(){

        paiement_simple();


    }

    function paiement_simple(){
        //derniere commande en bdd
        $commande= get_result("SELECT * FROM commande ORDER BY id DESC LIMIT 1");

        // --------------- VARIABLES A MODIFIER ---------------
        
        // Ennonciation de variables
        $pbx_site = '3277512';								//variable de test 9999999
        $pbx_rang = '001';								//variable de test 095
        $pbx_identifiant = '38023694';					//variable de test 123456789
        $pbx_cmd = $commande["id"];							//variable de test cmd_test
        $pbx_porteur = $commande["email"];							//variable de test test@test.fr
        $pbx_total = $commande["prix_TOT"]*100;								//variable de test 200
        $pbx_nb_produit = '5';					//variable de test 5
        $pbx_prenom_fact = $commande["prenom"];				//variable de test jean
        $pbx_nom_fact = $commande["prenom"];					//variable de test dupont
        $pbx_adresse1_fact = $commande["adresse"];				//variable de test 1 rue de Paris
        $pbx_adresse2_fact = $commande["complement"];				//variable de test <vide>
        $pbx_zipcode_fact = $commande["code_postal"];				//variable de test 75001
        $pbx_city_fact = $commande["ville"];					//variable de test Paris
        $pbx_country_fact = '250';	//variable de test 250 (pour la France)
        $pbx_country_fact = '250';		//variable de test 250 (pour la France)
        $pbx_souhaitauthent = '1';		//variable de test authentification 3DS (1 par d�faut, 2 pour exemption 3DS)
        if ($pbx_total>3000) {$pbx_souhaitauthent = '1';}	//variable de test pour s'assurer que l'exemption 3DS n'est pas propos�e sur une transaction sup�rieur � 30�
        
        // Suppression des points ou virgules dans le montant						
            $pbx_total = str_replace(",", "", $pbx_total);
            $pbx_total = str_replace(".", "", $pbx_total);
        
        // Param�trage des urls de redirection navigateur client apr�s paiement
        $pbx_effectue = 'https://s4-gp87.kevinpecro.info/accepte';
        $pbx_annule = 'https://s4-gp87.kevinpecro.info/annule';
        $pbx_refuse = 'https://s4-gp87.kevinpecro.info/refuse';
        // Param�trage de l'url de retour back office site
        $pbx_repondre_a = 'https://s4-gp87.kevinpecro.info/pageAuto';
        
        // Param�trage du retour back office site
        $pbx_retour = 'Mt:M;Ref:R;Auto:A;Erreur:E;Date:W;Heure:Q;PIN6:N; typecarte:C';
        $pbx_ruf1="POST";
        // Connection � la base de donn�es
        // mysql_connect...
        // On r�cup�re la cl� secr�te HMAC (stock�e dans une base de donn�es par exemple) et que l�on renseigne dans la variable $hmackey;
        // $hmackey = '4642EDBBDFF9790734E673A9974FC9DD4EF40AA2929925C40B3A95170FF5A578E7D2579D6074E28A78BD07D633C0E72A378AD83D4428B0F3741102B69AD1DBB0';
        $hmackey = 'E28ED3CE6CA7AC848C2E47072DBC609838CDDD08AAB2E93C4C1C02067B16C81FDFD31322F9E397F75186AADA74B828C31821A4258F95D93608E3575158B04966';
        
        
        // --------------- TESTS DE DISPONIBILITE DES SERVEURS ---------------
        $serveurs = array('tpeweb.e-transactions.fr', //serveur primaire
        'tpeweb1.e-transactions.fr');  

        foreach($serveurs as $serveur){
        //phpinfo();
        $doc = new DOMDocument();
        $doc->loadHTMLFile('https://'.$serveur.'/load.html');
        $server_status = "";
        $element = $doc->getElementById('server_status');
        if($element){
        $server_status = $element->textContent;}
        if($server_status == "OK"){
        // Le serveur est pr�t et les services op�rationnels
        $serveurOK = $serveur;
        break;}
        // else : La machine est disponible mais les services ne le sont pas.
        }
        //curl_close($ch);
        if(!$serveurOK){
        die("Erreur : Aucun serveur n'a été trouvé");}
        // Activation de l'univers de recette
        $serveurOK = 'recette-tpeweb.e-transactions.fr';
        
        //Cr�ation de l'url e-Transactions
        $serveurOK = 'https://'.$serveurOK.'/php/';
     
        
        
        // --------------- TRAITEMENT DES VARIABLES ---------------
        
        // On r�cup�re la date au format ISO-8601
        $dateTime = date("c");
        
        $pbx_shoppingcart = "<?xml version=\"1.0\" encoding=\"utf-8\"?><shoppingcart><total><totalQuantity>".$pbx_nb_produit."</totalQuantity></total></shoppingcart>";
        
        $pbx_billing = "<?xml version=\"1.0\" encoding=\"utf-8\"?><Billing><Address><FirstName>".$pbx_prenom_fact."</FirstName>".
                        "<LastName>".$pbx_nom_fact."</LastName><Address1>".$pbx_adresse1_fact."</Address1>".
                        "<Address2>".$pbx_adresse2_fact."</Address2><ZipCode>".$pbx_zipcode_fact."</ZipCode>".
                        "<City>".$pbx_city_fact."</City><CountryCode>".$pbx_country_fact."</CountryCode>".
                        "</Address></Billing>";

        
        
        // On cr�e la cha�ne � hacher sans URLencodage
        $msg = "PBX_SITE=".$pbx_site.
        "&PBX_RANG=".$pbx_rang.
        "&PBX_IDENTIFIANT=".$pbx_identifiant.
        "&PBX_TOTAL=".$pbx_total.
        "&PBX_DEVISE=978".
        "&PBX_CMD=".$pbx_cmd.
        "&PBX_PORTEUR=".$pbx_porteur.
        "&PBX_REPONDRE_A=".$pbx_repondre_a.
        "&PBX_RETOUR=".$pbx_retour.
        "&PBX_EFFECTUE=".$pbx_effectue.
        "&PBX_ANNULE=".$pbx_annule.
        "&PBX_REFUSE=".$pbx_refuse.
        "&PBX_HASH=SHA512".
        "&PBX_TIME=".$dateTime.
        "&PBX_SHOPPINGCART=".$pbx_shoppingcart.
        "&PBX_BILLING=".$pbx_billing.
        "&PBX_SOUHAITAUTHENT=".$pbx_souhaitauthent.
        "&PBX_RUF1=".$pbx_ruf1;

        
        
        // Si la cl� est en ASCII, On la transforme en binaire
        $binKey = pack("H*", $hmackey);

        
        // On calcule l�empreinte (� renseigner dans le param�tre PBX_HMAC) gr�ce � la fonction hash_hmac et //
        // la cl� binaire
        // On envoi via la variable PBX_HASH l'algorithme de hachage qui a �t� utilis� (SHA512 dans ce cas)
        // Pour afficher la liste des algorithmes disponibles sur votre environnement, d�commentez la ligne //
        // suivante
        // print_r(hash_algos());
        $hmac = strtoupper(hash_hmac('sha512', $msg, $binKey));

        
        
        // La cha�ne sera envoy�e en majuscule, d'o� l'utilisation de strtoupper()
        // On cr�e le formulaire � envoyer
        // ATTENTION : l'ordre des champs est extr�mement important, il doit
        // correspondre exactement � l'ordre des champs dans la cha�ne hach�e
    

        $menu['page'] = 'paiement';

        require_once('view/inc/head.php');
        require_once('view/inc/header.php');
        require_once('view/paiement/v_paiement.php');
        require_once('view/inc/footer.php');

    }



?>