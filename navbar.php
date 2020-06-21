<?php 
    $photo = $_COOKIE['picture'] ?? 'user-boy_default.png';
?>
<header>
    <a id="title" href="actu.php">SpaceBrico&nbsp;<i class="fas fa-tools"></i></a>
    <!-- <a href="http://127.0.0.1"><img  class="ml-50" src="asset/img/Logo-space-brico.png" alt="" width="200px"></a> -->
    <nav>
        <ul>
            <li><a href="profil.php"><img class="user-nav users-conect" src="asset/img/<?= $photo; ?>" alt=""></a></li>
            <li><input class="inputsearch" type="search" name="serach" id="inputsearch" style="margin-top: 27px;margin-right:0px;border-radius:25px 0px 0px 25px;"></li>
            <li><a href="#" type="button" class="search" id="search"><i id="i" class="fas fa-search"></i></a></li>
            <li><a href="" type="button" class="" data-toggle="modal" data-target=".modal-sm-friends"><i class="fas fa-user-friends"></i></a></li>
            <li><a href="" type="button" class="" data-toggle="modal" data-target=".modal-sm-message"><i class="fas fa-comments"></i></a></li>
            <li><a href="" type="button" class="" data-toggle="modal" data-target=".modal-sm-notify"><i
                        class="fas fa-bell"></i></a></li>
            <li><a href="reglage.php"><i class="fas fa-cogs"></i></a></li>
        </ul>
    </nav>
</header>

<body>
    <div class="modal fade modal-sm-notify" tabindex="-1" role="dialog" aria-labelledby="mySmallModalNotify"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="margin-top: 89px; left: 480px;">
                <a href="notify.php">Notification</a>
            </div>
        </div>
    </div>
    <div class="modal fade modal-sm-message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalmessage"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="margin-top: 89px; left: 416px;">
                <a href="message.php">Message</a>
            </div>
        </div>
    </div>
    <div class="modal fade modal-sm-friends" tabindex="-1" role="dialog" aria-labelledby="mySmallModalFriends"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="margin-top: 89px; left: 368px;">
                <a href="addFriends.php">Demande d'amis</a>
            </div>
        </div>
    </div>