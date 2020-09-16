<?php
if (!isset($_SESSION['users_id']) && isset($_COOKIE['login'],$_COOKIE['pseudo'])&& !empty($_COOKIE['login']) && !empty($_COOKIE['login'])) {
    $user = new Users($_COOKIE['pseudo'], '', '', '', '', '','','','','','','',$_COOKIE['login']);
    // vérifie que la requête est execute et qu'elle renvoie une valeur
    if ($user->readSingle()) 
    {
        // récupère les infos fetch
        $userInfo = $user->readSingle();
        // on verifie que l'id de l'utilisateur et le token corresponde en basse de données 
        if ($_COOKIE['pseudo']== $userInfo->users_id && $_COOKIE['login'] == $userInfo->token) {
            // créé la session utilisateur
            $_SESSION['user']['auth'] = true;
            $_SESSION['user']['users_id'] = $userInfo->users_id;
            $_SESSION['user']['mail'] = $userInfo->users_mail;
            $_SESSION['user']['ranks'] = $userInfo->ranks_id;
            $_SESSION['user']['token'] = bin2hex(random_bytes(16));
            $_SESSION['user']['actif'] = $user->users_actif;
            $success = true;
            if (isset($success)) {
                $token = $_SESSION['user']['token'];
                $usersId = $_SESSION['user']['users_id'];
                $user = new Users();
                $user->users_id = $usersId;
                $user->token = $token;
                setcookie('login',$token,time()-3600);
                setcookie('login',$token,time()+365*24*3600,'/',null,false,true);
                if ($user->insertToken()) {
                    // header('location:../profile/?id=' . $_SESSION['user']['users_id']);
                }
            }
        } else {
            $errors['login'] = 'Vous n\'etes pas autoriser a vous connecter a se compte !';
        }
    }
}

