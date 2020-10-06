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
</div>
<div class="row mt-2 rounded col-sm-12 container-fluid m-auto">
    <div class="card col-sm-12 mt-4" style="width: 100%;">
        <img class="card-img-top col-sm-1 rounded-circle" src="<?=$photo?>"
            alt="Photo de <?= $postInfos->users_lastname.' '.$postInfos->users_firstname?>">
        <div class="card-body">
            <h5 class="card-title h3"><?= $postInfos->users_lastname.' '.$postInfos->users_firstname?></h5>
            <p class="card-text h4">Titre du post : <?= $postInfos->post_title ?></p>
            <p class="card-text">Element du post :
                <?php foreach ($listElements as $element) { ?>
                <?php if($element->post_id == $postInfos->post_id){ ?>
                </br> -
                <?= $element->element_quantity.' '.$element->element_name;if($element->element_available == 1){echo' Disponible';}else{echo' Non Disponible';}?>
                <?php } ?>
                <?php } ?>
            </p>
            <p class="card-text">Contenue du post :</br> <?= $postInfos->post_content ?></p>
            <p class="card-text">Note général : <?= $postInfos->note_generale ?> (<?=$postInfos->noteTotal; ?> Notes
                Total)</p>
            <p class="card-text">Date du post :
                <?php
                    $date = date_create();
                    date_timestamp_set($date, $postInfos->post_date);
                    echo date_format($date, 'd/m/Y H:i:s') . "\n";
                ?>
            </p>
            <p class="card-text">Numero du post : <?= $postInfos->post_id ?></p>
            <?php if($postInfos->post_signal == 1){ ?>
            <div class="text-center h5 alert alert-warning">Cet article été signalé </div>
            <?php } ?>
            <div class="row justify-content-around mt-3">
                <a href="delete_article_ctrl.php?id=<?= $postInfos->post_id?>"
                    class="btn btn-warning col-sm-5">Supprimer ce post</a>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 bg-dark mt-3 p-2">
    <h2 class="col-sm-12 text-center text-white">Listes des commentaires</h2>
</div>
<?php foreach ($commentList as $commentInfos) { ?>
<?php if($commentInfos->post_id == $_GET['id']) {?>
<?php if($postInfos->users_pictures != null){ $photo = '../uploads/pict-'.$postInfos->users_id.'.'.$postInfos->users_pictures; }else{ $photo = '../asset/img/user-boy_default.png'; } ?>
<div class="col-sm-12 mt-3">
    <div class="card">
        <div class="row">
            <img src="<?= $photo ?>" class="img-fluid col-sm-1 rounded-circle ml-3" alt="">
            <h2 class="my-auto"><?= $commentInfos->users_firstname.' '.$commentInfos->users_lastname; ?></h2>
            <h6 class="my-auto ml-4"> Publiée le :
                <?php
                                $date = date_create();
                                date_timestamp_set($date, $commentInfos->comment_date);
                                echo date_format($date, 'd/m/Y H:i:s') . "\n";
                            ?>
            </h6>
        </div>
        <p class="ml-4"><?= $commentInfos->comment_content; ?></p>
    </div>
</div>
<?php } ?>
<?php }?>
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
                        <p><?=$usersInfosConnect->users_firstname.' '.$usersInfosConnect->users_lastname?> / SpaceBrico
                        </p>
                    </li>
                    <li>
                        <a href="<?=$photo?>">
                            <img class="col-sm-5 m-auto" src="<?=$photo?>"
                                alt="photo de <?=$usersInfosConnect->users_firstname.' '.$usersInfosConnect->users_lastname?>">
                        </a>
                    </li>
                    <li>
                        <a class="text-white text-center" href="../connection/?logout=true">Deconnexion</a>
                    </li>
                    <li>
                        <a class="text-white text-center"
                            href="../modifier_mes_informations/?id=<?=$_SESSION['user']['users_id']?>">Modifier mon
                            Profil</a>
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