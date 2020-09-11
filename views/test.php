<?php
session_start();
require_once dirname(__FILE__) . '/../Models/user.php';

if (isset($_GET['logout'])) {
    // vide le tableau session
    $_SESSION['user'] = [];
    // vide la variable session
    unset($_SESSION['user']);
    // détruit la session
    session_destroy();
    header('refresh:0; Controllers/login_ctrl.php');
}

$title = 'se connecter';
$email = '';
$password = '';
$emailExist = "";
$isSubmitted = false;
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['connexion'])) {
    $isSubmitted = true;
    if (isset($email) && isset($password)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty('$email')) {
            $errors['email'] = 'Veuillez renseigner votre adresse email!';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Le champs n\'est pas valide!';
        }if (empty($password)) {
            $errors['password'] = 'Merci de mettre ton mot de passe ;)';
        }
        $user = new Users('','','','',$email,$password);
        
        if($user->connect()) {
            $userCo = $user->connect();

            if(password_verify($password,$userCo->password)){

                if($userCo->user_active == 1){
                $_SESSION['user']['auth'] = true;
                $_SESSION['user']['user_id'] = $userCo->user_id;
                $_SESSION['user']['email'] = $userCo->email;
                $_SESSION['user']['admin'] = $userCo->admin; 
                $success = true;
                header('location:../profil');
                }else{
                    $errors['email'] = 'vous devez activez votre compte!';
                }

            }else{
                $errors['email'] = 'votre email ou votre mot de passe est incorrecte!';
                $success = false;
            }
        }
    }
}

$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));

require_once dirname(__FILE__) . '/../Controllers/header_ctrl.php';
require_once dirname(__FILE__) . '/../Views/login.php';
