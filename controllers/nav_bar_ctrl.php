<?php 
    require_once dirname(__FILE__).'/../models/Users.php';

    $id = (int) $_SESSION['user']['users_id'];
    $usersInfos = new Users($id);
    $usersViews = $usersInfos->readSingle();
    $photoNav = PICT_FOLDER.'pict-'.$usersViews->users_id.'.'.$usersViews->users_pictures;
    // var_dump($usersInfos);

require_once dirname(__FILE__).'/../views/navbar.php';
