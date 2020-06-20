<?php
    $firstName = 'Masson';
    $lastName = 'Jean-Charle';
if (isset($_GET['search'])&& $_GET['search'] != '')
{
    echo 'ok';
}
else
{
?>
<p class="actu">
    <div class="actu-users">
        <div class="header-actu">
            <img class="image-user-actus" src="asset/img/3275434.jpg" alt=""
                style="wigth:75px; height:75px; border-radius:50%;">
            <h5 class="title-users-actu"><?= $firstName.' '.$lastName; ?></h5>
            <p class="note">Note :&nbsp;<i class="fas fa-star"></i><i class="fas fa-star-half-alt"><i
                        class="far fa-star"></i><i class="far fa-star"></i></i><i class="far fa-star"></i></p>
            <p class="element-requied">Element restant :</p>
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
            <img class="image-user-actus" src="asset/img/3275434.jpg" alt=""
                style="wigth:75px; height:75px; border-radius:50%;">
            <h5 class="title-users-actu"><?= $firstName.' '.$lastName; ?></h5>
            <p class="note">Note :&nbsp;<i class="fas fa-star"></i><i class="fas fa-star-half-alt"><i
                        class="far fa-star"></i><i class="far fa-star"></i></i><i class="far fa-star"></i></p>
            <p class="element-requied">Element restant :</p>
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
<?php } ?>