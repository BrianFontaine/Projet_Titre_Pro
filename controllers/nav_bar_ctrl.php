<?php 
    require_once dirname(__FILE__).'/../models/Users.php';
    if(isset($_SESSION['user'])){
        // Si la session est user existe alors je lance le readSingle de user pour sa photo de profil
        $id = (int) $_SESSION['user']['users_id'];
        $usersInfos = new Users($id);
        $usersViews = $usersInfos->readSingle();
        $photoNav = PICT_FOLDER.PICT_FOLDER_PROFIL_PICTURE.'pict-'.$usersViews->users_id.'.'.$usersViews->users_pictures;
    }

require_once dirname(__FILE__).'/../views/navbar.php';
