<body id="darkmode"z>
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
                <li><a href="../friends/" class="nav-menu"><i class="fas fa-user-friends"></i></a></li>
                <li><a href="../messages/" class="nav-menu"><i class="fas fa-comments"></i></a></li>
                <li><a href="../notify/" class="nav-menu"><i class="fas fa-bell"></i></a></li>
                <li>
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <li class="text-center"> <a class="d-block" href="../connection/"><i class="fas fa-user-circle"></i>Me connecter</a></li>
                    <?php } // sinon affiche le bouton de deconnexion ?>
                </li>
                <?php if (isset($_SESSION['user'])) { ?>
                <a type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    style="background-color: white;width: 81px;border-radius: 50px;">
                    <img class="user-nav users-conect m-auto" src="<?=$photoNav;?>" alt="">
                    <i class="fas fa-chevron-down mr-3 text-dark"></i>
                </a>
                <div class="dropdown-menu m-auto bg-dark" aria-labelledby="dropdownMenu2">
                    <li class="text-center m-auto"><a class="d-block"
                            href="../profile/?id=<?= $_SESSION['user']['users_id'] ?>"><i
                                class="far fa-id-card"></i>&nbsp;Voir mon profil</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="text-center m-auto"><a class="d-block"
                            href="../modifier_mes_informations/?id=<?= $_SESSION['user']['users_id'] ?>"><i
                                class="fas fa-cogs"></i>&nbsp;modifier mes infos</a></li>
                    <div class="dropdown-divider"></div>
                    <?php // affiche le lien de connexion si la session est absente?>
                    <li class="text-center m-auto"><a class="d-block" href="../connection/?logout=true"><i
                                class="fas fa-power-off"></i>&nbsp;Se déconnecter</a></li>
                    <!-- le $_GET logout sert à déclencher la deconnexion -->
                                        <div class="dropdown-divider"></div>
                    <div class="row text-center justify-content-center">
                        <button type="button" class="btn btn-light mr-1" onclick="document.getElementById('darkmode').className='bg-light';">Light</button>
                        <button type="button" class="btn btn-dark" onclick="document.getElementById('darkmode').className='bg-dark';">Dark</button>
                    </div>
                    <?php } ?>
                </div>
            </ul>
        </nav>
    </header>