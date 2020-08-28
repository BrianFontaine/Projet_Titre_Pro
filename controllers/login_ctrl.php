<?php
    session_start();
    require_once dirname(__FILE__).'/../models/Users.php';
    if (isset($_GET['logout'])) {
		// vide le tableau session
		$_SESSION['user'] = [];
		// vide la variable session
		unset($_SESSION['user']);
		// détruit la session
		session_destroy();
    }
    $mail = $_POST['mail'];
    $password = $_POST['pass'];
	if (isset($mail) && isset($password)) {
		// regex avant envoi	
		$user = new Users('','','','',$mail,$password);
        // vérifie que la requête est execute et qu'elle renvoie une valeur
		if($user->readSingle()){
            // récupère les infos fetch
            $userInfo = $user->readSingle();
            // var_dump($userInfo);
            // password_verify compare un password en clair avec son hashage
            if (password_verify($password, $userInfo->users_password))
            {
                // créé la session utilisateur
                $_SESSION['user']['auth'] = true;
                $_SESSION['user']['users_id'] = $userInfo->users_id;
                $_SESSION['user']['mail'] = $userInfo->users_mail;
                $success =true;
            }
            else{
                $errors['login'] = 'Login ou password incorrecte';
            }
        }
    }
    if ($success) {
        header('location:../profile/?id='.$_SESSION['user']['users_id']);
    }
    // var_dump($_POST);
    // var_dump($userInfo);
    require_once dirname(__FILE__).'/../views/login_views.php';
?>