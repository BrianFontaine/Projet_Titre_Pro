<?php
// require_once dirname(__FILE__).'/../models/';
    session_start();
    $firstName = 'Masson';
    $lastName = 'Jean-Charles';
    $title ='SpaceBrico';
    $style ='/css/actu.css';
    require_once dirname(__FILE__).'/../views/header.php';
    require_once dirname(__FILE__).'/../views/navbar.php';
    require_once dirname(__FILE__).'/../views/actualité_views.php';
?>