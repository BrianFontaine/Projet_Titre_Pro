<?php
session_start();
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
require_once dirname(__FILE__).'/../models/Comment.php';

// ================= Liste Users ===============================
$users = new Users();
$listUsers = $users->readAllLastUsers();
// var_dump($listUsers);
// ==============================================================
$countMen = $users->readCountMen();
$countWomen = $users->readCountWomen();
$countUsers = $users->readCountUsers();
// ==============================================================
// ============= Calcule du pourcentage selon le genre ==========
function Pourcentage($Nombre, $Total) {
	return $Nombre * 100 / $Total;
}
// ==============================================================
// =========== Calcul du nombre de post Total ===================
$post = new Post();
$postCount = $post->readCountPost();
$postCountSignal = $post->readCountSignal();

require_once dirname(__FILE__).'/../views/admin.php';
?>