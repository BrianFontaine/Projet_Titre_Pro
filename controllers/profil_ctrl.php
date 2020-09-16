<?php
    require_once dirname(__FILE__).'/../models/Users.php';
    require_once dirname(__FILE__).'/../models/Post.php';
    require_once dirname(__FILE__).'/../models/Element.php';
    session_start();
    // ========= Redirection ver la page connection si l'utilisateur n'est pas connecter 
    if (empty($_SESSION['user'])) {
        // redirection si pas connecté
        header('location: ../connection/');
        // stop la lecture du script
        exit();
    }
    //==================================================================================
    // ========= Redirection ver son profil si le methode get n'existe pas ==============
    if (!isset($_GET['id']))
    {
        $profil = false;
        header('location:../profile/?id='.$_SESSION['user']['users_id']);
    }
    //==================================================================================
        // ========= Affichage des post selon l'utilisateur =====================
        $id = (int) $_GET['id'];
        $usersInfos = new Users($id);
        $postViews = $usersInfos->readAllPostFromUsers();
        //============ AFFICHER LES ELEMENTS ===================//
        $elementInfos = new Element();                          //
        $listElements = $elementInfos->readAll();               //
        // =====================================================//
        //=======================================================================
    // ========= Affichage les infos l'utilisateur ==========================
    $usersViews = $usersInfos->readSingle();
    $firstName = $usersViews->users_firstname;
    $lastName = $usersViews->users_lastname;
    $age = $usersViews->users_age.' Ans';
    $city = $usersViews->city_name;
    $job = $usersViews->users_job;
    $situation = $usersViews->users_situations;
    $school = $usersViews->users_school;
    $title = 'Profil de'.' '.$firstName.' '.$lastName;
    if ($usersViews->users_pictures != NULL) {
        $photo = PICT_FOLDER.'pict-'.$usersViews->users_id.'.'.$usersViews->users_pictures;
    }else{
        $photo ='../asset/img/user-boy_default.png';
    }
    //=======================================================================

    include dirname(__FILE__).'/../views/header.php';
    require_once dirname(__FILE__).'/../controllers/nav_bar_ctrl.php';
    require_once dirname(__FILE__).'/../views/profil_views.php';
?>