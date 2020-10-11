<div id="containt" class="row d-flex justify-content-center text-light">
    <div id="setings">
        <h1>Contactez-nous </h1>
        <form action="" method="POST" enctype="multipart/form-data">
        <?php if($mailSend){ ?>
            <div class="alert alert-success"> Votre Message a bien été envoyer !</div>
        <?php } ?>
            <div class="row col-sm-12">
                <label class="ml-2" for="name">Nom : <b class="text-warning">*</b></label>
                <input class="ml-2 form-control " type="text" id="name" name="lastname" placeholder="Dupond" value="<?= $lastname; ?>">
                <div class="ml-2 text-warning"><?= $errors['lastname'] ?? '' ?></div>
            </div>
            <div class="row mt-1 col-sm-12">
                <label class="ml-2" for="lastName">Prénom : <b class="text-warning">*</b></label>
                <input class="ml-2 form-control users-setings" type="text" id="lastName" name="firstname" placeholder="Jean" value="<?= $firstname; ?>">
                <div class="ml-2 text-warning"><?= $errors['firstname'] ?? '' ?></div>
            </div>
            <div class="row mt-1 col-sm-12">
                <label class="ml-2" for="phone">Numéro de téléphone : <b class="text-warning">*</b></label>
                <input class="ml-2 form-control users-setings" type="text" id="phone" name="phone" placeholder="0634561234" value="<?= $phone; ?>">
                <div class="ml-2 text-warning"><?= $errors['phone'] ?? '' ?></div>
            </div>
            <div class=" row mt-1 col-sm-12">
                <label class="ml-2" for="email">Adresse e-mail :<sup><font size="-1" face="Arial,Helvetica">1</font></sup> <b class="text-warning">*</b></label>
                <input class="ml-2 form-control users-setings" type="email" id="email" name="email" placeholder="jean.dupond@mail.fr" value="<?= $email; ?>">
                <div class="ml-2 text-warning"><?= $errors['email'] ?? '' ?></div>
            </div>
            <div class="row mt-1 col-sm-12">
                <label class="ml-2" for="demande">Objet de la demande : <b class="text-warning">*</b></label>
                <input class="ml-2 form-control users-setings" type="text" id="demande" name="demande" placeholder="Erreur 404 page actualités" value="<?= $subject; ?>">
                <div class="ml-2 text-warning"><?= $errors['demande'] ?? '' ?></div>
            </div>
            <div class="row mt-1 col-sm-12">
                <label class="ml-2" for="describ">Description du problème : <b class="text-warning">*</b></label>
                <textarea class="ml-2 form-control users-setings" name="describ" id="describ" cols="30"
                    rows="3" placeholder="Bonjour, "><?= $text; ?></textarea>
                <div class="ml-2 text-warning"><?= $errors['describ'] ?? '' ?></div>
            </div>
            <div class="col-sm-12">
                <p class="h6 mt-2 text-left">les Champ suivit de <b class="text-warning">*</b> Sont Obligatoire </p>
                <p class="h6 mt-2 text-left"><sup><font size="-1" face="Arial,Helvetica">1</font></sup> Merci de renseigner une adresse email valide cette adresse nous servira pour vous recontacter</p>
            </div>
            <div class="row mt-3 col-sm-12 justify-content-around">
                <label class=" my-auto ml-2 btn btn-success col-sm-6 label_picture" for="picture">Ajouter une photo du probléme (facultatif) :
                    <input class="d-none" type="file" id="picture" name="picture">
                </label>
                <button class="my-auto btn btn-primary" name="disconect">Envoyer</button>
            </div>
            <div class="row mt-3 d-flex justify-content-center justify-content-around  col-sm-12 mb-4">
                <!-- <button class="btn btn-primary" name="disconect">Envoyer</button> -->
            </div>
        </form>
    </div>
</div>
</main>
<?php
    include 'footer.php';
?>
</body>