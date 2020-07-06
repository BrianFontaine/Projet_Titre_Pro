document.getElementsByName("main");
let search = document.getElementById('serach');
let inputSearch = document.getElementById("inputsearch");

function searchActu(string) {
    var xhttp;
    if (window.XMLHttpRequest) {
        // pour moteur de recherche moderne
        xhttp = new XMLHttpRequest();
    } else {
        // pour IE6 et IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#contenue-actu").html(this.responseText);
        }
    };
    xhttp.open("GET", "resultsearch.php?search=" + string, true);
    xhttp.send();
}

$("#inputsearch").keyup(function () {
    var string = $(this).val();
    if (string.length > 0) {
        $("#i").replaceWith('<i id="i" class="fas fa-times"></i>');
    } else {
        $("#i").replaceWith('<i id="i" class="fas fa-search"></i>');
    }
    searchActu(string);
});

$("#search").click(function () {
    var string = $("#inputsearch").val();
    var reset = '';
    if (string.length > 0) {
        $("#inputsearch").val('');
        $("#i").replaceWith('<i id="i" class="fas fa-search"></i>');
        searchActu(reset);
    }
});


// $(".note").on('click',function(){
//     alert($('far').val());
//     $('far').removeClass('.far');
//     $('.fas').addClass('.fas');
// });

// let div = document.getElementById('friends');
// div.style.height = "200px";
// div.style.width = '360px';
// div.style.overflowY = 'scroll';
// var photo = 'user-boy_default.png';
// for (let i = 0; i < 5; i++) {


//     var childNotify = document.createElement('div');
//     childNotify.className = "bg-dark text-white border-bottom";
//     div.appendChild(childNotify);

//     let imgUsers = document.createElement('img');
//     imgUsers.className="users-conect";
//     imgUsers.src="asset/img/user-boy_default.png";
//     childNotify.appendChild(imgUsers);

//     let name = document.createElement('button');
//     name.className = "text-white btn btn-link";
//     name.textContent = "Fontaine Brian";
//     childNotify.appendChild(name);

//     let accep = document.createElement('button');
//     accep.className = 'btn btn-success';
//     accep.textContent = 'Accepter';
//     childNotify.appendChild(accep);

//     let decline = document.createElement('button');
//     decline.className = 'btn btn-danger ml-2';
//     decline.textContent = 'Refuser';
//     childNotify.appendChild(decline);

    
// }
// document.getElementById('friends').insertAdjacentElement("afterend",div );


// let div1 = document.getElementById('message');
// div1.style.height = "200px";
// div1.style.width = '360px';
// div1.style.overflowY = 'scroll';
// var photo = 'user-boy_default.png';
// for (let i = 0; i < 10; i++) {


//     var childMessage = document.createElement('div');
//     childMessage.className = "bg-dark text-white border-bottom";
//     div1.appendChild(childMessage);

//     let imgUsersMessage = document.createElement('img');
//     imgUsersMessage.className="users-conect";
//     imgUsersMessage.src="asset/img/user-boy_default.png";
//     childMessage.appendChild(imgUsersMessage);

//     let message = document.createElement('p');
//     message.className = "text-white btn btn-link";
//     message.textContent = "Fontaine Brian";
//     childMessage.appendChild(message);

//     let message1 = document.createElement('p');
//     message1.className = "text-white btn btn-link";
//     message1.textContent = "Vient voir...";
//     childMessage.appendChild(message1);

//     let compteur = document.createElement('p');
//     compteur.className = "text-white btn btn-primary mt-2";
//     compteur.textContent = "ouvrir";
//     childMessage.appendChild(compteur);
// }
// document.getElementById('message').insertAdjacentElement("afterend",div1 );


// let notify = document.getElementById('notify');
// notify.style.height = "200px";
// notify.style.width = '360px';
// notify.style.overflowY = 'scroll';
// var photo = 'user-boy_default.png';
// for (let i = 0; i < 10; i++) {


//     var childNotify = document.createElement('div');
//     childNotify.className = "bg-dark text-white border-bottom";
//     notify.appendChild(childNotify);

//     let userNotify = document.createElement('img');
//     userNotify.className="users-conect";
//     userNotify.src="asset/img/user-boy_default.png";
//     childNotify.appendChild(userNotify);

//     // let nameNotify = document.createElement('p');
//     // nameNotify.className = "text-white btn btn-link";
//     // nameNotify.textContent = "Fontaine Brian";
//     // childNotify.appendChild(nameNotify);

//     let contentNotify = document.createElement('p');
//     contentNotify.className = "text-white btn btn-link";
//     contentNotify.textContent = "Viencent à aimer votre photo";
//     childNotify.appendChild(contentNotify);

// }
// document.getElementById('notify').insertAdjacentElement("afterend",notify );

// window.addEventListener('resize', function(){
//     console.clear();
//     $("#contenue-actu").prop('id', 'contenue-actu-iphone-6');
//     $(".title-actus").prop('class', '.title-actus-iphone-6');   
// });

// $('.note').on('mouseover', '[data-fa-i2svg]', function () {
//     var onStar = parseInt($(this).data('value'), 10);
//     $(this).parent().children('[data-fa-i2svg]').each(function (e) {
//         if (e < onStar) {
//             $(this).removeClass('fal');
//             $(this).addClass('fas');
//         } else {
//             $(this).removeClass('fas');
//             $(this).addClass('fal');
//         }
//     });

// }).on('mouseout', '[data-fa-i2svg]', function () {
//     ratingVal ='';
//     if (!ratingVal || ratingVal == 0) {
//         $(this).parent().children('[data-fa-i2svg]').each(function (e) {
//             $(this).removeClass('fal');
//             $(this).addClass('fas');
//         });
//     } else {
//         $(this).parent().children('[data-fa-i2svg]').each(function (e) {
//             var r = parseInt($(this).data('value'), 10);
//             if (r < ratingVal) {
//                 $(this).removeClass('fal');
//                 $(this).addClass('fas');
//             }
//         });
//     }
// });

