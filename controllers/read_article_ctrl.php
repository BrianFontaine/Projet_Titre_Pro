<?php
session_start();
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
require_once dirname(__FILE__).'/../models/Comment.php';
require_once dirname(__FILE__).'/../models/Ranks.php';
require_once dirname(__FILE__).'/../models/Element.php';
require_once dirname(__FILE__).'/../models/Note.php';
$title = 'Article Numéro '.$_GET['id'].' | Panneau Administrateur';
// ================= Lister tous les post ======================
$id = $_GET['id'];
$posts = new Post($id);
$postInfos = $posts->readSingle();
// si lextention de la photo est enregister en bdd 
if($postInfos->users_pictures != null){
    $photo = '../uploads/pict-'.$postInfos->users_id.'.'.$postInfos->users_pictures;
}else{
    $photo = '../asset/img/user-boy_default.png';
}
// =============================================================
// ============== Listes des commentaires ======================
$comments = new Comment();
$commentList = $comments->readAllFromPost();
// ============== Element du post ==============================
$elementInfos = new Element();
$listElements = $elementInfos->readAll();
// =============================================================
require_once dirname(__FILE__).'/../views/read_artcle.php';
?>