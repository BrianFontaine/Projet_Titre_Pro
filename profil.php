<?php
    $firstName = 'Fontaine';
    $lastName = 'Brian';
    $age = '22 Ans';
    $city = 'Abbeville';
    $job = 'Développeur web junior';
    $situation = 'Fiancé';
    $school = 'La Manu';
    $title = 'Profil de'.' '.$firstName.' '.$lastName;
    $photo = $_COOKIE['picture'] ?? 'user-boy_default.png';
    include 'header.php';
?>

<body>
    <header>
        <?php 
            include 'navbar.php';
        ?>
        <main>
            <div id="contenue" class="row d-flex justify-content-center">
                <p class="actu">
                    <div class="actu-users">
                        <div class="header-actu">
                            <img class="image-user-actus" src="asset/img/<?= $photo; ?>" alt=""
                                style="wigth:75px; height:75px; border-radius:50%;">
                            <h5 class="title-users-actu"><?= $firstName.' '.$lastName; ?></h5>
                            <p class="note">Note :</p>
                            <p class="element-requied">Element restant :</p>
                        </div>
                        <div class="article">
                            <p>articles</p>
                        </div>
                        <div class="row social d-flex justify-content-center">
                            <a class="text-primary">J'aime</a>
                            <a class="text-danger">Je n'aime pas</a>
                            <a class="text-dark" data-toggle="collapse" data-target="#commentaire">Commenter</a>
                            <a class="text-dark">Partager</a>
                        </div>
                    </div>
                </p>
                <div id="commentaire" class="collapse actu-users-comment">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                <p class="actu">
                    <div class="actu-users">
                        <div class="header-actu">
                            <img class="image-user-actus" src="asset/img/<?= $photo; ?>" alt=""
                                style="wigth:75px; height:75px; border-radius:50%;">
                            <h5 class="title-users-actu">Fontaine Brian</h5>
                            <p class="note">Note :</p>
                            <p class="element-requied">Element restant :</p>
                        </div>
                        <div class="article">
                            <p>articles</p>
                        </div>
                        <div class="row social d-flex justify-content-center">
                            <button class="text-primary">J'aime</button>
                            <button class="text-danger">Je n'aime pas</button>
                            <button class="text-dark" >Commenter</button>
                            <button class="text-dark">Partager</button>
                        </div>
                    </div>
                </p>
            </div>
            <div id="col-left" class="">
                <div class="user-profil">
                    <img class="user_img" src="asset/img/<?= $photo; ?>" alt="">
                    <a class="user-name text-center h2" href=""><?= $firstName.' '.$lastName; ?></a>
                    <p class="h4 user-age w-100"><?= $age; ?></p>
                    <div class="user-infos">
                        <h3 class="text-center text-uppercase title-infos">Infos</h3>
                        <p>Ville : <?= $city; ?></p>
                        <p>Travail : <?= $job; ?></p>
                        <p>Etude : <?= $school; ?></p>
                        <p>Situation : <?= $situation; ?></p>
                    </div>
                    <div class="friends">
                        <h3 class=" text-center text-uppercase title-infos">Amis</h3>
                        <img src="" alt="">
                    </div>
                    <div class="friends">
                        <h3 class=" text-center text-uppercase title-infos">Photo</h3>
                        <img src="" alt="">
                    </div>
                    <div class="friends">
                        <h3 class=" text-center text-uppercase title-infos">Centre d'interé</h3>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
            <div id="col-right" class="col-lg-3">
                <h3 class="title-slide">Amis connecté</h3>
                <div class="center row">
                    <img class="users-conect" src="asset/img/<?= $photo; ?>" alt="profil-users">
                    <h6 id="users-name-connect">Fontaine brian</h6>
                    <div class="color-connect"></div>
                </div>
                <div class="center row">
                    <img class="users-conect" src="asset/img/<?= $photo; ?>" alt="profil-users">
                    <h6 id="users-name-connect">Fontaine brian</h6>
                    <div class="color-disconnect"></div>
                </div>
                <div class="center row">
                    <img class="users-conect" src="asset/img/<?= $photo; ?>" alt="profil-users">
                    <h6 id="users-name-connect">Fontaine brian</h6>
                    <div class="do_not_disturb"><i class="fas fa-moon"></i></div>
                </div>
            </div>
            </div>
        </main>
        <footer>

        </footer>
        <?php 
        include 'footer.php';
    ?>
</body>

</html>