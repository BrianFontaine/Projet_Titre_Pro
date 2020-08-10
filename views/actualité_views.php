</div>
<!-- friend_only_show -->
<div id="people" class="friends_online">
    <i id="open" class="fas fa-users"></i>
</div>
<div id="people_close" class="friends_online d-none">
    <i id="open" class="fas fa-times"></i>
</div>
<div class="friends_online_active d-none">
    <h6 class="ml-3 mt-2 h4">Amis connéctés</h6>
    <?php for ($i=0; $i < 80; $i++) { ?>
        <div class="row ml-3 mt-2">
            <img class="img_friend_active" src="../asset/img/3275434.jpg" alt="profil-users">
            <h6 class="name_friend_active ml-3 mt-3" >Fontaine brian</h6>
            <div class="color-connect_active mt-3 ml-4"></div>
    </div>
    <?php } ?>
</div>
<!-- top_rated_active_show -->
<div id="favorites" class="top_rated"> 
    <i class="fas fa-heart"></i>
</div>
<div class="top_rated_active d-none">
    <h6 class="ml-3 mt-2 h4">Mes Favoris</h6>
    <?php for ($i=0; $i < 80; $i++) { ?>
        <div class="row ml-3 mt-2">
            <img class="" src="../asset/img/3275434.jpg" alt="profil-users">
            <h6 class="" >Fontaine brian</h6>
            <div class=""></div>
    </div>
    <?php } ?>
</div>
<div id="col-right" class="col-lg-3 ">
    <h3 class="title-slide">Amis connectés</h3>
    <div class="center row">
        <img class="users-conect" src="../asset/img/3275434.jpg" alt="profil-users">
        <h6 id="users-name-connect">Fontaine brian</h6>
        <div class="color-connect"></div>
    </div>
    <div class="center row">
        <img class="users-conect" src="../asset/img/3275434.jpg" alt="profil-users">
        <h6 id="users-name-connect">Fontaine brian</h6>
        <div class="color-disconnect"></div>
    </div>
    <div class="center row">
        <img class="users-conect" src="../asset/img/3275434.jpg" alt="profil-users">
        <h6 id="users-name-connect">Fontaine brian</h6>
        <div class="do_not_disturb"><i class="fas fa-moon"></i></div>
    </div>
</div>
</body>
<div id="" class="row d-flex justify-content-center contenue-actu">
    <form action="actualité_ctrl.php" method="POST"
        class="col-md-10 mt-4 mb-4 rounded users_post_bg form-input">
        <div class="row">
            <img class="mt-3 ml-4 mb-2 rounded-circle img_user_actu img-fluid" src="../asset/img/user-boy_default.png"
                alt="">
            <h6 class="mt-5 ml-2 text-white"><?= $firstName.' '.$lastName; ?></h6>
        </div>
        <div>
            <textarea class="form-group col-md-12 rounded disabled_element" name="requied_element" id="elements"
                cols="95" rows="3" placeholder="Elément réstant" x-webkit-speech></textarea>
        </div>
        <div>
            <textarea class="form-group col-md-12 rounded post" name="Aticle" id="post" cols="95" rows="5"
                placeholder="Exprimez-vous <?= $lastName; ?> !"></textarea>
        </div>
        <div class="row">
            <div class="preview mt-2 ml-2 d-none"></div>
            <div class="preview mt-2 ml-2 d-none"></div>
            <div class="preview mt-2 ml-2 d-none"></div>
            <div class="preview mt-2 ml-2 d-none"></div>
        </div>
        <div class="form-group col-md-12 text-right disabled_movie" id="form_btn">
            <button id="vide" class="btn btn-light remove" type="button" style="font-size: 1.2em;"><i class="fas fa-times-circle"></i></button>
            <label class="btn btn-light my-2" for="gallery-photo-add" style="font-size: 1.2em;"><i class="fas fa-camera-retro"></i>&nbsp;|&nbsp;<i class="far fa-camera-movie"></i><input type="file" name="picture_movies" id="gallery-photo-add"
                    data-preview=".preview" multiple="multiple"></label>
            <button class="btn btn-light" type="submit" style="font-size: 1.2em;">Publier</button>
            <div class="gallery row justify-content-around"></div>
        </div>
    </form>    
    <?php for ($i=0; $i < 30 ; $i++) { ?>
    <div class="col-md-10 mt-4 mb-4 rounded users_post_bg ">
        <div class="row">
            <img class="mt-3 ml-4 mb-2 rounded-circle img_user_actu img-fluid" src="../asset/img/user-boy_default.png"
                alt="">
            <h6 class="mt-5 ml-2 text-white"><?= $firstName.' '.$lastName; ?></h6>
        </div>
        <div>
            <h6 class="text-white ml-3">Note général :
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </h6>
            <p class="bg-light rounded">Il me reste trois plache de chêne claire en longeur de 3 mètres environ
                1,5cm d'épaisseur. Je recherche des plaques
                de plexiglas.
            </p>
        </div>
        <div class="mt-2 bg-light rounded">
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui quaerat fugit soluta, fugiat maxime
                repudiandae modi saepe ex voluptatibus eaque dolor impedit, necessitatibus recusandae, laudantium
                molestias eius hic cum facilis.
                Corporis eveniet nostrum facilis asperiores iste expedita molestiae, laudantium voluptate assumenda
                tempora mollitia voluptatum magni, itaque aspernatur totam placeat non impedit accusamus quibusdam error
                fugiat. Culpa quae nisi tempora enim!
                La date courante est
                <details>
                    <summary>la suite...</summary>
                    <p>
                        Ipsam nam quae, dolorum nulla voluptates autem necessitatibus explicabo perferendis expedita
                        atque quod
                        voluptas non. Dolorem optio est earum praesentium ad. Impedit itaque facere animi rem
                        voluptatibus error
                        tenetur praesentium?
                        Est quis dolor magnam quo corrupti harum perferendis minima vitae at doloribus facilis totam
                        temporibus
                        velit impedit itaque explicabo sit magni, iure quae expedita fugiat quasi nobis. Iste, ratione
                        consequuntur.
                        Mollitia excepturi sequi nihil voluptas, nostrum maiores consequatur obcaecati, laudantium,
                        dolore sunt sint eveniet quae autem reprehenderit dicta corrupti recusandae! Distinctio
                        officiis, porro obcaecati laudantium ut nisi maiores iure aperiam?
                        Sed harum nisi quibusdam earum perferendis perspiciatis suscipit neque ut in corporis, veniam,
                        culpa tempora quas. Quia dignissimos enim delectus ducimus rerum, qui omnis id, repellat quidem
                        dolorum iure sed!
                        Repudiandae distinctio magni fugit, accusantium perspiciatis, nihil dignissimos, optio
                        blanditiis labore animi voluptatibus reiciendis! Omnis sit unde, quae rerum doloremque est?
                        Numquam, provident aspernatur explicabo quod suscipit nihil inventore incidunt!
                        Magni iste possimus eum adipisci architecto voluptas tempore facilis ducimus optio error, quis
                        repellendus sunt tenetur fuga, quia asperiores. Numquam sed eveniet rerum culpa accusantium
                        mollitia ut cum nam maxime.
                        Non, quibusdam, sapiente ipsam impedit exercitationem voluptatibus ea sit odio magnam atque sunt
                        vel nam blanditiis aliquid qui illum. Nisi nesciunt beatae molestiae reiciendis accusantium quo
                        delectus at deserunt sint?
                        Deserunt vitae accusantium reiciendis rerum nostrum illum culpa quas quasi. Itaque optio ipsum
                        quo perferendis ex assumenda ullam quod aperiam? Repellendus modi voluptatibus autem cum
                        doloremque dolore ab quod voluptatum.
                        Nesciunt officia, molestiae culpa laudantium hic qui dolores molestias obcaecati tenetur iure,
                        mollitia recusandae accusantium voluptatibus distinctio? Delectus corrupti blanditiis repellat
                        harum deleniti nulla officiis sunt consectetur, et inventore quibusdam?
                        Sed totam delectus ab asperiores labore velit. Quo voluptates quidem assumenda corporis quas
                        recusandae, quaerat at! Saepe maxime ea libero praesentium veniam ab numquam velit. Consequatur
                        ducimus ratione minus eaque!
                    </p>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 img_actu" src="../asset/img/user_id_1/banc-final-val.jpg"
                                    alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 img_actu"
                                    src="../asset/img/user_id_1/buffet-en-bois-de-palette.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 img_actu" src="../asset/img/user_id_1/hqdefault.jpg"
                                    alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </details>
            </p>
        </div>
        <div class="border mt-2 mb-n2"></div>
        <div class="row justify-content-around">
            <!-- <input class="btn btn-link" type="button" value="J'aime"> -->
            <div class="score text-white" style="margin-top: 6px;">
                Note :
                <i class="far fa-star" value="1"></i>
                <i class="far fa-star" value="2"></i>
                <i class="far fa-star" value="3"></i>
                <i class="far fa-star" value="4"></i>
                <i class="far fa-star" value="5"></i>
            </div>
            <input class="btn btn-link text-white" type="button" value="Commenter">
            <input class="btn btn-link text-white" type="button" value="Partager">
        </div>
    </div>
    <?php } ?>
    <div class="col-md-12" style="
    bottom: 0px;
    position: fixed;
    font-size: 2em;">
<?php
    include 'footer.php';
?>
</div>