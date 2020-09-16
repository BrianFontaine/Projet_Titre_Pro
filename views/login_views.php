<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceBrico - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Niramit:wght@300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../asset/libs/css/animations-extended.min.css">
    <link rel="stylesheet" href="../asset/libs/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../asset/libs/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/libs/css/fontawesome.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/screen.css">
</head>
<body>
    <header class="d-flex justify-content-center">
        <a href="http://127.0.0.1"><img class="ml-50 infinite mb-3 mt-3" src="../asset/img/logoSpaceBrico_V2.01.png" alt="" width="100"></a>
    </header>
    <div class="bg">
        <div class="d-flex justify-content-center">
            <form class="text-center text-white" action="../connection/" method="POST">
                <p class="h4 mb-4 text-dark">Se connecter</p>
                <!-- Email -->
                <input type="email" id="defaultLoginFormEmail" class="form-control mb-4 <?=$isSubmitted && ($errors['mail']) ? 'is-invalid' : '' ?>" placeholder="E-mail" name="mail">
                <div class="invalid-feedback"><?= $errors['mail'] ?? '' ?></div>
                <!-- Password -->
                <input type="password" id="defaultLoginFormPassword" class="form-control mb-4 <?=$isSubmitted && ($errors['pass']) ? 'is-invalid' : '' ?>" placeholder="Password" name="pass">
                <div class="invalid-feedback"><?= $errors['pass'] ?? '' ?></div>
                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember" name="remenber">
                            <label class="custom-control-label text-dark" for="remember">Se souvenir de moi </label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <a href="">Mot de passe oubliée ?</a>
                    </div>
                </div>
                <!-- Sign in button -->
                <div class="<?=$isSubmitted && isset($errors['login']) ? 'is-invalid' : '' ?>" style="height:100px;">
                    <button class="btn btn-info btn-block my-4" type="submit" >Se connecter&nbsp;<i class="fas fa-lock"></i></button >
                    <div class="text-danger"><?= $errors['login'] ?? '' ?></div>
                    <!-- <?= var_dump($errors);?> -->
                </div>
                <!-- Social login -->
                <!-- <p class="text-dark">Se connecter avec :</p>
                <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a> -->
                <!-- <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a> -->
                <!-- Register -->
                <p class="text-dark">Vous n'êtes pas encore membres ?
                    <a href="../inscription/">S'inscrire</a>
                </p>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/b3f34b62ee.js" crossorigin="anonymous"></script>
</body>
</html>