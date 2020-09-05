<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceBrico - Succes</title>
    <link rel="stylesheet" href="../asset/libs/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../asset/libs/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/libs/css/fontawesome.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/screen.css">
</head>

<body>
    <header class="d-flex justify-content-center">
        <a href="http://127.0.0.1"><img class="ml-50" src="asset/img/Logo-space-brico.png" alt="" width="200px"></a>
    </header>
    <div class="SB-bg_success">
        <div class="d-flex justify-content-center text-center mt-3">
            <p class="text-success alert alert-success">
                <b>Votre compte a été créé avec succes<b><br>
                Un emailde confirmation a été envoyer a <span><?= $_POST['mail']; ?></span>
            </p>
        </div>
        <div class="row justify-content-center mb-3">
            <a class="btn btn-info text-center" href="../Connection/">Se connecter</a>
        </div>
    </div>
    </div>
    <script src="https://kit.fontawesome.com/b3f34b62ee.js" crossorigin="anonymous"></script>
</body>

</html>