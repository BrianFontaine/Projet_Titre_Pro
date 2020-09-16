<main>
        <div id="containt" class="row d-flex justify-content-center text-white">
            <div id="setings">
            <h1 class="text-white">Réglages</h1><img class="users-setings-img" src="<?= $photo; ?>" alt="">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <h3 class="mt-2">Profil :</h3>
                    </div>
                    <div class="row">
                        <label class="ml-2" for="civility">Civilité :</label>
                        <!-- <input class="ml-2 form-control users-setings" type="text" id="civility" name="civility" value="<?= $civility;?>"> -->
                        <select class="ml-2 form-control users-setings" name="civility" id="civility">
                            <option value="1">Homme </option>
                            <option value="2">Femme </option>
                        </select>
                        <div class="text-danger col-md-12"><?= $errors['gender'] ?? '' ?></div>
                        <label class="ml-2" for="name">Nom :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="name" name="firstname" value="<?= $name;?>">
                        <div class="text-danger col-md-12 col-md-12"><?= $errors['firstname'] ?? '' ?></div>
                        <label class="ml-2" for="lastName">Prénom :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="lastName" name="lastname" value="<?= $lastName;?>">
                        <div class="text-danger col-md-12"><?= $errors['lasntame'] ?? '' ?></div>
                        <label class="ml-2" for="lbirthDays">Date de Naissance :</label>
                        <input class="ml-2 form-control users-setings" type="date" id="birthDays" name="birthdate" value="<?= $birthDays;?>">
                        <div class="text-danger col-md-12"><?= $errors['birthdate'] ?? '' ?></div>
                        <label class="ml-2" for="situation">Situation Marital :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="situation" name="situation" value="<?= $situation;?>">
                        <div class="text-danger col-md-12"><?= $errors['status'] ?? '' ?></div>
                    </div>
                    <div class="row">
                        <h3 class="mt-2">Information Personnel :</h3>
                    </div>
                    <div class="row mt-3">
                            <label class="ml-2">Votre ville : </label>
                            <input class="ml-2 form-control users-setings <?=$isSubmitted && ($errors['cities']) ? 'is-invalid' : '' ?>" type="search" name="search_cities" id="search" placeholder="Rechercher votre ville..." value="<?= $city;?>">
                            <!-- ============================= INPUT HIDDEN ================= -->
                            <input type="hidden" name="cities" id="cities">
                            <!-- ============================================================ -->
                            <div id="result" style="position:absolute;left:0;right:0;"></div>
                            <div class="invalid-feedback"><?= $errors['cities'] ?? '' ?></div>
                        <label class="ml-2" for="phone">Numéro de téléphone :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="phone" name="phone" value="<?= $phone;?>">
                        <div class="text-danger col-md-12"><?= $errors['phone'] ?? '' ?></div>
                        <label class="ml-2" for="job">Métier :</label>
                        <input class="ml-2 form-control users-setings" type="tex" id="job" name="job" value="<?= $job;?>">
                        <div class="text-danger col-md-12"><?= $errors['job'] ?? '' ?></div>
                        <label class="ml-2" for="company">Entreprise ou école :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="company" name="company" value="<?= $company;?>">
                        <div class="text-danger col-md-12"><?= $errors['school'] ?? '' ?></div>
                    </div>
                    <div class="row">
                        <h3 class="mt-2">Information de connexion :</h3>
                    </div>
                    <div class="row mt-3">
                    <label class="ml-2" for="lastPasword">Ancien mot de passe :</label>
                        <input class="ml-2 form-control users-setings" type="password" id="lastPasword" name="lastPasword" value="<?= $lastPasword;?>">
                        <div class="text-danger col-md-12"><?= $errors['lpass'] ?? '' ?></div>
                        <label class="ml-2" for="pasword">Mot de passe :</label>
                        <input class="ml-2 form-control users-setings" type="password" id="password" name="password" placeholder="<?= $password;?>">
                        <div class="text-danger col-md-12"><?= $errors['pass'] ?? '' ?></div>
                        <label class="ml-2" for="cPassword">Confirmation mot de passe :</label>
                        <input class="ml-2 form-control users-setings" type="password" id="cPassword" name="cPassword" placeholder="<?= $confirPassword;?>">
                        <div class="text-danger col-md-12"><?= $errors['cpass'] ?? '' ?></div>
                    </div>
                    <div class="row mt-3">
                        <label class="ml-2" for="email">Adresse email:</label>
                        <input class="ml-2 form-control users-setings" type="email" id="email" name="email" value="<?= $email;?>">
                        <div class="text-danger col-md-12"><?= $errors['mail'] ?? '' ?></div>
                    </div>
                    <div class="row mt-3">
                        <label class="ml-2" for="picture">Photo de Profil :</label>
                        <input class="ml-2 form-control users-setings" type="file" id="picture" name="picture">
                        <!-- ========== input hidden=============================================== -->
                        <input type="hidden" name="picture" value="<?=$usersViews->users_pictures?>">
                        <!-- ========== input hidden=============================================== -->
                        <div class="text-danger col-md-12"><?= $errors['picture'] ?? '' ?></div>
                    </div>
                    <div class="row mt-3 d-flex justify-content-center justify-content-around mt-5">
                        <button type ="submit" class="btn btn-success" name="save_change" value="valider">Sauvegarder mes changements&nbsp;<i class="fas fa-save"></i></button>
                        <button type="button" class="btn btn-danger" name="delete_account" value="valider" data-toggle="modal" data-target="#delete">Désactiver mon compte&nbsp;<i class="fas fa-trash"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header text-center col-md-12">
                        <form action="#" method="POST">
                            <h5 class="text-center alert alert-danger m-auto" id="exampleModalScrollableTitle">Attention vous êtes sur le point de désactiver votre compte</h5>
                        </div>
                        <div class="modal-body">
                            <label for="password" class="text-center text-light">Avant de désactiver votre compte veuillez confirmer votre mot de passe !</label>
                            <input class="ml-2 form-control users-setings" type="password" name="pass_verify" id="password" placeholder="password">
                            <input type="hidden" name="fullName" value="<?= $usersViews->users_lastname.' '.$usersViews->users_firstname?>">
                            <input type="hidden" name="id" value="<?= $usersViews->users_id; ?>">
                            <p class="text-center text-light">Pour plus d'information concernant vos données personnelles <a href="#">Tout se passe sur cette page..</a></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuler</button>
                            <button class="btn btn-danger" type="submit" name="delete_account" value="valider">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<?php
    include 'footer.php';
?>