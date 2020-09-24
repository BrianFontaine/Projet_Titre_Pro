<?php
session_start();
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
require_once dirname(__FILE__).'/../models/Comment.php';
// ================= Trier par page =============================
$page = ctype_digit($_GET['page']) ? (int) $_GET['page'] : 1;
// var_dump($page);
$perPage = 10;
$users = new Users();
$listUsers = $users->readAll($page,$perPage);
// var_dump($listPatients);
$usersTotal = $users->readCountUsers();
$pageNumber = ceil($usersTotal->Utilisateur/$perPage);
// ================================================================
require_once dirname(__FILE__).'/../views/users.php';
?>