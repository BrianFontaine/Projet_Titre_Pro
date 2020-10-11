<main>
    <div id="contenue" class="row d-flex justify-content-center">
        <?php if (!empty($_GET['id'] )&& $_GET['id'] == $_SESSION['user']['users_id']) {?>
        <form action="" method="POST" class="col-md-10 mt-4 mb-4 rounded users_post_bg form-input">
            <div class="row">
                <img class="mt-3 ml-4 mb-2 rounded-circle img_user_actu img-fluid"
                    src="<?= $photo; ?>" alt="">
                <h6 class="mt-5 ml-2 text-white"><?= $firstName.' '.$lastName; ?></h6>
            </div>
            <div class="SB-elements-require-add">
                <div class="row ml-1">
                    <!-- <textarea class="form-group col-md-12 rounded disabled_element" name="requied_element" id="elements"
                        cols="95" rows="3" placeholder="Elément réstant"></textarea> -->
                    <input type="text" name="element[1][name]" class="form-control col-md-8 rounder disabled_element mb-2" placeholder="Elément réstant">
                    <input type="number" name="element[1][quantity]" class="form-control col-md-2 rounder disabled_element mb-2 mr-2 ml-4" placeholder="Quantité">
                    <input type="button" class="form-control col-md-1 rounder disabled_element mb-2 ml-2" onclick="add_block();" Value="Plus">
                </div>
            </div>
            <input class="form-control mb-2" type="text" name="title_post" id="" placeholder="Ajouter un titre...">
            <div>
                <textarea class="form-group col-md-12 rounded post" name="post_contents" id="post" cols="95" rows="5"
                    placeholder="Exprimez-vous <?= $lastName; ?> !"></textarea>
            </div>
            <div class="row">
                <div class="preview mt-2 ml-2 d-none"></div>
                <div class="preview mt-2 ml-2 d-none"></div>
                <div class="preview mt-2 ml-2 d-none"></div>
                <div class="preview mt-2 ml-2 d-none"></div>
            </div>
            <div class="form-group col-md-12 text-right disabled_movie" id="form_btn">
                <button id="vide" class="btn btn-light remove" type="button" style="font-size: 1.2em;"><i
                        class="fas fa-times-circle"></i></button>
                <label class="btn btn-light my-2" for="gallery-photo-add" style="font-size: 1.2em;"><i
                        class="fas fa-camera-retro"></i><input
                        type="file" name="picture_movies" id="gallery-photo-add" data-preview=".preview"
                        multiple="multiple"></label>
                <button class="btn btn-light" type="submit" style="font-size: 1.2em;">Publier</button>
                <div class="gallery row justify-content-around"></div>
            </div>
        </form>
        <?php } ?>
        <?php foreach ($postViews as $post) { ?>
        <div class="col-md-10 mt-4 mb-4 rounded users_post_bg ">
            <div class="row">
                <img class="mt-3 ml-4 mb-2 rounded-circle img_user_actu img-fluid" src="<?= $photo; ?>"
                    alt="">
                <h6 class="mt-5 ml-2 text-white"><?= $firstName.' '.$lastName; ?></h6>
            </div>
            <div>
                <h6 class="text-white ml-3">Note général : <?= $post->note_generale ?>
                    <!-- <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i> -->
                </h6>
                <div class="bg-light rounded p-2">
                <?php foreach ($listElements as $element) {?>
                    <?php if ($element->post_id == $post->post_id) { ?>
                        <div class="row col-md-11">
                            <p class="col-md-8"><?=$element->element_name?> </p>
                            <p class="col-md-3"><?=$element->element_quantity?></p>
                        </div>
                    <?php } ?>
                <?php }?>
            </div>
            </div>
            <div class="mt-2 bg-light rounded p-2">
                <h5><?=$post->post_title;?></h5>
                <p>
                    <?= $post->post_content; ?>
                </p>
                <!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
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
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div> -->
            </div>
            <div class="border mt-2 mb-n2"></div>
            <div class="row justify-content-around">
                <div class="container p-3">
                    <form action="" method="POST">
                        <textarea name="comment" id="comment" cols="30" rows="1" class="form-control col-md-12 mb-1"
                            placeholder="Commentaire..." style="border-radius: 30px;"></textarea>
                        <div class="form-group col-md-12 text-right ">
                            <div class="score text-white text-left col-md-6" style="margin-top: 1em;">
                                Note :
                                <i class="far fa-star" value="1"></i>
                                <i class="far fa-star" value="2"></i>
                                <i class="far fa-star" value="3"></i>
                                <i class="far fa-star" value="4"></i>
                                <i class="far fa-star" value="5"></i>
                            </div>
                            <label class="btn btn-light my-2" for="gallery-photo-add"
                                style="font-size: 1em; position: ABSOLUTE; top: -1em; right: 12%;"><i
                                    class="fas fa-camera-retro"></i>
                                <input type="file" name="picture_movies" id="gallery-photo-add" data-preview=".preview"
                                    multiple="multiple"></label>
                            <button class="btn btn-light" type="submit"
                                style="font-size: 1em; position: absolute; top: -8px;right: 1%;">Publier</button>
                        </div>
                    </form>
                    <div class="border mt-2 mb-2"></div>
                    <!-- commentaire -->
                    <div class="bg-light p-1 rounded d-none">
                        <div class="row align-items-center">
                            <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                            <h6 class=" ml-2 text-dark"><?= $firstName.' '.$lastName; ?></h6>
                            <p class=" ml-2 text-dark"
                                style="margin-bottom: 0px; font-size: xx-small; color: #565656; ">12 juillet 2020</p>
                        </div>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Dolores commodi omnis aperiam aliquam, iusto non eius fuga rerum
                            ullam quia beatae cupiditate reiciendis officiis error necessitatibus iure.
                            Doloremque, tenetur quaerat?
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <!-- COLONE DE GAUCHE  -->
    <div id="col-left" class="bg-dark">
        <div class="user-profil">
            <div class="">
                <figure class="rounded-circle">
                    <img src="<?= $photo; ?>" alt="profile picture" class="user_img">
                <figcaption>
                        <label for="picture" title="Changer ma photo">
                            <input type="file" name="picture" id="picture" class="d-none" value="<?= $usersView->extension ?>">
                            <input type="hidden" name="picture" value="<?= $usersView->extension ?>">
                            <i class="fas fa-camera mt-2"></i>
                        </label>
                    </figcaption>
                </figure>
                <!-- </div> -->
                <a class="user-name text-center h2"
                    href="../profile/?id=<?= $usersViews->users_id; ?>"><?= $firstName.' '.$lastName; ?></a>
                <p class="h4 user-age w-100"><?= $age; ?></p>
                <?php if($_SESSION['user']['users_id'] != $_GET['id']){ ?>
                    <form method="POST" class="row justify-content-center">
                        <button type="submit" class="btn btn-success text-center mr-3" name="add_friends" value="add"><i class="fas fa-user-plus"></i></button>
                        <button type="button" class="btn btn-success text-center"><i class="fas fa-comments"></i></button>
                    </form>
                    <div class="text-danger"><?= $errors['addFriends']  ?? '' ?></div>
                <?php } ?>
            </div>
            <div class="text-dark user-infos">
                <h3 class="text-center text-uppercase title-infos">Infos</h3>
                <p>Ville : <?= $city; ?></p>
                <p>Travail : <?= $job; ?></p>
                <p>Etude : <?= $school; ?></p>
                <p>Situation : <?= $situation; ?></p>
            </div>
            <div class="text-dark friends">
                <h3 class=" text-center text-uppercase title-infos">Amis</h3>
                <div class="row">
                    <!-- <div class="col-md-10"> -->
                <?php foreach ($friendList as $friend) { ?>
                    <?php if ($friend->pending == 0) {?>
                        <a href="../profile/?id=<?=$friend->users_id_etre_amis;?>" class="text-center text-dark  col-md-5">
                        <?php if ($friend->users_pictures != NULL): ?>
                                <img class="rounded-circle" src="/uploads/pict-<?=$friend->users_id_etre_amis.'.'.$friend->users_pictures;?>" alt="profile picture" style="width:50px;">
                                fontaine Brian
                            <?php else: ?>
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mt-2" style="width:50px;height:50px;"><?= initiales($friend->users_lastname.' '.$friend->users_firstname); ?></div>
                            <?php endif; ?>
                        </a>
                    <?php }?>
                <?php } ?>
                </div>
            </div>
            <div class="text-dark friends mb-5">
                <h3 class=" text-center text-uppercase title-infos">Photo</h3>
            </div>
        </div>
    </div>
    <!-- section amis connecté -->
    <div id="col-right" class="col-lg-3">
        <h3 class="title-slide">Amis connecté</h3>
        <div class="center row">
            <img class="users-conect" src="../asset/img/<?= $photo; ?>" alt="profil-users">
            <h6 id="users-name-connect">Fontaine brian</h6>
            <div class="color-connect"></div>
        </div>
        <div class="center row">
            <img class="users-conect" src="../asset/img/<?= $photo; ?>" alt="profil-users">
            <h6 id="users-name-connect">Fontaine brian</h6>
            <div class="color-disconnect"></div>
        </div>
        <div class="center row">
            <img class="users-conect" src="../asset/img/<?= $photo; ?>" alt="profil-users">
            <h6 id="users-name-connect">Fontaine brian</h6>
            <div class="do_not_disturb"><i class="fas fa-moon"></i></div>
        </div>
    </div>
    <!-- fin de la section -->
    </div>
</main>
<?php 
    include 'footer.php';
?>
