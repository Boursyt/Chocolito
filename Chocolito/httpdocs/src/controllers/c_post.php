<?php

require_once('src/model.php');

function post(){

    if(isset($_GET['identifiant'])&& $_GET['identifiant']){
        $_GET['identifiant']= rtrim($_GET['identifiant'],'/');
        $unPost = get_result("SELECT * FROM post where identifiant='".$_GET['identifiant']."'");
        post_simple($unPost);}
    else{
        $lstPost = get_results("SELECT * FROM post where statut = 1");
        post_list($lstPost);}
}


function post_simple($unPost){

    $menu['page'] = 'post';
    require_once('view/inc/head.php');
    require_once('view/inc/header.php');
    require_once('view/post/v_post.php');
    require_once('view/inc/footer.php');


}

function post_list($lstPost){

    $menu['page'] = 'post';
    require_once('view/inc/head.php');
    require_once('view/inc/header.php');
    require_once('view/post/v_post_liste.php');
    require_once('view/inc/footer.php');

}