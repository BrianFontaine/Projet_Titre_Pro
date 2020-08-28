<footer class="row text-center">
    <a class="m-auto p-2" href="../mentions_légales/">Mentions Légales</a>
    <a class="m-auto p-2" href="../Condition_générales_d'utilisateurs/">Conditions générales d'utilisation</a>
    <a class="m-auto p-2" href="../contact/">Contactez-nous</a>
    <?php if (isset($_SESSION['user'])) { ?>
    <a class="m-auto p-2" href="../modifier_mes_informations/">Modifier mes information</a>
    <?php } ?>
    <a class="m-auto p-2" href="https://brianfontaine.github.io/CV-Brian-D-veloppeurjunior/">&copy; SpaceBrico - 2020</a>
</footer>
</div>
<div class="col-md-12 row bg-dark nav-bar-footer m-auto justify-content-around align-items-center">
    <!-- <a href="../profile/" class="m-auto"><img class="mt-3 ml-4 mb-2 rounded-circle img_user_mobile img-fluid" src="../asset/img/user-boy_default.png"></a> -->
    <!-- <div class="ml-white"></div> -->
    <div id="people" class="m-auto text-white">
        <i id="open" class="fas fa-users"></i>
    </div>
    <div id="people_close" class="m-auto text-white d-none">
        <i id="open" class="fas fa-times"></i>
    </div>
    <!-- <div class="ml-white"></div> -->
    <a href="../messagerie/" class="m-auto"><i class="fas fa-comments"></i></a>
    <!-- <div class="ml-white"></div> -->
    <a href="../accueil/" class="m-auto"><i class="fas fa-home"></i></a>
    <!-- <div class="ml-white"></div> -->
    <a href="" class="m-auto"><i class="fas fa-bell"></i></a>
    <!-- <div class="ml-white"></div> -->
    <a href="" class="m-auto"><i class="fas fa-ellipsis-h"></i></a>

</div>
</body>
<script src="../asset/libs/js/jquery.js"></script>
<script src="../asset/libs/js/all.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    ntegrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<script src="../asset/js/script.js"></script>
<script src="../asset/js/actus_script.js"></script>
<script src="../asset/js/timer_ago.js"></script>

</html>