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
    <title>SpaceBrico</title>
    <link rel="icon" type="image/png" href="../asset/img/logoSpaceBrico_V2.01.png" />
    <link href="https://fonts.googleapis.com/css2?family=Niramit:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Saira+Stencil+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Srisakdi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../asset/libs/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../asset/libs/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="../asset/libs/css/all.css"> -->
    <!-- <link rel="stylesheet" href="../asset/libs/css/all.min.css"> -->
    <link rel="stylesheet" href="../asset/css/messages.css">
    <link rel="stylesheet" href="../asset/css/nav-bar.css">
    <link rel="stylesheet" href="../asset/css/setings.css">
    <link rel="stylesheet" href="../asset/css/reset.css">
    <link rel="stylesheet" media="all and (orientation:portrait)" href="../asset/css/screen.css">
    <link rel="stylesheet" href="../asset/css/profil.css">
    <link rel="stylesheet" href="../asset/css/actu.css">
</head>

<body>
    <header>
        <a id="title" class="mt-4" href="../accueil/">SpaceBrico&nbsp;<i class="fas fa-tools"></i></a>
        <!-- <a href="http://127.0.0.1"><img  class="ml-50" src="asset/img/Logo-space-brico.png" alt="" width="200px"></a> -->
        <nav>
            <ul class="mt-4 mr-4">
                <li class="nav-menu">
                    <!-- <input class="inputsearch" type="search" name="serach" id="inputsearch" style="margin-top: 27px;margin-right:0px;border-radius:25px 0px 0px 25px;"> -->
                    <div class="input-group inputSearch">
                        <input type="search" id="inputsearch" class="form-control" placeholder="Rechercher..."
                            aria-label="Search User" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="search">
                                <a href="#/" class="text-dark"><i id="i" class="fa fa-search"></i></a></span>
                        </div>
                    </div>
                </li>
                <!-- <li><a href="#" type="button" class="search" id="search"><i id="i" class="fas fa-search"></i></a></li> -->
                <li><a href="#" class="nav-menu" type="button" data-toggle="modal" data-target=".modal-sm-friends"><i
                            class="fas fa-user-friends"></i></a></li>
                <li><a href="#" class="nav-menu" type="button" data-toggle="modal" data-target=".modal-sm-message"><i
                            class="fas fa-comments"></i></a></li>
                <li><a href="#" class="nav-menu" type="button" data-toggle="modal" data-target=".modal-sm-notify"><i
                            class="fas fa-bell"></i></a></li>
                <li>
                </li>

                <a type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    style="background-color: white;width: 81px;border-radius: 50px;">
                    <img class="user-nav users-conect m-auto" src="../asset/img/" alt="">
                    <i class="fas fa-chevron-down mr-3 text-dark"></i>
                </a>
                <div class="dropdown-menu m-auto bg-dark" aria-labelledby="dropdownMenu2">
                    <li class="text-center m-auto"><a class="d-block" href="../profile/?id=8"><i
                                class="far fa-id-card"></i>&nbsp;Voir mon profil</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="text-center m-auto"><a class="d-block" href="../modifier_mes_informations/?id=8"><i
                                class="fas fa-cogs"></i>&nbsp;modifier mes infos</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="text-center m-auto"><a class="d-block" href="../connection/?logout=true"><i
                                class="fas fa-power-off"></i>&nbsp;Se déconnecter</a></li>
                    <!-- le $_GET logout sert à déclencher la deconnexion -->
                </div>
            </ul>
        </nav>
    </header><!-- friend_only_show -->
    <div class="friends_online_active d-none">
        <h6 class="ml-3 mt-2 h4">Amis connéctés</h6>
        <div class="row ml-3 mt-2">
            <img class="img_friend_active" src="../asset/img/3275434.jpg" alt="profil-users">
            <h6 class="name_friend_active ml-3 mt-3">Fontaine brian</h6>
            <div class="color-connect_active mt-3"></div>
        </div>
        <div class="row ml-3 mt-2">
            <img class="img_friend_active" src="../asset/img/3275434.jpg" alt="profil-users">
            <h6 class="name_friend_active ml-3 mt-3">Fontaine brian</h6>
            <div class="color-connect_active mt-3"></div>
        </div>
        <div class="row ml-3 mt-2">
            <img class="img_friend_active" src="../asset/img/3275434.jpg" alt="profil-users">
            <h6 class="name_friend_active ml-3 mt-3">Fontaine brian</h6>
            <div class="color-connect_active mt-3"></div>
        </div>
        <div class="row ml-3 mt-2">
            <img class="img_friend_active" src="../asset/img/3275434.jpg" alt="profil-users">
            <h6 class="name_friend_active ml-3 mt-3">Fontaine brian</h6>
            <div class="color-connect_active mt-3"></div>
        </div>
        <div class="row ml-3 mt-2">
            <img class="img_friend_active" src="../asset/img/3275434.jpg" alt="profil-users">
            <h6 class="name_friend_active ml-3 mt-3">Fontaine brian</h6>
            <div class="color-connect_active mt-3"></div>
        </div>
        <div class="row ml-3 mt-2">
            <img class="img_friend_active" src="../asset/img/3275434.jpg" alt="profil-users">
            <h6 class="name_friend_active ml-3 mt-3">Fontaine brian</h6>
            <div class="color-connect_active mt-3"></div>
        </div>
        <div class="row ml-3 mt-2">
            <img class="img_friend_active" src="../asset/img/3275434.jpg" alt="profil-users">
            <h6 class="name_friend_active ml-3 mt-3">Fontaine brian</h6>
            <div class="color-connect_active mt-3"></div>
        </div>
        <div class="row ml-3 mt-2">
            <img class="img_friend_active" src="../asset/img/3275434.jpg" alt="profil-users">
            <h6 class="name_friend_active ml-3 mt-3">Fontaine brian</h6>
            <div class="color-connect_active mt-3"></div>
        </div>
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
    </div>
    <!-- version PC -->
    <!-- =================== Bloc de publication =============================================== -->
    <div class="row d-flex justify-content-center contenue-actu">
        <form action="../accueil/" method="POST" class="col-md-10 mt-4 mb-4 rounded users_post_bg form-input">
            <div class="row">
                <img class="mt-3 ml-4 mb-2 rounded-circle img_user_actu img-fluid"
                    src="../asset/img/user-boy_default.png" alt="">
                <h6 class="mt-5 ml-2 text-white">GUILBERT GIBOT</h6>
            </div>
            <div>
                <textarea class="form-group col-md-12 rounded disabled_element" name="requied_element" id="elements"
                    cols="95" rows="3" placeholder="Elément réstant"></textarea>
            </div>
            <input type="text" class="form-control mb-2" name="post_title" placeholder="Ajouter un titre...">
            <div>
                <textarea class="form-group col-md-12 rounded post" name="post_contents" id="post" cols="95" rows="5"
                    placeholder="Exprimez-vous GUILBERT !"></textarea>
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
                        class="fas fa-camera-retro"></i>&nbsp;|&nbsp;<i class="far fa-camera-movie"></i><input
                        type="file" name="picture_movies" id="gallery-photo-add" data-preview=".preview"
                        multiple="multiple"></label>
                <button class="btn btn-light" type="submit" style="font-size: 1.2em;" name="add_post"
                    value="valider">Publier</button>
                <div class="gallery row justify-content-around"></div>
            </div>
        </form>
        <!-- ================== fin bloc publication ============================== -->
        <!-- liste des posts -->
        <div class="col-md-10 mt-4 mb-4 rounded users_post_bg ">
            <div class="row">
                <img class="mt-3 ml-4 mb-2 rounded-circle img_user_actu img-fluid" src="../asset/img/DSC0606.png"
                    alt="">
                <a href="../profile/?id=7" class="mt-5 ml-2 text-white h6">Mathieu Boé</a>
            </div>
            <div>
                <h6 class="text-white ml-3">Note général :
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </h6>
                <p class="bg-light rounded p-2"></p>
            </div>
            <div class="mt-2 bg-light rounded p-2">
                <h5></h5>
                <p>SALUT JE SUIS NOUVEAU</p>
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
            <div class="row justify-content-between pr-3 pl-3" data-ago="1599220281">
            </div>
            <div class="border mt-2 mb-n2"></div>
            <div class="row justify-content-around">
                <div class="container p-3">
                    <form action="../accueil/" method="POST">
                        <textarea cols="30" rows="1" class="form-control col-md-12 mb-1" placeholder="Commentaire..."
                            style="border-radius: 30px;" name="comment"></textarea>
                        <div class="form-group col-md-12 text-right ">
                            <div class="score text-white text-left col-md-6" style="margin-top: 1em;">
                                Note :
                                <label for="star_1_64"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="1" id="star_1_64" class="d-none">
                                <label for="star_2_64"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="2" id="star_2_64" class="d-none">
                                <label for="star_3_64"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="3" id="star_3_64" class="d-none">
                                <label for="star_4_64"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="4" id="star_4_64" class="d-none">
                                <label for="star_5_64"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="5" id="star_5_64" class="d-none">
                            </div>
                            <button class="btn btn-light" type="submit"
                                style="font-size: 1em; position: absolute; top: -6px; right: 2%;" name="add_comment"
                                value="valider">Publier</button>
                            <input type="hidden" name="post_id" value="64">
                        </div>
                    </form>
                    <div class="border mt-2 mb-2"></div>
                    <!-- ==================== Affichage des commentaires ===================================== -->
                    <details>
                        <summary>Details</summary>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=8" class=" ml-2 text-dark h6">GUILBERT GIBOT</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1599227862"></p>
                            </div>
                            <p class="ml-3">
                                Bonjour Monsieur Boé </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=8" class=" ml-2 text-dark h6">GUILBERT GIBOT</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1599228154"></p>
                            </div>
                            <p class="ml-3">
                                Bonjour Monsieur Boé </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=8" class=" ml-2 text-dark h6">GUILBERT GIBOT</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1599228399"></p>
                            </div>
                            <p class="ml-3">
                                Bonjour Monsieur Boé </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=8" class=" ml-2 text-dark h6">GUILBERT GIBOT</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1599228426"></p>
                            </div>
                            <p class="ml-3">
                                Bonjour Monsieur Boé </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=8" class=" ml-2 text-dark h6">GUILBERT GIBOT</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1599228461"></p>
                            </div>
                            <p class="ml-3">
                                Bonjour Monsieur Boé </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=8" class=" ml-2 text-dark h6">GUILBERT GIBOT</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1599228637"></p>
                            </div>
                            <p class="ml-3">
                                Bonjour Monsieur Boé </p>
                        </div>
                    </details>
                    <!-- ================= fin d'affichage des commentaire ========================================== -->
                    <!-- ================= Uniquement quand l'utilisateur n'est pas connecter ======================= -->
                </div>
                <!-- ===================== fin du block commentaire ================================================= -->
            </div>
        </div>
        <div class="col-md-10 mt-4 mb-4 rounded users_post_bg ">
            <div class="row">
                <img class="mt-3 ml-4 mb-2 rounded-circle img_user_actu img-fluid"
                    src="../asset/img/Logo-space-brico.png" alt="">
                <a href="../profile/?id=2" class="mt-5 ml-2 text-white h6">jean dupond</a>
            </div>
            <div>
                <h6 class="text-white ml-3">Note général :
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </h6>
                <p class="bg-light rounded p-2"></p>
            </div>
            <div class="mt-2 bg-light rounded p-2">
                <h5>Réalisation d'un bureau Empire acajou massif pour un président...</h5>
                <p>Tout commence dans notre atelier,
                    l'ébauche du bureau déterminée par le désir et le choix de notre client.

                    Le style Empire sied bien au statut de président:
                    lignes et décorations qui imposent, sans être ostentatoires.

                    Mais l'histoire prend ses racines au Havre,
                    port où sont acheminées les grumes de bois.
                    Certaines essences comme cet acajou finissent leur course non loin,
                    ainsi Christian les a choisit chez "Bosquer Bois" la scierie près de Honfleur
                    où il se fournit.
                    D'autres continuent leur route jusqu'à Paris pour être débitées en placage...

                    L'adresse est une place prestigieuse édifiée en 1815.
                    Elle fût et reste une place très vivante avec ses galeries
                    et ses passages.
                    D'illustres épiceries fines y ont leurs devantures.
                    Et je n'oublie pas l'église qui trône en son centre.
                    La musique, les concerts y tiennent leur place.
                    (sans vouloir faire un jeu de mot facile)

                    En octobre 1849, les funérailles de Chopin furent célébrées
                    dans cette église aux sons de sa "Marche funèbre".
                    La Maison de la Truffe, depuis 1932 y sévit
                    avec son champignon de renommée internationale.

                    Vous avez deviné de quelle place il s'agit?
                    Sinon, un dernier indice: pleurer comme une...

                    Début prometteur pour ce bureau Empire...et son propriétaire.


                    Je peux vous raconter une autre histoire de bureau.
                    Si cela vous tente, cliquez sur l'image.</p>
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
            <div class="row justify-content-between pr-3 pl-3" data-ago="1598980697">
            </div>
            <div class="border mt-2 mb-n2"></div>
            <div class="row justify-content-around">
                <div class="container p-3">
                    <form action="../accueil/" method="POST">
                        <textarea cols="30" rows="1" class="form-control col-md-12 mb-1" placeholder="Commentaire..."
                            style="border-radius: 30px;" name="comment"></textarea>
                        <div class="form-group col-md-12 text-right ">
                            <div class="score text-white text-left col-md-6" style="margin-top: 1em;">
                                Note :
                                <label for="star_1_63"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="1" id="star_1_63" class="d-none">
                                <label for="star_2_63"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="2" id="star_2_63" class="d-none">
                                <label for="star_3_63"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="3" id="star_3_63" class="d-none">
                                <label for="star_4_63"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="4" id="star_4_63" class="d-none">
                                <label for="star_5_63"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="5" id="star_5_63" class="d-none">
                            </div>
                            <button class="btn btn-light" type="submit"
                                style="font-size: 1em; position: absolute; top: -6px; right: 2%;" name="add_comment"
                                value="valider">Publier</button>
                            <input type="hidden" name="post_id" value="63">
                        </div>
                    </form>
                    <div class="border mt-2 mb-2"></div>
                    <!-- ==================== Affichage des commentaires ===================================== -->
                    <details>
                        <summary>Details</summary>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/Logo-space-brico.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=2" class=" ml-2 text-dark h6">jean dupond</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598980785"></p>
                            </div>
                            <p class="ml-3">
                                WHA Génial j'adore ce bureau de président </p>
                        </div>
                    </details>
                    <!-- ================= fin d'affichage des commentaire ========================================== -->
                    <!-- ================= Uniquement quand l'utilisateur n'est pas connecter ======================= -->
                </div>
                <!-- ===================== fin du block commentaire ================================================= -->
            </div>
        </div>
        <div class="col-md-10 mt-4 mb-4 rounded users_post_bg ">
            <div class="row">
                <img class="mt-3 ml-4 mb-2 rounded-circle img_user_actu img-fluid"
                    src="../asset/img/Logo-space-brico.png" alt="">
                <a href="../profile/?id=2" class="mt-5 ml-2 text-white h6">jean dupond</a>
            </div>
            <div>
                <h6 class="text-white ml-3">Note général :
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </h6>
                <p class="bg-light rounded p-2"></p>
            </div>
            <div class="mt-2 bg-light rounded p-2">
                <h5>Ceci est un meuble en plexi</h5>
                <p>Bonjour a tous</p>
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
            <div class="row justify-content-between pr-3 pl-3" data-ago="1598903154">
            </div>
            <div class="border mt-2 mb-n2"></div>
            <div class="row justify-content-around">
                <div class="container p-3">
                    <form action="../accueil/" method="POST">
                        <textarea cols="30" rows="1" class="form-control col-md-12 mb-1" placeholder="Commentaire..."
                            style="border-radius: 30px;" name="comment"></textarea>
                        <div class="form-group col-md-12 text-right ">
                            <div class="score text-white text-left col-md-6" style="margin-top: 1em;">
                                Note :
                                <label for="star_1_62"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="1" id="star_1_62" class="d-none">
                                <label for="star_2_62"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="2" id="star_2_62" class="d-none">
                                <label for="star_3_62"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="3" id="star_3_62" class="d-none">
                                <label for="star_4_62"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="4" id="star_4_62" class="d-none">
                                <label for="star_5_62"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="5" id="star_5_62" class="d-none">
                            </div>
                            <button class="btn btn-light" type="submit"
                                style="font-size: 1em; position: absolute; top: -6px; right: 2%;" name="add_comment"
                                value="valider">Publier</button>
                            <input type="hidden" name="post_id" value="62">
                        </div>
                    </form>
                    <div class="border mt-2 mb-2"></div>
                    <!-- ==================== Affichage des commentaires ===================================== -->
                    <details>
                        <summary>Details</summary>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=1" class=" ml-2 text-dark h6">Fontaine Brian</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598945894"></p>
                            </div>
                            <p class="ml-3">
                                c'est mo brian </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/Logo-space-brico.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=2" class=" ml-2 text-dark h6">jean dupond</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598947929"></p>
                            </div>
                            <p class="ml-3">
                                jolie meuble en plexi </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=1" class=" ml-2 text-dark h6">Fontaine Brian</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598958471"></p>
                            </div>
                            <p class="ml-3">
                                jolie meuble en plexi merci pour ce tuto </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/apple-touch-icon.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=5" class=" ml-2 text-dark h6">Fontaine MICHEL</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598958911"></p>
                            </div>
                            <p class="ml-3">
                                Wha superbe ce meuble en plexi j'adore </p>
                        </div>
                    </details>
                    <!-- ================= fin d'affichage des commentaire ========================================== -->
                    <!-- ================= Uniquement quand l'utilisateur n'est pas connecter ======================= -->
                </div>
                <!-- ===================== fin du block commentaire ================================================= -->
            </div>
        </div>
        <div class="col-md-10 mt-4 mb-4 rounded users_post_bg ">
            <div class="row">
                <img class="mt-3 ml-4 mb-2 rounded-circle img_user_actu img-fluid"
                    src="../asset/img/user-boy_default.png" alt="">
                <a href="../profile/?id=1" class="mt-5 ml-2 text-white h6">Fontaine Brian</a>
            </div>
            <div>
                <h6 class="text-white ml-3">Note général :
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </h6>
                <p class="bg-light rounded p-2"></p>
            </div>
            <div class="mt-2 bg-light rounded p-2">
                <h5></h5>
                <p>bonjour</p>
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
            <div class="row justify-content-between pr-3 pl-3" data-ago="1598887735">
            </div>
            <div class="border mt-2 mb-n2"></div>
            <div class="row justify-content-around">
                <div class="container p-3">
                    <form action="../accueil/" method="POST">
                        <textarea cols="30" rows="1" class="form-control col-md-12 mb-1" placeholder="Commentaire..."
                            style="border-radius: 30px;" name="comment"></textarea>
                        <div class="form-group col-md-12 text-right ">
                            <div class="score text-white text-left col-md-6" style="margin-top: 1em;">
                                Note :
                                <label for="star_1_61"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="1" id="star_1_61" class="d-none">
                                <label for="star_2_61"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="2" id="star_2_61" class="d-none">
                                <label for="star_3_61"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="3" id="star_3_61" class="d-none">
                                <label for="star_4_61"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="4" id="star_4_61" class="d-none">
                                <label for="star_5_61"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="5" id="star_5_61" class="d-none">
                            </div>
                            <button class="btn btn-light" type="submit"
                                style="font-size: 1em; position: absolute; top: -6px; right: 2%;" name="add_comment"
                                value="valider">Publier</button>
                            <input type="hidden" name="post_id" value="61">
                        </div>
                    </form>
                    <div class="border mt-2 mb-2"></div>
                    <!-- ==================== Affichage des commentaires ===================================== -->
                    <details>
                        <summary>Details</summary>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=1" class=" ml-2 text-dark h6">Fontaine Brian</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598888892"></p>
                            </div>
                            <p class="ml-3">
                                oui </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/apple-touch-icon.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=5" class=" ml-2 text-dark h6">Fontaine MICHEL</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598971019"></p>
                            </div>
                            <p class="ml-3">
                                bonjour </p>
                        </div>
                    </details>
                    <!-- ================= fin d'affichage des commentaire ========================================== -->
                    <!-- ================= Uniquement quand l'utilisateur n'est pas connecter ======================= -->
                </div>
                <!-- ===================== fin du block commentaire ================================================= -->
            </div>
        </div>
        <div class="col-md-10 mt-4 mb-4 rounded users_post_bg ">
            <div class="row">
                <img class="mt-3 ml-4 mb-2 rounded-circle img_user_actu img-fluid"
                    src="../asset/img/user-boy_default.png" alt="">
                <a href="../profile/?id=1" class="mt-5 ml-2 text-white h6">Fontaine Brian</a>
            </div>
            <div>
                <h6 class="text-white ml-3">Note général :
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </h6>
                <p class="bg-light rounded p-2"></p>
            </div>
            <div class="mt-2 bg-light rounded p-2">
                <h5></h5>
                <p>ceci est une table en bois</p>
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
            <div class="row justify-content-between pr-3 pl-3" data-ago="1598879894">
            </div>
            <div class="border mt-2 mb-n2"></div>
            <div class="row justify-content-around">
                <div class="container p-3">
                    <form action="../accueil/" method="POST">
                        <textarea cols="30" rows="1" class="form-control col-md-12 mb-1" placeholder="Commentaire..."
                            style="border-radius: 30px;" name="comment"></textarea>
                        <div class="form-group col-md-12 text-right ">
                            <div class="score text-white text-left col-md-6" style="margin-top: 1em;">
                                Note :
                                <label for="star_1_57"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="1" id="star_1_57" class="d-none">
                                <label for="star_2_57"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="2" id="star_2_57" class="d-none">
                                <label for="star_3_57"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="3" id="star_3_57" class="d-none">
                                <label for="star_4_57"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="4" id="star_4_57" class="d-none">
                                <label for="star_5_57"><i class="far fa-star"></i></label>
                                <input type="radio" name="note" value="5" id="star_5_57" class="d-none">
                            </div>
                            <button class="btn btn-light" type="submit"
                                style="font-size: 1em; position: absolute; top: -6px; right: 2%;" name="add_comment"
                                value="valider">Publier</button>
                            <input type="hidden" name="post_id" value="57">
                        </div>
                    </form>
                    <div class="border mt-2 mb-2"></div>
                    <!-- ==================== Affichage des commentaires ===================================== -->
                    <details>
                        <summary>Details</summary>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=1" class=" ml-2 text-dark h6">Fontaine Brian</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598881960"></p>
                            </div>
                            <p class="ml-3">
                                Trés belle table en bois </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=1" class=" ml-2 text-dark h6">Fontaine Brian</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598882021"></p>
                            </div>
                            <p class="ml-3">
                                oui super cet table en bois </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/user-boy_default.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=1" class=" ml-2 text-dark h6">Fontaine Brian</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598887677"></p>
                            </div>
                            <p class="ml-3">
                                super </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/Logo-space-brico.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=2" class=" ml-2 text-dark h6">jean dupond</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598947811"></p>
                            </div>
                            <p class="ml-3">
                                super table en bois </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/apple-touch-icon.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=5" class=" ml-2 text-dark h6">Fontaine MICHEL</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598970141"></p>
                            </div>
                            <p class="ml-3">
                                super </p>
                        </div>
                        <div class="bg-light p-1 rounded  comment-list mb-2">
                            <div class="row align-items-center">
                                <img class="ml-3" src="../asset/img/Logo-space-brico.png" alt=""
                                    style="width: 50px;border-radius: 50%; margin-bottom: 4px;">
                                <a href="../profile/?id=2" class=" ml-2 text-dark h6">jean dupond</a>
                                <p class=" ml-2 text-dark"
                                    style="margin-bottom: 0px; font-size: xx-small; color: #565656; "
                                    data-ago="1598980515"></p>
                            </div>
                            <p class="ml-3">
                                Ce tuto est génial </p>
                        </div>
                    </details>
                    <!-- ================= fin d'affichage des commentaire ========================================== -->
                    <!-- ================= Uniquement quand l'utilisateur n'est pas connecter ======================= -->
                </div>
                <!-- ===================== fin du block commentaire ================================================= -->
            </div>
        </div>
    </div>
    <footer class="row text-center">
        <a class="m-auto p-2" href="../mentions_légales/">Mentions Légales</a>
        <a class="m-auto p-2" href="../Condition_générales_d'utilisateurs/">Conditions générales d'utilisation</a>
        <a class="m-auto p-2" href="../contact/">Contactez-nous</a>
        <a class="m-auto p-2" href="../modifier_mes_informations/">Modifier mes information</a>
        <a class="m-auto p-2" href="https://brianfontaine.github.io/CV-Brian-D-veloppeurjunior/">&copy; SpaceBrico -
            2020</a>
    </footer>
</div>
    <div class="col-md-12 row bg-dark nav-bar-footer m-auto justify-content-around align-items-center">
        <div id="people" class="m-auto text-white">
            <i id="open" class="fas fa-users"></i>
        </div>
        <div id="people_close" class="m-auto text-white d-none">
            <i class="fas fa-times"></i>
        </div>
        <a href="../messagerie/" class="m-auto"><i class="fas fa-comments"></i></a>
        <a href="../accueil/" class="m-auto"><i class="fas fa-home"></i></a>
        <a href="" class="m-auto"><i class="fas fa-bell"></i></a>
        <a href="" class="m-auto"><i class="fas fa-ellipsis-h"></i></a>
        <script src="../asset/libs/js/jquery.js"></script>
        <script src="../asset/libs/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous">
        </script>
        <script src="../asset/js/script.js"></script>
        <script src="../asset/js/actus_script.js"></script>
        <script src="../asset/js/timer_ago.js"></script>
    </div>
</body>

</html>