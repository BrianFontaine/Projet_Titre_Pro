<?php
    session_start();
    require_once dirname(__FILE__).'/../models/Users.php';
    // ===== suppression des cookie lors de la deconection =======//
    setcookie('pseudo','',time()-3600);
    setcookie('login','',time()-3600);
    // ===========================================================//
    if (isset($_GET['logout'])) {
		// vide le tableau session
		$_SESSION['user'] = [];
		// vide la variable session
		unset($_SESSION['user']);
		// détruit la session
		session_destroy();
    }
    $success = false;
    $isSubmitted = false;
    $token='';
    $password = '';
    $mail = ''; 
    $usersId = '';
    $errors = [];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $isSubmitted = true;
        
        $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING));
        if (empty($mail)) {
            $errors['mail'] = 'Merci de renseigner votre adresse électronique.';
        } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = 'Le format attendu n\'est pas respecté.';
        }

        $password = trim(filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING));
        if(empty($password)){
            $errors['pass'] = 'Renseignez un mot de passe';
        }
    }
	if ($isSubmitted == true && count($errors) == 0) {
        // var_dump($isSubmitted);
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
                    if($userInfo->users_actif == 1)
                    {
                    // créé la session utilisateur
                    $_SESSION['user']['auth'] = true;
                    $_SESSION['user']['users_id'] = $userInfo->users_id;
                    $_SESSION['user']['mail'] = $userInfo->users_mail;
                    $_SESSION['user']['ranks'] = $userInfo->ranks_id;
                    $_SESSION['user']['token'] = bin2hex(random_bytes(16));
                    $_SESSION['user']['actif'] = $user->users_actif;
                    $success =true;
                    if (isset($success)) {
                        $token = $_SESSION['user']['token'];
                        $usersId = $_SESSION['user']['users_id'];
                        $user = new Users();
                        $user->users_id = $usersId;
                        $user->token = $token;
                        if(isset($_POST['remenber']))
                        {
                            setcookie('pseudo',$userInfo->users_id,time()+365*24*3600,'/',null,false,true);
                            setcookie('login',$token,time()+365*24*3600,'/',null,false,true);
                        }
                        if($user->insertToken())
                        {
                            header('location:../profile/?id='.$_SESSION['user']['users_id']);
                        }
                    }
                }
                else{
                    $errors['login'] = 'Vous devez Activer votre compte pour vous connecter';
                }
            }else{
                $errors['login'] = 'Login ou password incorrecte';
            }
        }else{
            $errors['login'] = 'Votre identifiant est incorrect !';
        }
    }
    require_once dirname(__FILE__).'/../views/login_views.php';
?>