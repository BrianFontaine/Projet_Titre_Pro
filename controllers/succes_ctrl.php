<?php
require_once dirname(__FILE__).'/../models/Users.php';

$users = new Users();
$users->users_id = (int) $_GET['id'];
$userInfo = $users->readSingle();
// ====== verifier si le token passer en get et identique a celui en bdd ====//
if($_GET['confirm'] == $userInfo->token)
{
    $confirm = new Users();
    $confirm->token = $_GET['confirm'];
    $confirm->users_actif = 1;
    $usersConfirm = $confirm->confirmUsers();
}
require_once dirname(__FILE__).'/../views/succes_views.php';