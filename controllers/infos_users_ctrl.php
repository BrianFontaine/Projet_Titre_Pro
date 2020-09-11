<?php
require_once dirname(__FILE__).'/../models/Users.php';
session_start();
if (empty($_SESSION['user'])) {
    // redirection si pas connecté
    header('location: http://localhost/projet_pro/controllers/login_ctrl.php');
    // stop la lecture du script
    exit();
}
    $isSubmited = false;
    if (!isset($_GET['id']) && empty($_GET['id'])) {
        header('location:../profile/');
    }
    $id = $_GET['id'];
    $users = new Users($id);
    $infosUsers = $users->readSingle();
    if ($infosUsers->users_gender == 1) {
        $civility = 'Monsieur';
    }else if($infosUsers->users_gender == 2){
        $civility = "Madame";
    }
    include '../asset/php/picture.php';
    $title = 'SpaceBrico - Informations personelles';
    $name = $infosUsers->users_firstname;
    $lastName = $infosUsers->users_lastname;
    $birthDays = $infosUsers->birthdate_fr;
    $city = $infosUsers->city_name;
    $password = 'Saisisez votre nouveau mot de passe !';
    $confirPassword = 'Veuillez confirmer votre mot de passe !';
    $email = $infosUsers->users_mail;
    $confirmEmail = $infosUsers->users_mail;
    $phone = $infosUsers->users_phone;
    $job = $infosUsers->users_job;
    $company = $infosUsers->users_school;
    $lastPasword = '';
    $photo = $infosUsers->users_pictures.'.png';
    // ============ Modification utilisateur ================//
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $isSubmited = true;
        
    }
        $user = new Users();


    require_once dirname(__FILE__).'/../views/header.php';
    require_once dirname(__FILE__).'/../views/navbar.php';
    require_once dirname(__FILE__).'/../views/info_users_views.php';
    ?>
