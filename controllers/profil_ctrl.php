<?php
    require_once dirname(__FILE__).'/../models/Users.php';
    session_start();
    if (empty($_SESSION['user'])) {
        // redirection si pas connecté
        header('location: http://localhost/projet-pro/connection/');
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
    function age($date) { 
        $age = date('Y') - $date; 
        if (date('md') < date('md', strtotime($date))) { 
            return $age - 1; 
        } 
        return $age; 
    }
    // var_dump($usersViews);

    $firstName = $usersViews->users_firstname;
    $lastName = $usersViews->users_lastname;
    $age = age($usersViews->users_birthdate).' Ans';
    $city = 'Abbeville';
    $job = 'Développeur web junior';
    $situation = 'Fiancé';
    $school = 'La Manu';
    $title = 'Profil de'.' '.$firstName.' '.$lastName;
    $photo = $usersViews->profil_pictures.'.png';
    // var_dump($usersViews);

    include dirname(__FILE__).'/../views/header.php';
    include dirname(__FILE__).'/../views/navbar.php';
    require_once dirname(__FILE__).'/../views/profil_views.php';
?>