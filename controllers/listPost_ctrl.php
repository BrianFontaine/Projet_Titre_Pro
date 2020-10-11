<?php
session_start();
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
require_once dirname(__FILE__).'/../models/Comment.php';
require_once dirname(__FILE__).'/../models/Ranks.php';
require_once dirname(__FILE__).'/../models/Element.php';
require_once dirname(__FILE__).'/../models/Note.php';
$title = 'List des Post | Panneau Administrateur';
// ================= Lister tous les post ======================
    $posts = new Post();
    $listPost = $posts->readAll();
// =============================================================
// ============== Element du post ==============================
    $elementInfos = new Element();
    $listElements = $elementInfos->readAll();
// =============================================================
// ============ recupere la photo en bdd =======================
$users = new users($_SESSION['user']['users_id']);
$usersInfosConnect = $users->readSingle();
if($usersInfosConnect->users_pictures != null){
    $photo = '../uploads/Profil_pictures/pict-'.$usersInfosConnect->users_id.'.'.$usersInfosConnect->users_pictures;
}else{
    $photo = '../asset/img/user-boy_default.png';
}
require_once dirname(__FILE__).'/../views/listPost.php';
?>