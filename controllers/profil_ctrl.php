<?php
    // require_once dirname(__FILE__).'/../models/';
    session_start();
    if (empty($_SESSION['user'])) {
		// redirection si pas connecté
		header('location: http://localhost/projet_pro/controllers/login_ctrl.php');
		// stop la lecture du script
		exit();
	}
    $firstName = 'Fontaine';
    $lastName = 'Brian';
    $age = '22 Ans';
    $city = 'Abbeville';
    $job = 'Développeur web junior';
    $situation = 'Fiancé';
    $school = 'La Manu';
    $title = 'Profil de'.' '.$firstName.' '.$lastName;
    $photo = $_COOKIE['picture'] ?? 'user-boy_default.png';
    include dirname(__FILE__).'/../views/header.php';
    include dirname(__FILE__).'/../views/navbar.php';
    require_once dirname(__FILE__).'/../views/profil_views.php';
?>