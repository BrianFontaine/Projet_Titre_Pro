<?php
session_start();
require_once dirname(__FILE__) . '/../models/Users.php';
require_once dirname(__FILE__) . '/../models/Post.php';
require_once dirname(__FILE__) . '/../models/Comment.php';
require_once dirname(__FILE__) . '/../models/Note.php';
require_once dirname(__FILE__) . '/../models/Element.php';
require_once dirname(__FILE__) . '/../utils/function.php';
require_once dirname(__FILE__) . '/../controllers/cookie_connect.php';
// ======================= On formate le timestamp a celui de paris  ==================//
date_default_timezone_set("Europe/Paris");
//=====================================================================================//
//========================= Inistialisation des varible ===============================//
$id = '';
$firstName = '';
$lastName = '';
$title = 'SpaceBrico';
$isSubmittedPost = false;
$isSubmittedComment = false;
$isSubmittedRate = false;
$errors = [];
// recuperation de l'id de la session si la sesion user existe
if (isset($_SESSION['user'])) {
    $userId = (int) $_SESSION['user']['users_id'];
}
// recuperation du timestamp du serveur
$date = $_SERVER['REQUEST_TIME'];
// =====================================================================================//
// ======================= On verifie que lutilisateur est connecter ===================//
if (isset($_SESSION['user'])) {
    $id = (int) $_SESSION['user']['users_id'];
    //=============== afficher les infos users ============//
    $usersInfos = new Users($id);
    $usersViews = $usersInfos->readSingle();
    $firstName = $usersViews->users_firstname;
    $lastName = $usersViews->users_lastname;
    // var_dump($usersInfos->users_actif);
    // ===================================================//
    if ($usersViews->users_pictures != '') {
        $photo = PICT_FOLDER .PICT_FOLDER_PROFIL_PICTURE. 'pict-' . $usersViews->users_id . '.' . $usersViews->users_pictures;
    } else {
        $photo = '../asset/img/user-boy_default.png';
    }
}
//=========================================================================================//
// ================ afficher les poste ===============//
$post = new Post();
$listPost = $post->readAll();
// var_dump($listPost);
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
// verrifier si la methode post est appler est que se soit bien un post
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_post'])) {
    // insert POST
    $isSubmittedPost = true;
    // on nettoie le input du titre du poste
    $post_title = trim(strip_tags($_POST['post_title']));
    // on virifie que le titre ne sois pas vide et qu'il existe bien
    if (!isset($post_title) && !empty($post_title)) {
        $errors['title'] = "Veuillez renseiger un titre a votre articles";
    }
    // on nettoie le input du contenue de l'article
    $postContent = trim(strip_tags($_POST['post_contents']));
    // on verrifie que le contenue ne sois pas vide est qu'il est bien present
    if (!isset($postContent) && !empty($postContent)) {
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
    $isSubmittedComment = true;
    // on nettoye le input du contenue du commentaire
    $content = trim(strip_tags($_POST['comment']));
    // on verifie que le contenue ne sois pas vide et qu'il existe bien
    if (!isset($content) && !empty($content)) {
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
    $isSubmittedRate = true;
    // on insert en basse de donner l'id du post
    $post_id = (int) $_POST['post_id'];
    $note = (int) $_POST['note'];
}
//===================== uploads photo ================================================================//
if (isset($_FILES['picture'])){
    $files = $_FILES['picture'];
for ($i = 0; $i < count($files['name']); $i++) { // On traite le tableau retourné par file
    if (!empty($id)) {
        // Si On reçoit une photo
        if ($files['error'][$i] == 0) {
            $filename = $files['name'][$i];
            $extension = getExtension($filename);
            $sizePicture = $files['size'][$i];
            // Si poids pas ok
            if ($sizePicture > MAXFILESIZE) {
                // Erreur de poids*
                $errors["picture"] = "Erreur de poids";
            }
            // Si extension pas ok
            if (!in_array($extension, AUTHORIZED_EXTENSIONS)) {
                // Erreur d'extension
                $errors["picture"] = "Erreur d'extension";
            }
            // Si poids et extension ok
            if (count($errors) == 0) {
                // Definir le nom de la photo (pict-1.jpg, pict-4.png)
                $pictureRenamed = "pict-" . $id . "." . $extension;
                $pictureDest = dirname(__FILE__) . "/.." . PICT_FOLDER.PICT_FOLDER_POST . str_replace(" ", "_", $post_title .'_'. $i) . '.' . $extension;
                $tmp_name = $files['tmp_name'][$i];
                // Enregistrement de la photo
                if (move_uploaded_file($tmp_name, $pictureDest)) {
                    // Redimensionnement et compression
                    if (redim($pictureDest, 1920, 1080)) {

                    } else {
                        $errors["picture"] = "Un problème s'est produit lors du redimensionnement";
                    }
                } else {
                    $errors["picture"] = "Un problème s'est produit lors de l'envoi de votre photo";
                }
            }
        } else {
            $errors["picture"] = "Vous êtes inscrit, mais vous n'avez pas envoyé de photo";
        }
    } else {
        $errors["picture"] = "Problème lors de l'enregitrement de votre pseudo";
    }
}
}

// ==================== si il y a aucune erreur on cree un post est on ajoute des element a se post ==//
if ($isSubmittedPost) {
    $post = new Post(0, $post_title, $postContent, $date, $post_signal, $userId);
    $postId = (int) $post->create();
    if ($postId) {
        foreach ($elem as $element) {
            $elemment = new Element($element['name'], $element['quantity'], $availib, $postId);
            if ($elemment->create()) {
                $createPostSuccess = true;
            }
        }
    }
}
if ($isSubmittedComment) {
    $comment = new Comment(0, $content, $date, $signal, $userId, $post_id);
    if ($comment->create()) {
        $createComment = 'true' . $post_id;
        echo $createComment;
    }
}
if ($isSubmittedRate) {
    $add_note = new Note(0, $note, $post_id);
    if ($add_note->create()) {
        $ratingSucces = true;
    }
}
//===============================================================================================//
require_once dirname(__FILE__) . '/../views/header.php';
require_once dirname(__FILE__) . '/../controllers/nav_bar_ctrl.php';
require_once dirname(__FILE__) . '/../views/actualité_views.php';
