<?php

function APITest(){
    require_once ('src/controllers/c_test_service.php');

   if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        http_response_code(405);
        die('Méthode non autorisée');
    }


    if(!isset($_POST['token']) || $_POST['token']!=='OWhqS3BMM3EjN3NEZkdIMSJdVjZsJG01bjhlUnhaKg=='){

        http_response_code(401);
        die('Accès non autorisé');

    }


    if (isset($_POST['idTest']) && $_POST['idTest']){

        $idTest = $_POST['idTest'];
        $uneTest = get_result("SELECT * FROM TestAPI where id = $idTest");
        SimpleTest($uneTest);
    }else{

            $lstTest = get_results("SELECT * FROM TestAPI ");

            ListeTest($lstTest);

    }


}

function SimpleTest($uneTest)
{

    echo json_encode($uneTest);
}
function ListeTest($lstTest){

    echo json_encode($lstTest);

}

?>