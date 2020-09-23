<?php
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
require_once dirname(__FILE__).'/../models/Comment.php';
require_once dirname(__FILE__).'/../models/Note.php';
require_once dirname(__FILE__).'/../models/Element.php';
session_start();
$id = '';
$firstName='';
$lastName ='';
$title ='SpaceBrico';
$isSubmitted = false;
$views = null;
// ======================= On formate le timestamp a celui de paris/Europe  ===========//
date_default_timezone_set("Europe/Paris");
//=====================================================================================//
//========================= Inistialisation des varible ===============================//
    $id = '';
    $firstName='';
    $lastName ='';
    $title ='SpaceBrico';
    $isSubmitted = false;
    // recuperation de l'id de la session 
    $userId = (int) $_SESSION['user']['users_id'];
    // recuperation du timestamp du serveur 
    $date = $_SERVER['REQUEST_TIME'];
// =====================================================================================//
// ======================= On verifie que lutilisateur est connecter ===================//
    if(isset($_SESSION['user'])){
        $id = (int) $_SESSION['user']['users_id'];
        //=============== afficher les infos users ============//
        $usersInfos = new Users($id);
        $usersViews = $usersInfos->readSingle();
        $firstName = $usersViews->users_firstname;
        $lastName = $usersViews->users_lastname;
        // var_dump($usersInfos->users_actif);
        // ===================================================//
        if ($usersViews->users_pictures != '') {
            $photo = PICT_FOLDER.'pict-'.$usersViews->users_id.'.'.$usersViews->users_pictures;
        }else{
            $photo ='../asset/img/user-boy_default.png';
        }
    }
if (isset($_GET['search'])&& $_GET['search'] != '')
{
    $views = false;
    $findPost = new Post();
    $search = filter_var($_GET['search'], FILTER_SANITIZE_STRING);
    $listPost = $findPost->findPost($search);
    // ======= AFFICHER LES COMMENTAIRES ==================//
    $comment = new Comment();
    $listComment = $comment->readAll();
    //====================================================//
    //============ AFFICHER LES ELEMENTS ================//
    $elementInfos = new Element();
    $listElements = $elementInfos->readAll();
    // ====================================================//
}
else
{
    $views = true;
// ================ afficher les poste ===============//
    $post = new Post();
    $listPost = $post->readAll();
// ====================================================//
// ======= AFFICHER LES COMMENTAIRES ==================//
    $comment = new Comment();
    $listComment = $comment->readAll();
//====================================================//
//============ AFFICHER LES ELEMENTS ================//
    $elementInfos = new Element();
    $listElements = $elementInfos->readAll();
// ====================================================//
} 
require_once dirname(__FILE__).'/../views/resultsearch_views.php';
?>
