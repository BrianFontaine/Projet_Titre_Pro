
<?php
// verify captcha --------------------------------------
require('vendor/autoload.php');
if(isset($_POST['submit_post'])) 
{
    $errors = '';
    if(!empty($_POST['g-recaptcha-response'])) 
    {
        $recaptcha = new \ReCaptcha\ReCaptcha('6LcAJPYUAAAAAAW6u3VUi2L52teVA8jiKHdx4vqa');
        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) 
        {
            #Redirection ver profil.php
            header('Location: profil.php'); 
        }
        else 
        {
            #si le captcha est incorect
            $errors = $resp->getErrorCodes();
            #$errors ='Captcha Invalide';
        }
    } 
    else 
    {
        #quand le captcha n'est pas remplie!
        $errors = 'Captcha non rempli';
    }
}
// --------------------------------------------------
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceBrico - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Niramit:wght@300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="asset/libs/css/bootstrap-grid.css">
    <link rel="stylesheet" href="asset/libs/css/bootstrap.css">
    <link rel="stylesheet" href="asset/libs/css/fontawesome.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/screen.css">
</head>

<body>
    <h1 id="beta">(Bêta)</h1>
    <header class="d-flex justify-content-center">
        <a href="http://127.0.0.1"><img class="ml-50" src="asset/img/Logo-space-brico.png" alt="" width="200px"></a>
    </header>
    <div class="bg">
        <div class="d-flex justify-content-center">
            <form class="text-center text-white " action="" method="POST">
                <p class="h4 mb-4 text-dark">Se connecter</p>
                <!-- Email -->
                <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">
                <!-- Password -->
                <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember" disabled>
                            <label class="custom-control-label text-dark" for="defaultLoginFormRemember">Se souvenir de
                                moi (En développement)</label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <a href="">Mot de passe oubliée?</a>
                    </div>
                </div>

                <div class="g-recaptcha mt-2" data-sitekey="6LcAJPYUAAAAAFORdDGzHmnRQ8MlIMt9UFEXzYo9"></div>

                <p class="error"><?= !empty($errors) ? $errors : '' ?></p>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit" name="submit_post">Se connecter</button>

                 <!-- Social login -->
                 
                <p class="text-dark">Se connecter avec :</p>
                <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>

                <!-- <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a> -->

                <!-- Register -->
                <p class="text-dark">Vous etes pas encore menbre?
                    <a href="register.php">S'inscrire</a>
                </p>
            </form>
        </div>
    </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://kit.fontawesome.com/b3f34b62ee.js" crossorigin="anonymous"></script>
</body>
</html>