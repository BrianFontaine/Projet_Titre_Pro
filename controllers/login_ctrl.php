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
    $success = false;
    $mail = $_POST['mail'] ?? '';
    $password = $_POST['pass'] ?? '';
	if (isset($mail) && isset($password)) {
		// regex avant envoi	
        $user = new Users('','','',$mail,'',$password);
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
                $_SESSION['user']['ranks'] = $userInfo->ranks_id;
                $_SESSION['user']['token'] = bin2hex(random_bytes(16));
                $_SESSION['user']['actif'] = $user->users_actif;
                $success =true;
            }
            else{
                $errors['login'] = 'Login ou password incorrecte';
            }
        }
    }
    if (isset($success)) {
        $token = $_SESSION['user']['token'];
        $user = new Users();
        $user->users_id = $_SESSION['user']['users_id'];
        $user->token = $token;
        if($user->insertToken())
        {
            // var_dump($user->token);
            // header('location:../profile/?id='.$_SESSION['user']['users_id']);
        }
    }
    require_once dirname(__FILE__).'/../views/login_views.php';
?>