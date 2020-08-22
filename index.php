<?php
    $client = '::123';
    if ($client == $_SERVER['REMOTE_ADDR']) {
        header('location:Accueil/');
        exit();
    }
    else
    {
        header('refresh:34;Accueil/');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/libs/css/bootstrap-grid.css">
    <link rel="stylesheet" href="asset/libs/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur SpaceBrico</title>
</head>
<style>
    .text-f{
        text-shadow: rgb(11, 14, 17) -0.0059307px 0.0059307px 0px, rgb(454, 14, 17) -1.00593px 1.00593px 0px, rgb(11, 876, 17) -2.00593px 2.00593px 0px, rgb(11, 14, 17) -3.00593px 3.00593px 0px, rgb(11, 14, 17) -4.00593px 4.00593px 0px, rgb(12, 15, 19) -5.00593px 5.00593px 0px, rgb(14, 17, 21) -6.00593px 6.00593px 0px, rgb(15, 19, 23) -7.00593px 7.00593px 0px, rgb(17, 21, 25) -8.00593px 8.00593px 0px, rgb(18, 23, 28) -9.00593px 9.00593px 0px, rgb(20, 25, 30) -10.0059px 10.0059px 0px, rgb(21, 27, 32) -11.0059px 11.0059px 0px, rgb(23, 29, 34) -12.0059px 12.0059px 0px, rgb(25, 31, 37) -13.0059px 13.0059px 0px;    }
</style>

<body>
    <h1 class="text-center">Bienvenue Sur SpaceBrico</h1>
    <div class=" text-center text-f h1">
        <p>Le premier site d'entraide au bricolage </p>
        <p>Vous allez etre redigiger dans : <span class="timer text-center"></span> Secondes</p>
        
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