<?php
session_start();
require_once dirname(__FILE__).'/../models/Users.php';
require_once dirname(__FILE__).'/../models/City.php';
require_once dirname(__FILE__).'/../utils/function.php';
require_once dirname(__FILE__).'/../config/config.php';
if (empty($_SESSION['user'])) {
    // redirection si pas connecté
    header('location: http://localhost/projet_pro/controllers/login_ctrl.php');
    // stop la lecture du script
    exit();
}
if ($_GET['id'] != $_SESSION['user']['users_id']) {
    header('location: http://www.spacebrico.fr/profile/?id='.$_SESSION['user']['users_id']);
}
    $isSubmitted = false;
    $regexName = "/^[A-Za-zéÉ][A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+((-| )[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+)?$/";
    $regexDate = "/^((?:19|20)[0-9]{2})-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";
    $regexTel = "/^(?:\+33|0033|0)[1-79]((?:([\-\/\s\.])?[0-9]){2}){4}$/";
    $mailexist = '';
    $existingUser ='';
    $phone= '';
    $email = '';
    $school ='';
    $extension ='';
    $errors=[];

    if (!isset($_GET['id']) && empty($_GET['id'])) {
        header('location:../profile/');
    }
    $id = $_SESSION['user']['users_id'];
    $users = new Users($id);
    $infosUsers = $users->readSingle();
    if ($infosUsers->users_gender == 1) {
        $civility = 'Monsieur';
    }else if($infosUsers->users_gender == 2){
        $civility = "Madame";
    }

    // include '../asset/php/picture.php';
    $title = 'SpaceBrico - Informations personelles';
    $name = $infosUsers->users_firstname;
    $lastName = $infosUsers->users_lastname;
    $birthDays = $infosUsers->users_birthdate;
    $city = $infosUsers->city_name;
    $password = 'Saisisez votre nouveau mot de passe !';
    $confirPassword = 'Veuillez confirmer votre mot de passe !';
    $email = $infosUsers->users_mail;
    $confirmEmail = $infosUsers->users_mail;
    $phone = $infosUsers->users_phone;
    $job = $infosUsers->users_job;
    $company = $infosUsers->users_school;
    $situation = $infosUsers->users_situations;
    $lastPasword = '';
    $cities = $infosUsers->city_id;
    $photo = $filename = PICT_FOLDER.'pict-'.$infosUsers->users_id.'.'.$infosUsers->users_pictures;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $isSubmitted = true;
    // ========================================

    // ========================================
    $cities = (int) $_POST['cities'];
    // ========================================
    //verif champ mobile
    $phone = trim(htmlspecialchars($_POST['phone']));
    if (empty($phone)) {
        $errors['phone'] = 'Veuillez renseigner votre téléphone';
    } elseif (!preg_match($regexTel, $phone)) {
        $errors['phone'] = 'Le format du téléphone n\'est pas valide!';
    }
    // ========================================
    $job = trim(htmlspecialchars($_POST['job']));
    // ========================================
    $school = trim(htmlspecialchars($_POST['company']));
    // ========================================
    $situation = trim(htmlspecialchars($_POST['situation']));
    // ========================================
    $firstname = trim(filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING));
    if (empty($firstname)) {
        $errors['firstname'] = 'Veuillez renseigner le nom';
    } 
    elseif (!preg_match($regexName, $firstname)) {
        $errors['firstname'] = 'Votre nom contient des caractères non autorisés !';
    }
    // ====================================================================================================
    $lastname = trim(filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING));//enlève les espaces vides avant et après + nettoyage en fonction du type 
    if (empty($lastname)) {//verifie si le champ est vide
        $errors['lastname'] = 'Veuillez renseigner le prénom';
    } elseif (!preg_match($regexName, $lastname)) {//comparatif avec la regex correspondante
        $errors['lastname'] = 'Votre prénom contient des caractères non autorisés !';
    }
     //verif champ date d'anniversaire
    // ====================================================================================================
    $birthdate = trim(htmlspecialchars($_POST['birthdate']));
    if (empty($birthdate)) {
        $errors['birthdate'] = 'Veuillez renseigner votre date de naissance';
    } elseif (!preg_match($regexDate, $birthdate)) {
        $errors['birthdate'] = 'Le format valide est aaaa-mm-jj !';
    }
    // ========================================
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $errors['mail'] = 'Merci de renseigner votre adresse électronique.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = 'Le format attendu n\'est pas respecté.';
    } else {
        $user = new Users('','','',$email);
        $existingUser = $user->readPregMatchMail();
        $mailexist = $existingUser->users_mail;     
    }
    switch ($email) {
        case $infosUsers->users_mail:
            $email = $_POST['email'];
        break;
        case $mailexist:
            $errors['mail'] = 'Votre email existe déja';
        break; 
        default:
            $email = $_POST['email'];
    }
    // ================================================================================
    $gender = trim(filter_input(INPUT_POST, 'civility', FILTER_SANITIZE_NUMBER_INT));
    if (empty($gender)) {
        $errors['genre'] = 'Merci de renseigner votre civilité';
    }
    // ================================================================================
    // $pictures = $_POST['picture'];
    if(!empty($id)){
        // Si On reçoit une photo
        if($_FILES['picture']['error'] == 0){

            $filename = $_FILES['picture']['name'];
            // var_dump($_FILES);
            $extension = getExtension($filename);

            $sizePicture = $_FILES['picture']['size'];
            // Si poids pas ok
            if($sizePicture>MAXFILESIZE){
                // Erreur de poids*
                $errors["picture"] = "Erreur de poids";
            }
            // var_dump($sizePicture);
            // Si extension pas ok
            if(!in_array($extension, AUTHORIZED_EXTENSIONS)){
                // Erreur d'extension
                $errors["picture"] = "Erreur d'extension";
            }
            // var_dump($extension);
            // var_dump($users);
            // Si poids et extension ok
            if(count($errors) == 0){
                // Definir le nom de la photo (pict-1.jpg, pict-4.png)
                $pictureRenamed = "pict-".$id.".".$extension;
                $pictureDest = dirname(__FILE__)."/..".PICT_FOLDER.$pictureRenamed;
                
                $tmp_name = $_FILES["picture"]["tmp_name"];
                
                // Enregistrement de la photo
                if(move_uploaded_file($tmp_name, $pictureDest)){
                    // Redimensionnement et compression
                    if(redim($pictureDest)){
                        $users->users_id = $id;
                        $users->users_pictures = $extension;
                        // var_dump($users);
                        // $users->updateUser();
                    } else {
                        $errors["picture"] = "Un problème s'est produit lors du redimensionnement";
                    }
                } else{
                    $errors["picture"] = "Un problème s'est produit lors de l'envoi de votre photo";
                }
            }
        } else {
            // $errors["picture"] = "Vous êtes inscrit, mais vous n'avez pas envoyé de photo";
        }
    } else {
        $errors["picture"] = "Problème lors de l'enregitrement de votre pseudo";
    }
    if (empty($extension)) {
        $extension = $_POST['picture'];
    }
}
    if($isSubmitted && count($errors) == 0 && isset($_POST['save_change']) == 'valider'){
        $users = new Users();
        $users->users_id= $id;
        $users->users_firstname = $firstname;
        $users->users_lastname = $lastname;
        $users->users_mail =$email;
        $users->users_birthdate = $birthdate;
        // $users->users_password;
        $users->users_gender = $gender;
        $users->users_pictures = $extension;
        $users->users_phone = $phone;
        $users->users_job = $job;
        $users->users_school = $school;
        $users->users_situations = $situation;
        $users->city_id = $cities;
        if ($users->updateUser()) {
            $updateUsers = true;
            echo'ok';
        }
    }
    // var_dump($infosUsers);
    if (isset($_POST['delete_account']) == 'valider') {
        $user = new Users($id);
        $user->users_actif = 0;
        $passConfirm = trim(htmlspecialchars($_POST['pass_verify']));
        if(password_verify($passConfirm, $infosUsers->users_password)){
            if($user->disableUsers())
            {
                // header('location:../connection/?logout=true');
                echo 'ok';
            }
        }else{
            echo 'no';
            // $errors['passConf'] = "Votre mot de passe ne correspond pas !";
        }
    }
    require_once dirname(__FILE__).'/../views/header.php';
    require_once dirname(__FILE__).'/../controllers/nav_bar_ctrl.php';
    require_once dirname(__FILE__).'/../views/info_users_views.php';
    ?>
