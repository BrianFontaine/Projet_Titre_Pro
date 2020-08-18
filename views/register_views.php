<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceBrico - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Niramit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../asset/libs/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../asset/libs/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/libs/css/fontawesome.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/screen.css">
</head>
<body>
    <header class="d-flex justify-content-center">
        <a href="login.php"><img class="ml-50 mt-3 mb-3" src="../asset/img/logoSpaceBrico_V2.01.png" alt="" width="200px"></a>
    </header>
    <div class="bg">
        <div class="d-flex justify-content-center text-white">
            <form action="../controllers/register_ctrl.php" method="POST">
                <p class="h2 text-dark text-uppercase d-flex justify-content-center mt-5 mb-4">Inscription</p>
                <div class="form-row">
                <label class="text-dark" for="lastname">Votre prénom : </label>
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control" placeholder="Dupont" id="lastname" name="lastname">
                    </div>
                    <label class="text-dark" for="firstname">Votre Nom : </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Jean" id="firstname" name="firstname">
                    </div>
                    <label class="text-dark" for="mail">Votre email : </label>
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control" placeholder="Email" id="mail" name="mail">
                    </div>
                    <label class="text-dark" for="password">Votre mot de passe : </label>
                    <div class="col-md-12 mt-2">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="pass">
                    </div>
                    <label class="text-dark" for="c_password">confirmer votre mot de passe : </label>
                    <div class="col-md-12 mt-2">
                        <input type="password" class="form-control" placeholder="Confirm Password" id="c_password">
                    </div>
                    <label class="text-dark" for="addresse">Votre adresse postal : </label>
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control" placeholder="Adresse Postal" id="addresse" name="addresse">
                    </div>
                    <label class="text-dark" for="country">Votre ville : </label>
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control" placeholder="Ville" id="country" name="country">
                    </div>
                    <label class="text-dark" for="zip_code">Votre code postal : </label>
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control" placeholder="Code postal" id="zip_code" name="zip_code">
                    </div>
                    <label class="text-dark" for="birthdate">Votre date de naissance : </label>
                    <div class="col-md-12 mt-2 mr-n5 pr-2">
                        <input type="date" class="form-control" placeholder="Jour" id="birthdate" name="birthdate">
                    </div>
                    <label class="text-dark" for="phone ">Votre numéro de téléphone : </label>
                    <div class="col-md-12 mt-2 ">
                        <input type="text" class="form-control" placeholder="Télephone" id="phone" name="phone">
                    </div>
                    <label class="text-dark" for="gender">Votre genre: </label>
                    <div class="col-md-12 text-dark  mt-2">
                        <div class="col form-control">
                            <input type="radio" name="gender" id="homme" value="1">
                            <label for="homme">Homme</label>
                        </div>
                        <div class="col-md-12 form-control mt-2">
                            <input type="radio" name="gender" id="femme" value="2">
                            <label for="femme">Femme</label>
                        </div>
                        <!-- <label class="text-dark" for="picture">Votre photo de profil : </label>
                        <div class="col-md-12 form-control mt-2">
                        <label for="picture">Téléchager une image de profile</label>
                            <input type="file" name="picture" id="picture">
                            <p>formats acceptés (jpg, jpeg, png, gif), taille max 2M</p>
                            <p class="text-danger"><?=$error?></p>
                        </div> -->
                        <div class="col-md-12 form-control mt-2">
                            <input type="checkbox" name="cgu" id="cgu" value="1">
                            <label for="cgu">&nbsp;J'ai lu et j'accepte les conditions génerales d'utilisations </label>
                            <embed src="../asset/docs/CGU.pdf" class="col-12" type="application/pdf">
                        </div>
                        <div class="col-md-12 ">
                            <div id="reg" class="g-recaptcha d-flex justify-content-center"
                                data-sitekey="6LcQtfYUAAAAAHuiPdMtV2MJEacUOpoIDZW2t9P1"></div>
                        </div>
                        <div class="col-md-12 mt-n5">
                            <button class="btn btn-info btn-block my-4" type="submit"
                                name="submit_post">S'inscrire</button>
                        </div>
                        <p class="text-dark text-center col-12">Vous etes déja menbre?
                            <a href="login_ctrl.php">Se connecter</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
        <?php $id->id;?>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b3f34b62ee.js" crossorigin="anonymous"></script>
    <script src="asset/libs/js/bootstrap.bundle.js"></script>
</body>
</html>