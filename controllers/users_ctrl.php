<?php
session_start();
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
require_once dirname(__FILE__).'/../models/Comment.php';
require_once dirname(__FILE__).'/../models/Ranks.php';
$title = 'List des Utilisateur | Panneau Administrateur';
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
require_once dirname(__FILE__).'/../views/users.php';
?>