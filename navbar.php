<?php
    $photo = $_COOKIE['picture'] ?? 'user-boy_default.png';
?>
<header>
    <a id="title" href="http://www.spacebrico.fr/Actualité">SpaceBrico&nbsp;<i class="fas fa-tools"></i></a>
    <!-- <a href="http://127.0.0.1"><img  class="ml-50" src="asset/img/Logo-space-brico.png" alt="" width="200px"></a> -->
    <button class="menu_nav_button btn btn-link" ><i class="fas fa-bars"></i></button>
    <nav>
        <ul>
        <?php if (isset($_SESSION['user'])) { ?>
            <li class="pn-5"><a href="profil.php"><img class="user-nav users-conect" src="asset/img/<?=$photo;?>" alt=""><?= $lastname='Brian'; ?></a></li>
        <?php } ?>
            <li><input class="inputsearch" type="search" name="serach" id="inputsearch" style="margin-top: 27px;margin-right:0px;border-radius:25px 0px 0px 25px;"></li>
            <li><a href="#" type="button" class="search" id="search"><i id="i" class="fas fa-search"></i></a></li>
            <li><a href="" type="button" class="" data-toggle="modal" data-target=".modal-sm-friends"><i class="fas fa-user-friends"></i></a></li>
            <li><a href="" type="button" class="" data-toggle="modal" data-target=".modal-sm-message"><i class="fas fa-comments"></i></a></li>
            <li><a href="" type="button" class="" data-toggle="modal" data-target=".modal-sm-notify"><i class="fas fa-bell"></i></a></li>
            <div class="dropdown">
                <a  type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-plus"></i>
                </a>
                <div class="dropdown-menu m-auto bg-dark" aria-labelledby="dropdownMenu2">
                    <li class="text-center"><a href="reglage.php"><i class="fas fa-cogs"></i>&nbsp;Paramétre</a></li>
                    <div class="dropdown-divider"></div>
                <?php // affiche le lien de connexion si la session est absente 
                    if (!isset($_SESSION['user'])) { ?>
                        <li class="text-center"> <a href="login.php"><i class="fas fa-user-circle"></i>Me connecter</a></li>
                    <?php } // sinon affiche le bouton de deconnexion 
                    else { ?>
                        <li class="text-center"><a href="login.php?logout=true"><i class="fas fa-power-off"></i>&nbsp;Se déconnecter</a></li>
                    <!-- le $_GET logout sert à déclencher la deconnexion -->
                <?php } ?>
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
                <a class="h4 p-2 text-center d-flex justify-content-center" href="notify.php" style="margin-top: 0px;margin-right: 0px;margin-bottom: 0px;padding-left: 0px;">Notifications</a>
            </div>
        </div>
    </div>
    <div class="modal fade modal-sm-message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalmessage"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" id="message" style="margin-top: 89px; left: 360px;">
                <a class="h4 p-2 text-center d-flex justify-content-center" href="message.php" style="margin-top: 0px;margin-right: 0px;margin-bottom: 0px;padding-left: 0px;">Messages</a>
            </div>
        </div>
    </div>
    <div class="modal fade modal-sm-friends" tabindex="-1" role="dialog" aria-labelledby="mySmallModalFriends"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" id="friends" style="margin-top: 89px; left: 320px;">
                <a class="h4 p-2 text-center d-flex justify-content-center" href="addFriends.php" style="margin-top: 0px;margin-right: 0px;margin-bottom: 0px;padding-left: 0px;">Demande d'amis</a>
            </div>
        </div>
    </div>