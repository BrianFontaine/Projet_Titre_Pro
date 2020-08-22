$('#post').click(function(){ // on crée une fonction qui permet de deploter des champ suplémentaire au click de l'input avec l'id post
    $('#post').removeClass('post'); // quand l'évenement click est déclancher on retire la classe post qui lui enleve le margin top
    $('#elements').addClass('active_element'); // on ajoute une class active_element pour faire apparaitre le champ de saisie 
    $('#form_btn').addClass('active_movie'); // on ajoute la class active_movie pour afficher les bouton photo/video/publier
});

$('#post').focus(function (e) {  // on crée une fonction qui donne le focus a l'élement avec l'id post 
    e.preventDefault();
    $('#post').addClass('border-black'); //au focus de cet élement on ajoute une class qui permer de lui donner une bordure
                                        // gris fonceé et un background gris claire 
});

$('#post').blur(function (e) { // on crée une fonction qui retire le focus a l'élement avec l'id post 
    e.preventDefault();
    $('#post').removeClass('border-black'); //des que l'on retire le focu de cet élement on retire la class qui permer de lui donner une bordure
                                           // gris fonceé et un background gris claire 
});

$('#elements').blur(function (e) { // on crée une fonction qui retire le focus a l'élement avec l'id elements
    e.preventDefault();
    $('#elements').removeClass('border-black'); //des que l'on retire le focu de cet élement on retire la class qui permer de lui donner une bordure
                                                // gris fonceé et un background gris claire 
});

$('#elements').focus(function (e) { // on crée une fonction qui donne le focus a l'élement avec l'id elements
    e.preventDefault();
    $('#elements').addClass('border-black'); //au focus de cet élement on ajoute une class qui permer de lui donner une bordure
                                            // gris fonceé et un background gris claire 
});

$('#post').keyup(function () {
    var string = $(this).val(); // on déclare une varivle STRING pour savoir si le champ post est bien replie
    if (string.length > 0) { // si le champ saisie depasse 0 caractere alors retire la class remove pour faire apparaitre l'element
        $('#vide').removeClass('remove');
    } else{  // sinon si le champ est vide on ajoute une class remove pour faire disparaitre l'élémént 
        $('#vide').addClass('remove');
    }
});

$('#vide').click(function() { // on crée une fonction qui permer au click de vider l'input avec l'id post
    var string = $('#post').val(); // on verifie la valeur de notre input
    if (string.length > 0) {  // si il depasse 0 
        $('#post').val('');  // on lui remplace la valeur par une chaine de caractere vide
        $('#vide').addClass('remove'); // et on lui ajoute la class remove pour faire diparaitre l'élement 
    }
});

// $("input[data-preview]").change(function() {
//     var input = $(this);
//     var oFReader = new FileReader();
//     oFReader.readAsDataURL(this.files[0]);
//     oFReader.onload    = function(oFREvent) {
//         // $('.active_movie').addClass('btn_preview');
//         $('.preview').removeClass('d-none');
//         $('.preview').html('<img src="'+oFREvent.target.result+'">')
//         // $(input.data('preview')).css('background-image', 'url("'+oFREvent.target.result+'")');
//     };
// });
// ================== FONCTIONALITER Multi Preview =====================================================================================================
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<video class="gallery-update">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
        $('.gallery').addClass('gallery_preview');
    });
});
// ================== FIN FONCTIONALITER Multi Preview =====================================================================================================
// =========================================================================================================================================================
// ================== FONCTIONALITER AMIS CONNECTER ========================================================================================================
$('#people').click(function(){
    $('.contenue-actu').addClass('v-hidden');
    $('#people').addClass('friend_only_show');
    $('.friends_online_active').removeClass('d-none');
    $('#people').addClass('d-none');
    $('#people_close').removeClass('d-none');
    $('#people_close').addClass('poeple_close');
});

$('#people_close').click(function () {
    $('#people_close').addClass('d-none');
    $('#people').removeClass('d-none');
    $('.contenue-actu').removeClass('v-hidden');
    $('#close').replaceWith('<i class="fas fa-users"></i>');
    $('#people').removeClass('friend_only_show');
    $('.friends_online_active').addClass('d-none');
});
// ================== FIN ===== FONCTIONALITER AMIS CONNECTER ===============================================================================================
// ==========================================================================================================================================================
// ================== FONCTIONALITER FAVORIS ================================================================================================================