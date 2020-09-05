<?php
    $client = '::123';
    if ($client == $_SERVER['REMOTE_ADDR']) {
        header('location:Accueil/');
        exit();
    }
    else
    {
        header('refresh:3;Accueil/');
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/libs/css/bootstrap-grid.css">
    <link rel="stylesheet" href="asset/libs/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur SpaceBrico</title>
</head>

<body style="background-color:#806F6B;">
    <img class="col-md-12 " src="asset/img/logoSpaceBrico_V2.01.png" alt="" style="margin-top: 42%;">
    <div class=" text-center">
        <!-- <p class="h3">Introduction a SpaceBrico</p>
            <p class="bg-dark text-white rounded-pill">
                ceci est votre premiere fois sur notre site !
                Pas de panique une caumunauté en or est la pour vous servire 
                en vous souhaitant une bienvenue est surtout vous satisfaire est notre priorité !
                n'ésité pas a signaler du contenue incorect grace a la rubrique nous contacter qui est presente 
                et surtout bricolé bien 
            </p> -->
        <p class=text-center h5>Vous allez etre redigiger dans : <span class="timer text-center"></span> Secondes</p>
        
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
    var min = 0,
        sec = 34,
        dse = 0;
    var tmp = (min * 60 + sec) * 10 + dse;
    var chrono = setInterval(function () {
        min = Math.floor(tmp / 600);
        sec = Math.floor((tmp - min * 600) / 10);
        dse = tmp - ((min * 60) + sec) * 10;
        tmp--;
        $('.timer').text(sec);
    }, 100);
</script>

</html>