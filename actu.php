<?php
    $firstName = 'Masson';
    $lastName = 'Jean-Charle';
    $title ='SpaceBrico';
    include 'header.php';
    include 'navbar.php';
?>
<div id="contenue-actu" class="row d-flex justify-content-center">
            <p class="actu">
                <div class="actu-users">
                    <div class="header-actu">
                        <img class="image-user-actus" src="asset/img/3275434.jpg" alt="" style="wigth:75px; height:75px; border-radius:50%;">
                        <h5 class="title-users-actu" ><?= $firstName.' '.$lastName; ?></h5>
                        <p class="note" >Note : <?php for ($i=0; $i < 5; $i++) { ?>
                            <i class="far fa-star star"></i>
                        <?php } ?> </p>
                        <p class="element-requied" >Element restant :</p>
                    </div>
                    <div class="article">
                        <p>articles</p>
                    </div>
                    <div class="row social d-flex justify-content-center"> 
                        <a href="" class="text-primary">J'aime</a>
                        <a href="" class="text-danger">Je n'aime pas</a>
                        <a href="" class="text-dark">Commentaire</a>
                        <a href="" class="text-dark">Parttager</a>
                    </div>
                </div>
            </p>
            <p class="actu">
                <div class="actu-users">
                    <div class="header-actu">
                        <img class="image-user-actus" src="asset/img/3275434.jpg" alt="" style="wigth:75px; height:75px; border-radius:50%;">
                        <h5 class="title-users-actu" ><?= $firstName.' '.$lastName; ?></h5>
                        <p class="note" >Note : <?php for ($i=0; $i < 5; $i++) { ?>
                            <i class="far fa-star"></i>
                        <?php } ?> </p>
                        <p class="element-requied" >Element restant :</p>
                    </div>
                    <div class="article">
                        <p>articles</p>
                    </div>
                    <div class="row social d-flex justify-content-center"> 
                        <a href="" class="text-primary"><i class="fas fa-thumbs-up"></i></a>
                        <a href="" class="text-danger"><i class="fas fa-thumbs-down"></i></a>
                        <a href="" class="text-dark">Commentaire</a>
                        <a href="" class="text-dark">Parttager</a>
                    </div>
                </div>
            </p>
            </div>
    <div id="col-right" class="col-lg-3">
        <h3 class="title-slide">Amis connecté</h3>
        <div class="center row">
            <img class="users-conect" src="asset/img/3275434.jpg" alt="profil-users">
            <h6 id="users-name-connect">Fontaine brian</h6>
            <div class="color-connect"></div>
        </div>
        <div class="center row">
            <img class="users-conect" src="asset/img/3275434.jpg" alt="profil-users">
            <h6 id="users-name-connect">Fontaine brian</h6>
            <div class="color-disconnect"></div>
        </div>
        <div class="center row">
            <img class="users-conect" src="asset/img/3275434.jpg" alt="profil-users">
            <h6 id="users-name-connect">Fontaine brian</h6>
            <div class="do_not_disturb"><i class="fas fa-moon"></i></div>
        </div>
    </div>
</body>
<?php
    include 'footer.php';
?>