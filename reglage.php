<?php
    $title = 'SpaceBrico - Réglage';
    $name = 'Fontaine';
    $lastName = 'Brian';
    $civility = 'Monsieur';
    $birthDays = '19/02/1998';
    $postalAddress = '1 impasse Louis Quentin';
    $postalCode = 80390;
    $city = 'Fressenville';
    $password = 'Saisisez votre nouveau mot de passe !';
    $confirPassword = 'Veuillez confirmer votre mot de passe !';
    $email = 'briandeveloppeurweb@gmail.com';
    $confirmEmail = 'briandeveloppeurweb@gmail.com';
    $phone = '06.23.56.56.56';
    $job = 'Développeur web junior';
    $company = 'La manu';
    $lastPasword ='brian56';
    include 'header.php';
?>
    <?php 
        include 'navbar.php';
    ?>
    <main>
        <div id="containt" class="row d-flex justify-content-center">
            <div id="setings">
            <h1>Réglages</h1><img class="users-setings-img" src="asset/img/65255.jpg" alt="">
                <form action="reglage.php" method="GET">
                    <div class="row">
                        <h3 class="mt-2">Profil :</h3>
                    </div>
                    <div class="row">
                        <label class="ml-2" for="civility">Civilité :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="civility" name="civility" value="<?= $civility;?>" disabled>
                        <label class="ml-2" for="name">Nom :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="name" name="firstName" value="<?= $name;?>" disabled>
                        <label class="ml-2" for="lastName">Prenom :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="lastName" name="lastName" value="<?= $lastName;?>" disabled>
                        <label class="ml-2" for="lbirthDays">Date de Naissance :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="birthDays" name="birthDays" value="<?= $birthDays;?>" disabled>
                    </div>
                    <div class="row mt-3">
                        <label class="ml-2" for="postalAddress">Adresse postal :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="postalAddress" name="postalAddress" value="<?= $postalAddress;?>">
                        <label class="ml-2" for="postalCode">Code postal :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="postalCode" name="postalCode" value="<?= $postalCode;?>">
                        <label class="ml-2" for="city">Ville :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="city name="city" value="<?= $city;?>">
                        <label class="ml-2" for="phone">Numéro de téléphone :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="phone" name="phone" value="<?= $phone;?>">
                        <label class="ml-2" for="job">Métier :</label>
                        <input class="ml-2 form-control users-setings" type="tex" id="job" name="job" value="<?= $job;?>">
                        <label class="ml-2" for="company">Entreprise :</label>
                        <input class="ml-2 form-control users-setings" type="text" id="company" name="company" value="<?= $company;?>">
                    </div>
                    <div class="row">
                        <h3 class="mt-2">Information de connection :</h3>
                    </div>
                    <div class="row mt-3">
                    <label class="ml-2" for="lastPasword">Ancien mot de passe :</label>
                        <input class="ml-2 form-control users-setings" type="password" id="lastPasword" name="lastPasword" value="<?= $lastPasword;?>">
                        <label class="ml-2" for="pasword">Mot de passe :</label>
                        <input class="ml-2 form-control users-setings" type="password" id="password" name="password" placeholder="<?= $password;?>">
                        <label class="ml-2" for="cPassword">Confirmation mot de passe :</label>
                        <input class="ml-2 form-control users-setings" type="password" id="cPassword" name="cPassword" placeholder="<?= $confirPassword;?>">
                    </div>
                    <div class="row mt-3">
                        <label class="ml-2" for="email">Adresse email:</label>
                        <input class="ml-2 form-control users-setings" type="email" id="email" name="email" value="<?= $email;?>">
                        <label class="ml-2" for="cEmail">Confirmation email :</label>
                        <input class="ml-2 form-control users-setings" type="email" id="cEmail" name="cEmail" value="<?= $confirmEmail;?>">
                    </div>
                    <div class="row mt-3">
                        <label class="ml-2" for="email">Photo de Profil :</label>
                        <input class="ml-2 form-control users-setings" type="file" id="picture" name="picture">
                    </div>
                    <div class="row mt-3 d-flex justify-content-center justify-content-around mt-5">
                        <button class="btn btn-success" name="save_change">Sauvegarder mes changements&nbsp;<i class="fas fa-save"></i></button>
                        <button class="btn btn-danger" name="delete_account">Supprimer mon compte&nbsp;<i class="fas fa-trash"></i></button>
                        <button class="btn btn-primary" name="disconect">Déconnection</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
<?php
    include 'footer.php';
?>