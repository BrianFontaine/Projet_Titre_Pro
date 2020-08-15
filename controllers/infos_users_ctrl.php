<?php
session_start();
    // require_once dirname(__FILE__).'/../models/';
    include '../asset/php/picture.php';
    $title = 'SpaceBrico - Informations personelles';
    $name = 'Fontaine';
    $lastName = 'Brian';
    $civility = 'Monsieur';
    $birthDays = '19/02/1998';
    $postalAddress = '1 impasse Louis Quentin';
    $postalCode = 80390;
    $city = 'Fressenville';
    $password = 'Saisisez votre nouveau mot de passe !';
    $confirPassword = 'Veuillez confirmer votre mot de passe !';
    $email = 'briandeveloppeurweb@gmail.com';
    $confirmEmail = 'briandeveloppeurweb@gmail.com';
    $phone = '06.23.56.56.56';
    $job = 'Développeur web junior';
    $company = 'La manu';
    $lastPasword =$_SESSION['password'];
    $photo = 'user-boy_default.png';

    require_once dirname(__FILE__).'/../views/header.php';
    require_once dirname(__FILE__).'/../views/navbar.php';
    require_once dirname(__FILE__).'/../views/info_users_views.php';
    ?>
