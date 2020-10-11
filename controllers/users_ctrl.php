<?php
session_start();
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
require_once dirname(__FILE__).'/../models/Comment.php';
require_once dirname(__FILE__).'/../models/Ranks.php';
$title = 'List des Utilisateur | Panneau Administrateur';
$sesionAdmin = $_SESSION['user']['ranks'] == 10290;
// ================= Trier par page =============================
$page = ctype_digit($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = 10;
$users = new Users();
$listUsers = $users->readAll($page,$perPage);
$usersTotal = $users->readCountUsers();
$pageNumber = ceil($usersTotal->Utilisateur/$perPage);
// ================================================================
// ============ Liste des roles ================================
$ranks = new Ranks();
$listRank = $ranks->readAll();
// =============================================================
// ============ recupere la photo en bdd =======================
$users = new users($_SESSION['user']['users_id']);
$usersInfosConnect = $users->readSingle();
if($usersInfosConnect->users_pictures != null){
    $photo = '../uploads/Profil_pictures/pict-'.$usersInfosConnect->users_id.'.'.$usersInfosConnect->users_pictures;
}else{
    $photo = '../asset/img/user-boy_default.png';
}
require_once dirname(__FILE__).'/../views/users.php';
?>