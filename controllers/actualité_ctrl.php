<?php
session_start();
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
require_once dirname(__FILE__).'/../models/Comment.php';
require_once dirname(__FILE__).'/../models/Note.php';
require_once dirname(__FILE__).'/../models/Element.php';
require_once dirname(__FILE__).'/../controllers/cookie_connect.php';
// ======================= On formate le timestamp a celui de paris  ==================//
    date_default_timezone_set("Europe/Paris");
//=====================================================================================//
//========================= Inistialisation des varible ===============================//
    $id = '';
    $firstName='';
    $lastName ='';
    $title ='SpaceBrico';
    $isSubmitted = false;
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
        if ($usersViews->users_pictures != NULL) {
            $photo = PICT_FOLDER.'pict-'.$usersViews->users_id.'.'.$usersViews->users_pictures;
        }else{
            $photo ='../asset/img/user-boy_default.png';
        }
    }
//=========================================================================================//
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
//========================= Si la methode post est reconnue ===============================//
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        // insert POST
        $isSubmitted = true;
        $userId = (int) $_SESSION['user']['users_id'];
        $date = $_SERVER['REQUEST_TIME'];
        $post_title = trim(strip_tags($_POST['post_title']));
        $postContent = trim(strip_tags($_POST['post_contents']));
        $post_signal = 0;
        // insert comment
        $content = trim(strip_tags($_POST['comment']));
        $signal = 0;
        $post_id = (int) $_POST['post_id'];
        // insert Note
        $note = (int) $_POST['note'];
        // insert Elements
        $elem = $_POST['element'];
        // $qte = $_POST['quatity_element'];
        $availib = 1;
    }
// ==================== si il y a aucune erreur on cree un post est on ajoute des element a se post ==//
if ($isSubmitted && $_POST['add_post'] == "valider")
{
    $post = new Post(0,$post_title,$postContent,$date,$post_signal,$userId);
    $postId = (int)$post->create();
    if($postId)
    {
        foreach ($elem as $element) {
        $elemment = new Element($element['name'],$element['quantity'],$availib,$postId);
            if($elemment->create()){
                $createPostSuccess = true;
            }
        }
    }
} else if($isSubmitted && $_POST['add_comment'] == "valider")
{
    $comment = new Comment( 0,$content,$date,$signal,$userId,$post_id);
    if($comment->create())
    {
        $createCommentSuccess = true;
    }
}else if($isSubmitted && $_POST['add-ratings'])
{
    $add_note = new Note(0,$note,$post_id);
        if ($add_note->create())
        {
            $ratingSucces = true;
        }
}
//===============================================================================================//
    require_once dirname(__FILE__).'/../views/header.php';
    require_once dirname(__FILE__).'/../controllers/nav_bar_ctrl.php';
    require_once dirname(__FILE__).'/../views/actualité_views.php';
?>