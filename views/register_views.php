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
        <a href="login.php"><img class="ml-50 mt-3 mb-3" src="../asset/img/logoSpaceBrico_V2.01.png" alt=""
                width="200"></a>
    </header>
    <div class="bg">
        <!-- <P class="h1 text-center mt-5 mb-n5 "><?= $id;?></P> -->
        <?php if(isset($createSuccess)) { ?>
        <p class="text-success alert alert-success">
                <b>Votre compte a été créé avec succes<b><br>
                Un emailde confirmation a été envoyer a <span><?= $_POST['mail']; ?></span>
        </p>
        <?php } ?>
        <div class="d-flex justify-content-center text-white">
            <form action="../controllers/register_ctrl.php" method="POST">
                <p class="h2 text-dark text-uppercase d-flex justify-content-center mt-5 mb-4">Inscription</p>
                <div class="form-row">
                    <label class="text-dark" for="lastname">Votre prénom : </label>
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control <?=$isSubmitted && ($errors['lastname']) ? 'is-invalid' : '' ?>" placeholder="Dupont" id="lastname" name="lastname" value="<?php if (isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>">
                        <div class="invalid-feedback"><?= $errors['lastname'] ?? '' ?></div>
                    </div>
                    <label class="text-dark" for="firstname">Votre Nom : </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control <?=$isSubmitted && ($errors['firstname']) ? 'is-invalid' : '' ?>" placeholder="Jean" id="firstname" name="firstname" value="<?php if (isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">
                        <div class="invalid-feedback"><?= $errors['firstname'] ?? '' ?></div>
                    </div>
                    <label class="text-dark" for="mail">Votre email : </label>
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control <?=$isSubmitted && ($errors['mail']) ? 'is-invalid' : '' ?>" placeholder="Email" id="mail" name="mail" value="<?php if (isset($_POST['mail'])) { echo $_POST['mail']; } ?>">
                        <div class="invalid-feedback"><?= $errors['mail'] ?? '' ?></div>
                    </div>
                    <label class="text-dark" for="password">Votre mot de passe : </label>
                    <div class="col-md-12 mt-2 rounded-pill">
                        <input type="password" class="form-control <?=$isSubmitted && ($errors['pass']) ? 'is-invalid' : '' ?>" placeholder="Password" id="password" name="pass" value="<?php if (isset($_POST['pass'])) { echo $_POST['pass']; } ?>">
                        <div class="invalid-feedback"><?= $errors['pass'] ?? '' ?></div>
                        <div id="forcePassword" class="mt-1">
                            <div class="force-progress w-100 rounded-pill bg-light">
                                <div id="progress" class="p-bar" role="progressbar" aria-valuemin="0" aria-valuemax="4" style="border-radius:25px;">
                                    <div id="force" class="small text-light pl-2">Faible</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="text-dark" for="c_password">confirmer votre mot de passe : </label>
                    <div class="col-md-12 mt-2">
                        <input type="password" class="form-control" placeholder="Confirm Password" id="c_password"
                            name="confPass" value="<?php if (isset($_POST['confPass'])) { echo $_POST['confPass']; } ?>">
                    </div>
                    <label class="text-dark">Votre ville : </label>
                    <div class="col-md-12 mt-2">
                        <input class="form-control <?=$isSubmitted && ($errors['cities']) ? 'is-invalid' : '' ?>" type="search" name="search_cities" id="search" placeholder="Rechercher votre ville...">
                        <!-- ============================= INPUT HIDDEN ================= -->
                        <input type="hidden" name="cities" id="cities">
                        <!-- ============================================================ -->
                        <div id="result" style="position:absolute;left:0;right:0;"></div>
                        <div class="invalid-feedback"><?= $errors['cities'] ?? '' ?></div>
                    </div>
                    <label class="text-dark" for="birthdate">Votre date de naissance : </label>
                    <div class="col-md-12 mt-2 mr-n5 pr-2">
                        <input type="date" class="form-control <?=$isSubmitted && ($errors['birthdate']) ? 'is-invalid' : '' ?>" id="birthdate" name="birthdate" value="<?php if (isset($_POST['birthdate'])) { echo $_POST['birthdate']; } ?>">
                        <div class="invalid-feedback"><?= $errors['birthdate'] ?? '' ?></div>
                    </div>
                    <input type="hidden" name="picture" value="user-boy_default">
                    <label class="text-dark">Votre genre: </label>
                    <div class="col-md-12 text-dark  mt-2">
                        <div class="col form-control <?=$isSubmitted && ($errors['lastname']) ? 'is-invalid' : '' ?>">
                            <input type="radio" name="genre" id="homme" value="1"
                                <?= $gender == '1' ? 'checked' : '' ?>>
                            <label for="homme">Homme</label>
                        </div>
                        <div class="col-md-12 form-control mt-2 <?=$isSubmitted && ($errors['lastname']) ? 'is-invalid' : '' ?>">
                            <input type="radio" name="genre" id="femme" value="2"
                                <?= $gender == '2' ? 'checked' : '' ?>>
                            <label for="femme">Femme</label>
                        </div>
                        <div class="invalid-feedback"><?= $errors['genre'] ?? '' ?></div>
                        <div class="col-md-12 form-control mt-2 <?=$isSubmitted && ($errors['lastname']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback"><?= $errors['cgu'] ?? '' ?></div>
                            <input type="checkbox" name="cgu" id="cgu" value="1" class="">
                            <label for="cgu">&nbsp;J'ai lu et j'accepte les conditions génerales d'utilisations </label>
                            <embed src="../asset/docs/CGU.pdf" class="col-12" type="application/pdf">
                        </div>
                        <!-- <div class="col-md-12 ">
                            <div id="reg" class="g-recaptcha d-flex justify-content-center"
                                data-sitekey="6LcQtfYUAAAAAHuiPdMtV2MJEacUOpoIDZW2t9P1"></div>
                        </div> -->
                        <div class="col-md-12 mt-n5">
                            <button class="btn btn-info btn-block my-4" type="submit">S'inscrire</button>
                        </div>
                        <!-- name="submit_post"  -->
                        <p class="text-dark text-center col-12">Vous etes déja menbre?
                            <a href="../connection/">Se connecter</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b3f34b62ee.js" crossorigin="anonymous"></script>
    <script src="../asset/libs/js/bootstrap.bundle.js"></script>
    <script src="../asset/js/password_force.js"></script>
    <script src="../asset/js/ajax_cities.js"></script>
</body>
</html>