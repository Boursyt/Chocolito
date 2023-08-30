<?php

    require_once('src/model.php');
    function commande(){
        global $idUser;

        commande_simple();
    }


    function commande_simple(){

        global $idUser;

       //recupere les information envoyer par le bouton Continuer vers le paiement de la page v_commande pour les inserer dans la table commande de la base de donner a l'aide de la fonction ajout_info_commande
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['adresse']) && isset($_POST['complement']) && isset($_POST['code_postal']) && isset($_POST['ville']) && isset($_POST['nom_livraison']) && isset($_POST['prenom_livraison']) && isset($_POST['email_livraison']) && isset($_POST['telephone_livraison']) && isset($_POST['adresse_livraison']) && isset($_POST['complement_livraison']) && isset($_POST['code_postal_livraison']) && isset($_POST['ville_livraison'])){
            ajout_info_commande($idUser,$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['telephone'],$_POST['adresse'],$_POST['complement'],$_POST['code_postal'],$_POST['ville'],$_POST['nom_livraison'],$_POST['prenom_livraison'],$_POST['email_livraison'],$_POST['telephone_livraison'],$_POST['adresse_livraison'],$_POST['complement_livraison'],$_POST['code_postal_livraison'],$_POST['ville_livraison']);
            $id_commande=get_result("SELECT id FROM commande WHERE id_client = $idUser ORDER BY id DESC LIMIT 1");
            ajout_produit_produitCommande($id_commande['id']);
            Supprimer_panier();
            aller_paiement();
        }



        //ajoute les produit du panier a la table commande_produit(id,id_commande,id_produit,quantite,prix_unitaire,id_tva) a partir de panier_produit(id,id_panier,id_produit,quantite) et de produit(id,identifiant,nom,description,categorie,prix,id_tva,stock,photo,status)



        require_once('view/inc/head.php');
        require_once('view/inc/header.php');
        require_once('view/commande/v_commande.php');
        require_once('view/inc/footer.php');

    }

    function ajout_info_commande($idUser,$nom,$prenom,$email,$telephone,$adresse,$complement,$code_postal,$ville,
    $nom_livraison,$prenom_livraison,$email_livraison,$telephone_livraison,$adresse_livraison,$complement_livraison,$code_postal_livraison,$ville_livraison){

        //valide les information de la page v_commande et les ajoute a la base de donnée dans la table commande(id,id_client,nom,prenom,email,telephone,adresse,complement,code_postal,ville,nom_livraison,prenom_livraison,email_livraison,telephone_livraison,adresse_livraison,complement_livraison,code_postal_livraison,ville_livraison,date_creation,int status)
        global $idUser;
        $lstProduitPanier = get_results("SELECT * FROM produit INNER JOIN panier_produit ON produit.id = panier_produit.id_produit INNER JOIN panier ON panier_produit.id_panier = panier.id WHERE panier.id_client = $idUser");
        $prixTotale = 0;
        foreach($lstProduitPanier as $unProduit){
            $prixTotale += $unProduit['prix'] * $unProduit['quantite'];
        }
        $date = date("Y-m-d H:i:s");

        $tablo[':id_client'] = $idUser;
        $tablo[':Nome'] = $nom;
        $tablo[':prenom'] = $prenom;
        $tablo[':email'] = $email;
        $tablo[':telephone'] = $telephone;
        $tablo[':adresse'] = $adresse;
        $tablo[':complement'] = $complement;
        $tablo[':code_postal'] = $code_postal;
        $tablo[':ville'] = $ville;
        $tablo[':nom_livraison'] = $nom_livraison;
        $tablo[':prenom_livraison'] = $prenom_livraison;
        $tablo[':email_livraison'] = $email_livraison;
        $tablo[':telephone_livraison'] = $telephone_livraison;
        $tablo[':adresse_livraison'] = $adresse_livraison;
        $tablo[':complement_livraison'] = $complement_livraison;
        $tablo[':code_postal_livraison'] = $code_postal_livraison;
        $tablo[':ville_livraison'] = $ville_livraison;
        $tablo[':date_creation'] = $date;
        $tablo[':statut'] = 0;
        $tablo[':prix_TOT'] = $prixTotale;

        insert("INSERT INTO commande (id_client,nom,prenom,email,telephone,adresse,complement,
        code_postal,ville,nom_livraison,prenom_livraison,email_livraison,telephone_livraison,adresse_livraison,complement_livraison,
        code_postal_livraison,ville_livraison,date_creation,statut,prix_TOT) 
        VALUES ('$idUser', '$nom', '$prenom', '$email', '$telephone', '$adresse', '$complement', 
        '$code_postal', '$ville', '$nom_livraison', '$prenom_livraison', '$email_livraison', '$telephone_livraison', 
        '$adresse_livraison', '$complement_livraison', '$code_postal_livraison', '$ville_livraison', '$date', '0',$prixTotale)");




        /*insert("INSERT INTO commande (id_client,nom,prenom,email,telephone,adresse,complement,
        code_postal,ville,nom_livraison,prenom_livraison,email_livraison,telephone_livraison,adresse_livraison,complement_livraison,
        code_postal_livraison,ville_livraison,date_creation,statut,prix_TOT) 
        VALUES ('$idUser', '$nom', '$prenom', '$email', '$telephone', '$adresse', '$complement', 
        '$code_postal', '$ville', '$nom_livraison', '$prenom_livraison', '$email_livraison', '$telephone_livraison', 
        '$adresse_livraison', '$complement_livraison', '$code_postal_livraison', '$ville_livraison', '$date', '0'),$prixTotale");*/
    }


    function ajout_produit_produitCommande($id_commande){

        //ajoute les produit du panier a la table commande_produit(int id,int id_commande,int id_produit,int quantite,float prix_unitaire,int id_tva) 
        global $idUser;
        $prix_total=0;
        $lstProduitPanier = get_results("SELECT * FROM produit INNER JOIN panier_produit ON produit.id = panier_produit.id_produit 
        INNER JOIN panier ON panier_produit.id_panier = panier.id WHERE panier.id_client = $idUser");
        foreach($lstProduitPanier as $unProduit){
            $prix_total+=$unProduit['prix']*$unProduit['quantite'];
            $produit=get_result("select * from produit where identifiant=".$unProduit['id_produit']."");
            $id_tva=get_result("select id_tva from produit where identifiant=".$unProduit['id_produit']."");
            insert("INSERT INTO commande_produit (id_commande,id_produit,quantite,prix_unitaire,id_tva) VALUES 
            ('$id_commande', '$unProduit[id_produit]', '$unProduit[quantite]', '$prix_total', '$unProduit[id_tva]')");
        }
   
    }



    function Supprimer_panier(){

        //supprime tous les articles du panier
        global $idUser;

        $idPanier = get_result("select id from panier where id_client =".$idUser."");
        //panier_produit(id,id_panier,id_produit,quantite)
        $lstProduitPanier = get_results("SELECT * FROM produit INNER JOIN panier_produit 
        ON produit.id = panier_produit.id_produit INNER JOIN panier ON panier_produit.id_panier = panier.id WHERE panier.id_client = $idUser");
        foreach($lstProduitPanier as $unProduit){
            delete("DELETE FROM panier_produit WHERE id_produit=".$unProduit['id_produit']."");
        }

    }

    function aller_paiement(){

        //redirige vers la page de paiement /paiement
        header('Location: /paiement');
        
    }









