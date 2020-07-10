<?php
    $firstName = 'Masson';
    $lastName = 'Jean-Charle';
if (isset($_GET['search'])&& $_GET['search'] != '')
{
    echo 'ok';
}
else
{
    for ($i=0; $i < 10; $i++) 
{ ?>
<p class="actu">
    <div class="actu-users">
        <div class="header-actu">
            <img class="image-user-actus" src="asset/img/user-boy_default.png" alt=""
                style="wigth:75px; height:75px; border-radius:50%;">
            <h5 class="title-users-actu"><?= $firstName.' '.$lastName; ?></h5>
            <p class="note">Note :
            <i class="far fa-star" aria-hidden="true" data-value="1"></i>
                <i class="far fa-star" aria-hidden="true" data-value="2"></i>
                <i class="far fa-star" aria-hidden="true" data-value="3"></i>
                <i class="far fa-star" aria-hidden="true" data-value="4"></i>
                <i class="far fa-star" aria-hidden="true" data-value="5"></i>
            </p>
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
<?php }

} ?>