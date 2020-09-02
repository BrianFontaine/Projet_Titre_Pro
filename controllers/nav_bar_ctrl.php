<?php 
    require_once dirname(__FILE__).'/../models/Users.php';
    // session_start();
    var_dump($_SESSION);
    $id = (int) $_SESSION['user']['users_id'];
    $usersInfos = new Users($id);
    $usersViews = $usersInfos->readSingle();
    $photoNav = $usersViews->users_pictures.'.png';
    var_dump($usersViews);

require_once dirname(__FILE__).'/../views/navbar.php';
