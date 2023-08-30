<?php
$host='';
$port='';
$basename='-';
$username='-';
$password='';
try{
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$basename;charset=utf8;user=$username;password=$password");
}catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}

function get_result($requete){
    global $pdo;
    $requete = $pdo->query($requete);
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function get_results($requete){
    global $pdo;
    $requete = $pdo->query($requete);
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}


function get_var($requete){
    global $pdo;
    $requete = $pdo->query($requete);
    return $requete->fetchColumn();
}

function insert($requete) {
    global $pdo;
    $pdo->exec($requete);

}


function update($requete){
    global $pdo;
    $pdo->exec($requete);
}

function delete($requete){
    global $pdo;
    $pdo->exec($requete);
}



function set_results_prepared($requete, $tablo)
    {
        global $pdo;
        $preparedStm = $pdo->prepare($requete);
        $preparedStm->execute($tablo);
        $lastInsertId = $pdo->lastInsertId();

        return $lastInsertId;
    }
?>

