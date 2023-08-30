<?php 
   require_once("src/model.php");

    //récupère les données du formulaire de paiement et les affiche dans les logs avec error_log

/*
    function pageAuto(){
        try{

            ob_start();
            var_dump($_POST);  
            $contient = ob_get_clean();
    
        }catch(Exception $e){
            echo $e;
        }

        error_log($contient.". Provient du error log de la fonction pageAuto()");

    }*/



    function pageAuto()
    {
        global $idUser;

        $tablo[':montant'] = $_POST['Mt'];
        $tablo[':reference'] = $_POST['Ref'];
        $tablo[':autorisation'] = $_POST['Auto'];
        $tablo[':statut'] = $_POST['Erreur'];
        $tablo[':dateFinValidite'] = $_POST['Date'];
        $tablo[':derniersNumCarte'] = $_POST['PIN6'];
        $tablo[':heureTransaction'] = $_POST['Heure'];
        $tablo[':typeCarte'] = $_POST['typecarte'];


        $idCommande = get_result("SELECT id FROM commande WHERE id_client = 1 ORDER BY id DESC LIMIT 1");

        $requete = "INSERT INTO paiement (id_client, id_commande, montant, reference, auto, erreur, date, heure, pin6, typecarte) 
                                            VALUES ($idUser, ".$idCommande['id'].", :montant, :reference, :autorisation, :statut, :dateFinValidite, :heureTransaction, :derniersNumCarte, :typeCarte)";

        set_results_prepared($requete, $tablo);
    }






?>