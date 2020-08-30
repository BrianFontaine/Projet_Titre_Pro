<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceBrico - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Niramit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../asset/libs/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../asset/libs/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/libs/css/fontawesome.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/screen.css">
</head>

<body>
    <header class="d-flex justify-content-center">
        <a href="login.php"><img class="ml-50 mt-3 mb-3" src="../asset/img/logoSpaceBrico_V2.01.png" alt=""
                width="200"></a>
    </header>
    <div class="bg">
        <!-- <P class="h1 text-center mt-5 mb-n5 "><?= $id;?></P> -->
        <div class="d-flex justify-content-center text-white">
            <form action="../controllers/register_ctrl.php" method="POST">
                <p class="h2 text-dark text-uppercase d-flex justify-content-center mt-5 mb-4">Inscription</p>
                <div class="form-row">
                    <label class="text-dark" for="lastname">Votre prénom : </label>
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control" placeholder="Dupont" id="lastname" name="lastname">
                        <?php if(!empty($errors)) { ?> <div class="alert alert-danger"><?= $errors['lastname'];?></div>
                        <?php } ?>
                    </div>
                    <label class="text-dark" for="firstname">Votre Nom : </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Jean" id="firstname" name="firstname">
                        <?php if(!empty($errors)) { ?> <div class="alert alert-danger"><?= $errors['firstname'];?></div>
                        <?php } ?>
                    </div>
                    <label class="text-dark" for="mail">Votre email : </label>
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control" placeholder="Email" id="mail" name="mail">
                        <?php if(!empty($errors)) { ?> <div class="alert alert-danger"><?= $errors['mail'];?></div>
                        <?php } ?>
                    </div>
                    <label class="text-dark" for="password">Votre mot de passe : </label>
                    <div class="col-md-12 mt-2 rounded-pill">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="pass">
                        <div id="forcePassword" class="mt-1">
                            <div class="force-progress w-100 rounded-pill bg-light">
                                <div id="progress" class="p-bar" role="progressbar" aria-valuemin="0" aria-valuemax="4" style="border-radius:25px;">
                                    <div id="force" class="small text-light pl-2">Faible</div>
                                </div>
                            </div>
                        </div>
                        <?php if(!empty($errors)) { ?> <div class="alert alert-danger"><?= $errors['pass'];?></div>
                        <?php } ?>
                    </div>
                    <label class="text-dark" for="c_password">confirmer votre mot de passe : </label>
                    <div class="col-md-12 mt-2">
                        <input type="password" class="form-control" placeholder="Confirm Password" id="c_password"
                            name="confPass">
                    </div>
                    <label class="text-dark">Votre ville : </label>
                    <div class="col-md-12 mt-2">
                            <!-- <input class="form-control" type="search" name="search_cities" id="search" placeholder="Rechercher votre ville...">
                            <div id="result" style="position:absolute;left:0;right:0;"></div> -->
                        <!-- <input type="text" class="form-control" placeholder="Ville" id="country" name="city"> -->
                        <select class="form-control" name="city">
                                <option value="">Choisissez votre ville ?</option>
                            <?php foreach ($listCity as $city) { ?>
                                <option value="<?= $city->city_id ?>"><?= $city->city_name; ?></option>
                           <?php  } ?>
                        </select>
                    </div>
                    <!-- <label class="text-dark" for="zip_code">Votre code postal : </label>
                    <div class="col-md-12 mt-2">
                        <input type="text" class="form-control" placeholder="Code postal" id="zip_code" name="zipcode">
                    </div> -->
                    <label class="text-dark" for="birthdate">Votre date de naissance : </label>
                    <div class="col-md-12 mt-2 mr-n5 pr-2">
                        <input type="date" class="form-control" id="birthdate" name="birthdate">
                        <?php if(!empty($errors)) { ?> <div class="alert alert-danger"><?= $errors['birthdate'];?></div>
                        <?php } ?>
                    </div>
                    <!-- <label class="text-dark" for="phone ">Votre numéro de téléphone : </label>
                    <div class="col-md-12 mt-2 ">
                        <input type="text" class="form-control" placeholder="Télephone" id="phone" name="phone">
                        <?php if(!empty($errors)) { ?> <div class="alert alert-danger"><?= $errors['phone'];?></div>
                        <?php } ?>
                    </div> -->
                    <input type="hidden" name="picture" value="user-boy_default">
                    <label class="text-dark">Votre genre: </label>
                    <div class="col-md-12 text-dark  mt-2">
                        <div class="col form-control">
                            <input type="radio" name="genre" id="homme" value="1"
                                <?= $gender == '1' ? 'checked' : '' ?>>
                            <label for="homme">Homme</label>
                        </div>
                        <div class="col-md-12 form-control mt-2">
                            <input type="radio" name="genre" id="femme" value="2"
                                <?= $gender == '2' ? 'checked' : '' ?>>
                            <label for="femme">Femme</label>
                        </div>
                        <div class="col-md-12 form-control mt-2">
                            <input type="checkbox" name="cgu" id="cgu" value="1">
                            <label for="cgu">&nbsp;J'ai lu et j'accepte les conditions génerales d'utilisations </label>
                            <embed src="../asset/docs/CGU.pdf" class="col-12" type="application/pdf">
                        </div>
                        <!-- <div class="col-md-12 ">
                            <div id="reg" class="g-recaptcha d-flex justify-content-center"
                                data-sitekey="6LcQtfYUAAAAAHuiPdMtV2MJEacUOpoIDZW2t9P1"></div>
                        </div> -->
                        <div class="col-md-12 mt-n5">
                            <p style='color: red'><?= !empty($errors) ? $errors['mailExist']  : '' ?></p>
                            <button class="btn btn-info btn-block my-4" type="submit">S'inscrire</button>
                        </div>
                        <!-- name="submit_post"  -->
                        <p class="text-dark text-center col-12">Vous etes déja menbre?
                            <a href="../connection/">Se connecter</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b3f34b62ee.js" crossorigin="anonymous"></script>
    <script src="asset/libs/js/bootstrap.bundle.js"></script>
    <script>
        // Mot de passe avec force & couleur
        $(function () {

            // Fait apparaitre la progressbar quand on focus le champ password
            $(`input[name="pass"]`).focus(function () {
                let forcePassword = document.getElementById('forcePassword');
                $(forcePassword).slideDown();
            })

            // selectionne un élément et affique la fonction au keyup
            $("input[name='pass']").keyup(function () {
                // prend la value du selecteur choisi précédement
                var password = $(this).val();
                var force = 0;
                // vérifie que la value de l'input contient des lettres
                // Si c'est le cas, la force prend +1
                if (password.match(/(?=.*[a-z])/) || password.match(/(?=.*[A-Z])/)) {
                    force++;
                }
                // vérifie que la value de l'input contient des chiffres
                if (password.match(/(?=.*[0-9])/)) {
                    force++;
                }
                // vérifie que la value de l'input contient des caractères spéciaux
                if (password.match(/(?=.*\W)/)) {
                    force++;
                }
                // vérifie que le password contient au moins 8 caractères
                if (password.length >= 8) {
                    force++;
                }

                var textForce = $("#force");
                // couleur en fonction de la force
                if (force == 1) {
                    var bgColor = '#FF0000';
                    textForce.text('Faible');
                } else {
                    if (force == 2) {
                        var bgColor = '#FF8000';
                        textForce.text('Moyen');
                    } else {
                        if (force == 3) {
                            var bgColor = '#D3CF00';
                            textForce.text('Fort');
                        } else {
                            if (force == 4) {
                                var bgColor = '#35CD00';
                                textForce.text('Très fort');
                            }
                        }
                    }
                }
                document.getElementById('progress').style.backgroundColor = bgColor;
                document.getElementById('progress').style.width = 25 * force + '%';
            })

            // fait disparaitre la progressbar quand on quitte le champ password
            $("input[name='password']").blur(function () {
                $("#forcePassword").slideUp();
            })
        });
    </script>
    <!-- <script>
        let sp = document.getElementById('search');
        let list = document.getElementById('result');

        sp.addEventListener('keyup', function () {
            let search = this.value;
            if (search.length >= 2) {
                //on vide le champ 
                list.innerHTML = '';
                let data = new FormData();
                data.append('search',search);
                //on recherche a partir de deux caractere  et on renvoie la 
                //page controllers/create_appointment_ctrl.php ============
                var searchCity = fetch('../controllers/result_cities_ctrl.php', {
                    headers: {
                        'Accept': 'application/json',
                        // 'Content-Type': 'application/json'
                    },
                    method:'POST',
                    body: data,
                });
                // si le traitement s'est bien passé 
                searchCity.then(function (response) {
                    // console.log(response.Json());
                    // let city = JSON.parse(response);
                    // console.log(city);
                    return response.json();
                })
                //traitement du php qui est retourner 
                .then(function (data) {
                    console.log(data);
                    //ceci est une fonction flecher => === function()
                    let ul = '<ul class="list-group">';
                    data.forEach(city => 
                    {
                        ul += `<li class="list-group-item text-dark choice" data-id="${city.city_id}" >${city.city_name}</li>`;
                    })
                    list.innerHTML = ul;
                })
            }
        })
        document.body.addEventListener('click',function(e){
            let target = e.target;
            if (target.classList.contains('choice')) {
                // alert(target.textContent);
                sp.value = target.textContent;
                document.getElementById('idPatient').value = target.dataset.id;
                list.innerHTML = '';
            }
        })
    </script>
</body> -->

</html>