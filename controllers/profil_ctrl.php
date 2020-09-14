<?php
    require_once dirname(__FILE__).'/../models/Users.php';
    require_once dirname(__FILE__).'/../models/Post.php';
    session_start();
    if (empty($_SESSION['user'])) {
        // redirection si pas connecté
        header('location: ../projet-pro/connection/');
        // stop la lecture du script
        exit();
    }

    if (!isset($_GET['id']))
    {
        $profil = false;
        header('location:../profile/?id='.$_SESSION['user']['users_id']);
    }
    $id = (int) $_GET['id'];
    $usersInfos = new Users($id);
    $usersViews = $usersInfos->readSingle();

    $postViews = $usersInfos->readAll();
    
    $firstName = $usersViews->users_firstname;
    $lastName = $usersViews->users_lastname;
    // $age = age($usersViews->users_birthdate).' Ans';
    $age = $usersViews->users_age.' Ans';
    $city = $usersViews->city_name;
    $job = $usersViews->users_job;
    $situation = $usersViews->users_situations;
    $school = $usersViews->users_school;
    $title = 'Profil de'.' '.$firstName.' '.$lastName;
    $photo = PICT_FOLDER.'pict-'.$usersViews->users_id.'.'.$usersViews->users_pictures;;

    include dirname(__FILE__).'/../views/header.php';
    require_once dirname(__FILE__).'/../controllers/nav_bar_ctrl.php';
    require_once dirname(__FILE__).'/../views/profil_views.php';
?>