<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="180x180" href="../asset/img/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-status-bar" content="#aa7700">
    <link rel="icon" type="image/png" sizes="32x32" href="../asset/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../asset/img/favicon-16x16.png">
    <link rel="manifest" href="../asset/img/site.webmanifest">
    <link rel="mask-icon" href="../asset/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#9f00a7">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="icon" type="image/png" href="../asset/img/logoSpaceBrico_V2.01.png" />
    <link href="https://fonts.googleapis.com/css2?family=Niramit:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Saira+Stencil+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Srisakdi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../asset/libs/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../asset/libs/css/bootstrap.css">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img class="img-fluid col-md-1" src="../asset/img/logoSpaceBrico_V2.2.png" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="admin_ctrl.php">Acceuil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="users_ctrl.php?page=1">Liste Utilisateurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listPost_ctrl.php">Liste des Postes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Messagerie</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid mt-2">
    <div class="row mt-2 rounded col-sm-12 container-fluid m-auto">
        <div class="card col-sm-12 mt-4" style="width: 100%;">
        <?php if(isset($deleteSucces)) { ?>
            <div class="alert alert-success text-center mt-3">Cet article a bien été supprimer </div>
        <?php } else{ ?> 
            <div class="alert alert-danger text-center mt-3">Voulez-vous vraiment supprimer cet article ?</div>
        <?php } ?>
            <div class="card-body row">
                <img class="card-img-top col-sm-1 rounded-circle" src="<?=$photo?>"
                    alt="Photo de <?= $postInfos->users_lastname.' '.$postInfos->users_firstname?>">
                <h5 class="card-title h3 my-auto"><?= $postInfos->users_lastname.' '.$postInfos->users_firstname?></h5>
            </div>
            <div class="ml-5">
                <p class="card-text">Titre du post : <?= $postInfos->post_title ?></p>
                <p class="card-text">Contenue du post :</br> <?= $postInfos->post_content ?></p>
            </div>
            <form action="" method="POST" class="row mb-3 justify-content-center">
                <input class="btn btn-danger ml-5" type="submit" value="Supprimer">
                <!-- ============== input hidden id post=========================== -->
                <input type="hidden" name="delete" value="<?= $postInfos->post_id; ?>">
                <!-- ============== fin du input hidden =========================== -->
                <!-- ============== input hidden token ============================ -->
                <input type="hidden" name="token" value="<?= $usersInfos->token; ?>">
                <!-- ============== fin du input hidden =========================== -->
                <a class="btn btn-secondary ml-5" href="listPost_ctrl.php">Annuler</a>
            </form>
            <div class="text-danger text-center h3"><?= $errors['admin'] ?? '' ?></div>
        </div>
    </div>
</div>
<footer class="page-footer font-small bg-dark pt-4 mt-2 text-white">
    <div class="container-fluid text-center text-md-left">
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3 ">
                <h5 class="text-uppercase text-center">SpaceBrico</h5>
                <iframe class="col-12"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2559.3286121999686!2d1.82678931608766!3d50.09885587942843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dd8cb0500c2b43%3A0xda6b2ab7e9d1764c!2s70%20Route%20de%20Rouen%2C%2080100%20Abbeville!5e0!3m2!1sfr!2sfr!4v1600960805004!5m2!1sfr!2sfr"
                    width="500" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0 mb-3">
                <h5 class="text-uppercase">Infos Admin</h5>
                <ul class="list-unstyled text-white">
                    <li>
                        <p>Fontaine Brian / SpaceBrico</p>
                    </li>
                    <li>
                        <p>70 Route de Rouen Appartement 15 Batiment D</p>
                    </li>
                    <li>
                        <a class="text-white" href="tel:0624441335">Télephone gérand : 06 24 44 13 35</a>
                    </li>
                    <li>
                        <a class="text-white"
                            href="mailto:briandeveloppeurweb@gmail.com">briandeveloppeurweb@gmail.com</a>
                    </li>
                    <li>
                        <p>80100 Abbeville</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 mb-md-0 mb-3">
                <h5 class="text-uppercase">Mon Compte</h5>
                <ul class="list-unstyled text-white">
                    <li>
                        <p>Fontaine Brian / SpaceBrico</p>
                    </li>
                    <li>
                        <img class="col-sm-5" src="https://chaire-eti.org/wp-content/uploads/2018/01/avatar-homme.png"
                            alt="">
                    </li>
                    <li>
                        <a class="text-white text-center" href="">Deconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://mdbootstrap.com/"> SpaceBrico</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</footer>
</body>

</html>