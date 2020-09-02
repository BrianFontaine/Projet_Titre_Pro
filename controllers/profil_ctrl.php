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

    // var_dump($id);
    // $postInfos = new Users();
    $postViews = $usersInfos->readAll();
    // var_dump($postViews);
    
    function age($date) { 
        $age = date('Y') - $date; 
        if (date('md') < date('md', strtotime($date))) { 
            return $age - 1; 
        } 
        return $age; 
    }
    // var_dump($usersViews);
    // var_dump($postInfos = new Users($id));
    
    $firstName = $usersViews->users_firstname;
    $lastName = $usersViews->users_lastname;
    $age = age($usersViews->users_birthdate).' Ans';
    $city = $usersViews->city_name;
    $job = $usersViews->users_job;
    $situation = $usersViews->users_situations;
    $school = $usersViews->users_school;
    $title = 'Profil de'.' '.$firstName.' '.$lastName;
    $photo = $usersViews->users_pictures.'.png';
    // var_dump($usersViews);

    include dirname(__FILE__).'/../views/header.php';
    include dirname(__FILE__).'/../views/navbar.php';
    require_once dirname(__FILE__).'/../views/profil_views.php';
?>