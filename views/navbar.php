<?php
    $photo = $_COOKIE['picture'] ?? 'user-boy_default.png';
?>
<header>
    <a id="title" class="mt-4" href="../accueil/">SpaceBrico&nbsp;<i class="fas fa-tools"></i></a>
    <!-- <a href="http://127.0.0.1"><img  class="ml-50" src="asset/img/Logo-space-brico.png" alt="" width="200px"></a> -->
    <button class="menu_nav_button btn btn-link"><i class="fas fa-bars"></i></button>
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
            <li><a href="" class="nav-menu" type="button" data-toggle="modal" data-target=".modal-sm-friends"><i
                        class="fas fa-user-friends"></i></a></li>
            <li><a href="" class="nav-menu" type="button" data-toggle="modal" data-target=".modal-sm-message"><i
                        class="fas fa-comments"></i></a></li>
            <li><a href="" class="nav-menu" type="button" data-toggle="modal" data-target=".modal-sm-notify"><i
                        class="fas fa-bell"></i></a></li>
            <li>
                <?php if (!isset($_SESSION['user'])) { ?>
            <li class="text-center"> <a class="d-block" href="../connection/"><i class="fas fa-user-circle"></i>Me connecter</a></li>
            <?php } // sinon affiche le bouton de deconnexion ?>
            </li>

            <?php if (isset($_SESSION['user'])) { ?>
            <a type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: white;width: 81px;border-radius: 50px;">
                <img class="user-nav users-conect m-auto" src="../asset/img/<?=$photo;?>" alt="">
                <i class="fas fa-chevron-down mr-3 text-dark"></i>
            </a>
                <div class="dropdown-menu m-auto bg-dark" aria-labelledby="dropdownMenu2">
                <li class="text-center m-auto"><a class="d-block" href="../profile/"><i class="far fa-id-card"></i>&nbsp;Voir mon profil</a></li>
                <div class="dropdown-divider"></div>
                <li class="text-center m-auto"><a class="d-block" href="../modifier_mes_informations/"><i class="fas fa-cogs"></i>&nbsp;modifier mes infos</a></li>
                <div class="dropdown-divider"></div>
                <?php // affiche le lien de connexion si la session est absente?>
                <li class="text-center m-auto"><a class="d-block" href="../connection/?logout=true"><i class="fas fa-power-off"></i>&nbsp;Se déconnecter</a></li>
                <!-- le $_GET logout sert à déclencher la deconnexion -->
                <?php } ?>
            </div>
            </div>
            </div>
        </ul>
    </nav>
</header>

<body>
    <div class="modal fade modal-sm-notify" tabindex="-1" role="dialog" aria-labelledby="mySmallModalNotify"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" id="notify" style="margin-top: 89px; left: 400px;">
                <a class="h4 p-2 text-center d-flex justify-content-center" href="notify_ctrl.php"
                    style="margin-top: 0px;margin-right: 0px;margin-bottom: 0px;padding-left: 0px;">Notifications</a>
            </div>
        </div>
    </div>
    <div class="modal fade modal-sm-message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalmessage"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" id="message" style="margin-top: 89px; left: 360px;">
                <a class="h4 p-2 text-center d-flex justify-content-center" href="message_ctrl.php"
                    style="margin-top: 0px;margin-right: 0px;margin-bottom: 0px;padding-left: 0px;">Messages</a>
            </div>
        </div>
    </div>
    <div class="modal fade modal-sm-friends" tabindex="-1" role="dialog" aria-labelledby="mySmallModalFriends"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" id="friends" style="margin-top: 89px; left: 320px;">
                <a class="h4 p-2 text-center d-flex justify-content-center" href="addFriends_ctrl.php"
                    style="margin-top: 0px;margin-right: 0px;margin-bottom: 0px;padding-left: 0px;">Demande d'amis</a>
            </div>
        </div>
    </div>