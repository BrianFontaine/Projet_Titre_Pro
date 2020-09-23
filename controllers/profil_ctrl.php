<?php
    require_once dirname(__FILE__).'/../models/Users.php';
    require_once dirname(__FILE__).'/../models/Post.php';
    require_once dirname(__FILE__).'/../models/Comment.php';
    require_once dirname(__FILE__).'/../models/Note.php';
    require_once dirname(__FILE__).'/../models/Element.php';
    require_once dirname(__FILE__).'/../models/Etre_amis.php';
    session_start();
    $isSubmited = false;
    $errors = [];
    $isSubmitted = false;
    // recuperation de l'id de la session 
    $userId = (int) $_SESSION['user']['users_id'];
    // recuperation du timestamp du serveur 
    $date = $_SERVER['REQUEST_TIME'];
    // ========= Redirection ver la page connection si l'utilisateur n'est pas connecter 
    if (empty($_SESSION['user'])) {
        // redirection si pas connecté
        header('location: ../connection/');
        // stop la lecture du script
        exit();
    }
    //==================================================================================
    // ========= Redirection ver son profil si le methode get n'existe pas ==============
    if (!isset($_GET['id']))
    {
        $profil = false;
        header('location:../profile/?id='.$_SESSION['user']['users_id']);
    }
    //==================================================================================
        // ========= Affichage des post selon l'utilisateur =====================
        $id = (int) $_GET['id'];
        $usersInfos = new Users($id);
        $postViews = $usersInfos->readAllPostFromUsers();
        //============ AFFICHER LES ELEMENTS ===================//
        $elementInfos = new Element();                          //
        $listElements = $elementInfos->readAll();               //
        // =====================================================//
        //=======================================================================
    // ========= Affichage les infos l'utilisateur ==========================
    $usersViews = $usersInfos->readSingle();
    $firstName = $usersViews->users_firstname;
    $lastName = $usersViews->users_lastname;
    $age = $usersViews->users_age.' Ans';
    $city = $usersViews->city_name;
    $job = $usersViews->users_job;
    $situation = $usersViews->users_situations;
    $school = $usersViews->users_school;
    $title = 'Profil de'.' '.$firstName.' '.$lastName;
    if ($usersViews->users_pictures != NULL) {
        $photo = PICT_FOLDER.'pict-'.$usersViews->users_id.'.'.$usersViews->users_pictures;
    }else{
        $photo ='../asset/img/user-boy_default.png';
    }
    //=======================================================================
    // ============= ajouter un amis ========================================
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['add_friends'] == 'add') {
        $isSubmited = true;
        // identifiant du demandeur 
        $idUser = (int) $_SESSION['user']['users_id'];
        // identifiant du receveur 
        $idFriend = (int) $_GET['id'];
        // pending en stad 1 est en attente 
        $pending = 1;
        // instancie la class estre_amis avec l'id de la personne que l'on veux ajouter 
        $verifyFriend = new Etre_amis($idFriend);
        // lancement de la fonction verifyFriends
        $verify = $verifyFriend->verifyFriends();
        // on verifie que lutilisateur que l'on veux demander en amis est est identique a celui en base de données
        // si ses le cas on lui indique une erreur comme quoi il l'a déja ajouter en amis 
        if ($_GET['id'] == $verify->users_id_etre_amis) {
            $errors['addFriends'] = 'Vous avez déjà ajouter cette personne';
        }
        // si le formulaire est poster est qu'il y a pas d'erreur alors on peut faire le traitement 
        // pour l'inserer en base de donnes 
        if ($isSubmited && count($errors) == 0) {
            $addFriend = new Etre_amis();
            $addFriend->users_id = $idUser;
            $addFriend->users_id_etre_amis = $idFriend;
            $addFriend->pending = $pending;
            if($addFriend->addFriends()){
                $addFriendSuccess = true;
            }
        }
    }
    $idUser = isset($_GET['id'])? $_GET['id'] : (int) $_SESSION['user']['users_id'];
    // identifiant du receveur 
    // $idFriend = (int) $_GET['id'];
    $friend = new Etre_amis();
    $friend->users_id = $idUser;
    // $friend->users_id_etre_amis = $idFriend;
    $friendList = $friend->listFriends();
    // var_dump($friendList);
    // ======================= On formate le timestamp a celui de paris  ==================//
    date_default_timezone_set("Europe/Paris");
    //=====================================================================================//
    // verrifier si la methode post est appler est que se soit bien un post 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_post'])) 
    {
        // insert POST
        $isSubmitted = true;
        // on nettoie le input du titre du poste 
        $post_title = trim(strip_tags($_POST['post_title']));
        // on virifie que le titre ne sois pas vide et qu'il existe bien 
        if(!isset($post_title) && !empty($post_title)){
            $errors['title'] = "Veuillez renseiger un titre a votre articles";
        }
        // on nettoie le input du contenue de l'article 
        $postContent = trim(strip_tags($_POST['post_contents']));
        // on verrifie que le contenue ne sois pas vide est qu'il est bien present 
        if(!isset($postContent) && !empty($postContent)){
            $errors['content'] = 'Un article ne peut pas etre vide';
        }
        // on declare l'articlecomme non signaler don false == 0
        $post_signal = 0;
        // insert Elements
        $elem = $_POST['element'];
        // $qte = $_POST['quatity_element'];
        $availib = 1;
    }
    // verifier si la methode poste est appeler est que se soit bien un commentaire 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_comment'])) {
        // insert comment
        $isSubmitted = true;
        // on nettoye le input du contenue du commentaire
        $content = trim(strip_tags($_POST['comment']));
        // on verifie que le contenue ne sois pas vide et qu'il existe bien 
        if(!isset($content) && !empty($content)){
            $errors['comment'] = 'un commentaire ne peut pas etre vide';
        }
        // on declare le signalement du poste a 0 ou false 
        $signal = 0;
        // on insert en basse de donner l'id du post 
        $post_id = (int) $_POST['post_id'];
    }
    // verifier si la methode post est appeler et quil ajoute bien une note 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-ratings'])) {
        // insert Note
        $isSubmitted = true;
        // on insert en basse de donner l'id du post 
        $post_id = (int) $_POST['post_id'];
        $note = (int) $_POST['note'];
    }
// ==================== si il y a aucune erreur on cree un post est on ajoute des element a se post ==//
if ($isSubmitted && isset($_POST['add_post']) && !empty($errors['title']) && !empty($errors['post_title']))
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
} 
if($isSubmitted && isset($_POST['add_comment']) && !empty($errors['comment']))
{
    $comment = new Comment( 0,$content,$date,$signal,$userId,$post_id);
    if($comment->create())
    {
        $createCommentSuccess = true;
    }
}
if($isSubmitted && isset($_POST['add-ratings']))
{
    $add_note = new Note(0,$note,$post_id);
        if ($add_note->create())
        {
            $ratingSucces = true;
        }
}
function initiales($nom){
    $nom_initiale = ''; // déclare le recipient
    $n_mot = explode(" ",$nom);
    foreach($n_mot as $lettre){
        $nom_initiale .= $lettre{0}.'.';
    }
    return strtoupper($nom_initiale);
}
    //======================================================================================
    include dirname(__FILE__).'/../views/header.php';
    require_once dirname(__FILE__).'/../controllers/nav_bar_ctrl.php';
    require_once dirname(__FILE__).'/../views/profil_views.php';
?>