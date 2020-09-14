<!-- friend_only_show -->
<div class="friends_online_active d-none">
    <?php if (isset($_SESSION['user'])) {?>
    <h6 class="ml-3 mt-2 h4">Amis connéctés</h6>
    <?php for ($i = 0; $i < 8; $i++) {?>
    <div class="row ml-3 mt-2">
        <img class="img_friend_active" src="../asset/img/3275434.jpg" alt="profil-users">
        <h6 class="name_friend_active ml-3 mt-3">Fontaine brian</h6>
        <div class="color-connect_active mt-3"></div>
    </div>
    <?php }?>
</div>
<!-- version Mobile  -->
<div id="col-right" class="col-lg-3 ">
    <h3 class="title-slide">Amis connectés</h3>
    <div class="center row">
        <img class="users-conect" src="../asset/img/3275434.jpg" alt="profil-users">
        <h6 class="users-name-connect">Fontaine brian</h6>
        <div class="color-connect"></div>
    </div>
    <div class="center row">
        <img class="users-conect" src="../asset/img/3275434.jpg" alt="profil-users">
        <h6 class="users-name-connect">Fontaine brian</h6>
        <div class="color-disconnect"></div>
    </div>
    <div class="center row">
        <img class="users-conect" src="../asset/img/3275434.jpg" alt="profil-users">
        <h6 class="users-name-connect">Fontaine brian</h6>
        <div class="do_not_disturb"><i class="fas fa-moon"></i></div>
    </div>
    <?php } else {?>
    <h1 class="text-center">Veuillez vous connecter pour voir vos amis en lignes</h1>
    <?php }?>
</div>
<!-- version PC -->

<!-- =================== Bloc de publication =============================================== -->
<div class="row d-flex justify-content-center contenue-actu">
<?php 
    // var_dump($_POST['element']);
?>
    <?php if (isset($_SESSION['user'])) {?>
    <form action="../accueil/" method="POST" class="col-md-10 mt-4 mb-4 rounded users_post_bg form-input" >
        <div class="row">
            <img class="mt-3 ml-4 mb-2 rounded-circle img_user_actu img-fluid" src="<?=$photo;?>"
                alt="">
            <h6 class="mt-5 ml-2 text-white"><?=$firstName . ' ' . $lastName;?></h6>
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
        <input type="text" class="form-control mb-2" name="post_title" placeholder="Ajouter un titre...">
        <div id="form">
            <textarea class="form-group col-md-12 rounded post" name="post_contents" id="post" cols="95" rows="5"
                placeholder="Exprimez-vous <?=$firstName;?> !"></textarea>
        </div>
        <div class="row">
            <div class="preview mt-2 ml-2 d-none"></div>
            <div class="preview mt-2 ml-2 d-none"></div>
            <div class="preview mt-2 ml-2 d-none"></div>
            <div class="preview mt-2 ml-2 d-none"></div>
        </div>
        <div class="form-group col-md-12 text-right disabled_movie" id="form_btn">
            <button id="vide" class="btn btn-light remove" type="button" style="font-size: 1.2em;"><i class="fas fa-times-circle"></i></button>
            <label class="btn btn-light my-2" for="gallery-photo-add" style="font-size: 1.2em;"><i class="fas fa-camera-retro"></i><input type="file" name="picture_movies" id="gallery-photo-add" data-preview=".preview" multiple="multiple"></label>
            <button class="btn btn-light" type="submit" style="font-size: 1.2em;" name="add_post" value="valider">Publier</button>
            <div class="gallery row justify-content-around"></div>
        </div>
    </form>
    <?php }?>
    <!-- ================== fin bloc publication ============================== -->
    <!-- liste des posts -->
    <?php if (count($listPost) > 0):
    foreach ($listPost as $post) { ?>
    <div class="col-md-10 mt-4 mb-4 rounded users_post_bg ">
        <div class="row">
            <img class="mt-3 ml-4 mb-2 rounded-circle img_user_actu img-fluid"
                src="/uploads/pict-<?= $post->users_id.'.'.$post->users_pictures;?>" alt="">
            <a href="../profile/?id=<?=$post->users_id;?>"
                class="mt-5 ml-2 text-white h6"><?=$post->users_firstname . ' ' . $post->users_lastname;?></a>
        </div>
        <div>
            <h6 class="text-white ml-3" data-note="<?= empty($post->note_generale) ? 0 : $post->note_generale; ?>">Note général :
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
            <p><?=$post->post_content;?></p>
            <!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 img_actu" src="../asset/img/user_id_1/banc-final-val.jpg"
                            alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 img_actu" src="../asset/img/user_id_1/buffet-en-bois-de-palette.jpg"
                            alt="Second slide">
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
        <!-- ================ section date du post et ajouter une note ======================================= -->
        <div class="row mt-2" >
            <div class="ml-3 mr-5 col-md-5" data-ago="<?=$post->post_date?>"></div>            
            <div class="score text-white text-left col-md-5 ml-5" >
                <form action="" method="POST" style="margin-left: 34px;">
                    Note :
                    <label for="<?='star_1_'.$post->post_id;?>"><i class="far fa-star"></i></label>
                    <input type="radio" name="note" value="1" id="<?='star_1_'.$post->post_id;?>" class="d-none">
                    <label for="<?='star_2_'.$post->post_id;?>"><i class="far fa-star"></i></label>
                    <input type="radio" name="note" value="2" id="<?='star_2_'.$post->post_id;?>" class="d-none">
                    <label for="<?='star_3_'.$post->post_id;?>"><i class="far fa-star"></i></label>
                    <input type="radio" name="note" value="3" id="<?='star_3_'.$post->post_id;?>" class="d-none">
                    <label for="<?='star_4_'.$post->post_id;?>"><i class="far fa-star"></i></label>
                    <input type="radio" name="note" value="4" id="<?='star_4_'.$post->post_id;?>" class="d-none">
                    <label for="<?='star_5_'.$post->post_id;?>"><i class="far fa-star"></i></label>
                    <input type="radio" name="note" value="5" id="<?='star_5_'.$post->post_id;?>" class="d-none">
                    <!-- ============== input hidden ======================================================== -->
                    <input type="hidden" name="post_id" value="<?=$post->post_id;?>">
                    <!-- ============== input hidden ======================================================== -->
                    <input class="btn btn-light ml-3" type="submit" value="Noter" name="add-ratings">
                </form>
            </div>
        </div>
        <!-- ============ Fin section date du post et ajouter une note ======================================= -->
        <div class="border mt-1 mb-n2"></div>
        <div class="row justify-content-around">
            <div class="container p-3">
            <!-- ================= Ajouter un commentaire ================================================== -->
                <form action="../accueil/" method="POST">
                    <?php if(isset($createCommentSuccess)) { ?>
                        <div class="alert alert-success">Votre Commentaire è bien été enrigistrer </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {?>
                    <textarea cols="30" rows="1" class="form-control col-md-10 mb-1" placeholder="Commentaire..." style="border-radius: 30px;" name="comment"></textarea>
                    <div class="form-group col-md-12 text-right ">
                        <button class="btn btn-light mr-1" type="submit"
                            style="font-size: 1em; position: absolute; bottom: 6px; left: 85%;" name="add_comment"
                            value="valider">Commenter</button>
                        <input type="hidden" name="post_id" value="<?=$post->post_id?>">
                    </div>
                </form>
                <!-- ==================== Fin de section Ajouter un Commentaire ========================== -->
                <div class="border mt-2 mb-2"></div>
                <!-- ==================== Affichage des commentaires ===================================== -->
                <details>
                    <summary>Details</summary>
                    <?php foreach ($listComment as $comment): ?>
                    <?php if ($comment->post_id == $post->post_id): ?>
                    <div class="bg-light p-1 rounded  comment-list mb-2">
                        <div class="row align-items-center">
                            <img class="ml-3" src="../asset/img/<?=$comment->users_pictures;?>.png" alt="" style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                            <a href="../profile/?id=<?=$comment->users_id; ?>" class=" ml-2 text-dark h6"><?=$comment->users_firstname . ' ' . $comment->users_lastname;?></a>
                            <p class=" ml-2 text-dark" style="margin-bottom: 0px; font-size: xx-small; color: #565656; " data-ago="<?=$comment->comment_date?>"></p>
                        </div>
                        <p class="ml-3">
                            <?=$comment->comment_content?>
                        </p>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </details>
                <!-- ================= fin d'affichage des commentaire ========================================== -->
                <!-- ================= Uniquement quand l'utilisateur n'est pas connecter ======================= -->
                <?php } else {?>
                <a class="text-center h5" href="../connection/">Veuillez Vous Connecter pour commenter ce poste</a>
                <?php }?>
            </div>
            <!-- ===================== fin du block commentaire ================================================= -->
        </div>
    </div>
    <?php } endif;?>
</div>
<?php
include 'footer.php';
?>