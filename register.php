<?php
// verify captcha --------------------------------------
require('vendor/autoload.php');
if(isset($_POST['submit_post'])) 
{
    $errors = '';
    if(!empty($_POST['g-recaptcha-response'])) 
    {
        $recaptcha = new \ReCaptcha\ReCaptcha('6LcQtfYUAAAAAHrbq0Bn7rCJ_p1LhlIq72zBIpqn');
        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) 
        {
            #Redirection ver profil.php
            header('Location: succes.php'); 
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
    <title>SpaceBrico - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Niramit:wght@300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="asset/libs/css/bootstrap-grid.css">
    <link rel="stylesheet" href="asset/libs/css/bootstrap.css">
    <link rel="stylesheet" href="asset/libs/css/fontawesome.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/screen.css">
</head>

<body>
    <header class="d-flex justify-content-center">
        <a href="http://127.0.0.1"><img class="ml-50" src="asset/img/Logo-space-brico.png" alt="" width="200px"></a>
    </header>
    <div class="bg">
        <div class="d-flex justify-content-center text-white">
            <form action="" method="POST">
                <p class="h2 text-dark text-uppercase d-flex justify-content-center mt-5 mb-4">Inscription</p>
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Jean">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Dupont">
                    </div>
                    <div class="col-12 mt-2">
                        <input type="text" class="form-control" placeholder="Email">
                    </div>
                      <div class="col-12 mt-2">
                        <input type="text" class="form-control" placeholder="Confirm Email">
                    </div>
                    <div class="col-6 mt-2">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-6 mt-2">
                        <input type="password" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="col-7 mt-2">
                        <input type="text" class="form-control" placeholder="Adresse Postal">
                    </div>
                    <div class="col-2 mt-2">
                        <input type="text" class="form-control" placeholder="Ville">
                    </div>
                    <div class="col-3 mt-2">
                        <input type="text" class="form-control" placeholder="Code postal">
                    </div>
                    <div class="col-12 row d-flex justify-content-around">
                        <div class="col-2 mt-2 mr-n5 pr-2">
                            <input type="number" class="form-control" placeholder="Jour">
                        </div>
                        <div class="col-2 mt-2 pr-2">
                            <input type="number" class="form-control" placeholder="Mois">
                        </div>
                        <div class="col-2 mt-2 pr-2">
                            <input type="number" class="form-control" placeholder="Année">
                        </div>
                        <div class="col-6 mt-2 ">
                            <input type="text" class="form-control" placeholder="Télephone" style="width: 335px !important;">
                        </div>
                    </div>
                    <div class="col-4 text-dark  mt-2">
                        <div class="col form-control">
                            <input type="radio"  name="genre" id="homme">
                            <label for="homme">Homme</label>
                        </div>
                        <div class="col form-control mt-2">
                            <input type="radio"  name="genre" id="femme">
                            <label for="femme">Femme</label>
                        </div>
                    </div>
                    <div class="col-8 ">
                        <div id="reg" class="g-recaptcha d-flex justify-content-center" data-sitekey="6LcQtfYUAAAAAHuiPdMtV2MJEacUOpoIDZW2t9P1" ></div>
                    </div>
                    <div class="col-12 mt-2">
                        <p class="error text-center"><?= !empty($errors) ? $errors : '' ?></p>
                    </div>
                    <div class="col-12 mt-n5">
                        <button class="btn btn-info btn-block my-4" type="submit" name="submit_post">S'inscrire</button>
                    </div>
                    <p class="text-dark text-center col-12">Vous etes déja menbre?
                    <a href="index.php">Se connecter</a>
                </p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b3f34b62ee.js" crossorigin="anonymous"></script>
    <script src="asset/libs/js/bootstrap.bundle.js"></script>
</body>

</html>