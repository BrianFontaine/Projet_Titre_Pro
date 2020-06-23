<?php
    include 'header.php';
    include 'navbar.php';
?>
<div id="containt" class="row d-flex justify-content-center">
    <div id="setings">
        <h1>Contactez nous </h1>
        <form action="reglage.php" method="GET">
            <div class="row">
                <label class="ml-2" for="name">Nom :</label>
                <input class="ml-2 form-control users-setings" type="text" id="name" name="firstName">
                <label class="ml-2" for="lastName">Prenom :</label>
                <input class="ml-2 form-control users-setings" type="text" id="lastName" name="lastName">
            </div>
            <div class="row mt-3">
                <label class="ml-2" for="phone">Numéro de téléphone :</label>
                <input class="ml-2 form-control users-setings" type="text" id="phone" name="phone"">
                    </div>
                    <div class=" row mt-3">
                <label class="ml-2" for="email">Adresse email:</label>
                <input class="ml-2 form-control users-setings" type="email" id="email" name="email">
            </div>
            <div class="row mt-3">
                <label class="ml-2" for="demande">Objet de la demande:</label>
                <input class="ml-2 form-control users-setings" type="text" id="demande" name="demande">
            </div>
            <div class="row mt-3">
                <label class="ml-2" for="describ">Décription du probléme :</label>
                <textarea class="ml-2 form-control users-setings" name="describ" id="describ" cols="30"
                    rows="3"></textarea>
            </div>
            <div class="row mt-3">
                <label class="ml-2" for="email">Photo du probleme (Facultatif) :</label>
                <input class="ml-2 form-control users-setings" type="file" id="picture" name="picture">
            </div>
            <div class="row mt-3 d-flex justify-content-center justify-content-around mt-5">
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