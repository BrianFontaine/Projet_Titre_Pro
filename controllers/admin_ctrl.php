<?php
session_start();
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/Post.php';
require_once dirname(__FILE__).'/../models/Comment.php';
require_once dirname(__FILE__).'/../models/Ranks.php';
$title = 'Panneau Administrateur';
// declaration de sesion utilisateur lambda ===================
// Et si se nest pas un admin alors il redirige ===============
$sesionUsers = $_SESSION['user']['ranks'] == 34560;
$sesionAdmin = $_SESSION['user']['ranks'] == 10290;
if($sesionUsers){
	header("location:../profile/?id=".$_SESSION['user']['users_id']);
}
// ================= Liste Users ===============================
$users = new Users();
$listUsers = $users->readAllLastUsers();
// var_dump($listUsers);
// ============ recupere la photo en bdd =======================
$users = new users($_SESSION['user']['users_id']);
$usersInfosConnect = $users->readSingle();
if($usersInfosConnect->users_pictures != null){
    $photo = '../uploads/Profil_pictures/pict-'.$usersInfosConnect->users_id.'.'.$usersInfosConnect->users_pictures;
}else{
    $photo = '../asset/img/user-boy_default.png';
}
// ==============================================================
$countMen = $users->readCountMen();
$countWomen = $users->readCountWomen();
$countUsers = $users->readCountUsers();
// ==============================================================
// ============= Calcule du pourcentage =========================
function Pourcentage($Nombre, $Total) {
	return $Nombre * 100 / $Total;
}
// ==============================================================
// =========== Calcul du nombre de post Total ===================
$post = new Post();
$postCount = $post->readCountPost();
$postCountSignal = $post->readCountSignal();
// ============ Liste des roles ================================
$ranks = new Ranks();
$listRank = $ranks->readAll();
// =============================================================
// ========== taux de signalement ==============================
if(Pourcentage( $postCountSignal->Signalement,$postCount->Articles) <= 20 )
{
	$class='bg-success';
}else if(Pourcentage( $postCountSignal->Signalement,$postCount->Articles) <= 35)
{
	$class='bg-warning';
}else 
{
	$class='bg-danger';
}
require_once dirname(__FILE__).'/../views/admin.php';
?>