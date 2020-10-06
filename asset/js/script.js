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
            $(".contenue-actu").html(this.responseText);
        }
    };
    xhttp.open("GET", '../controllers/resultesearch_ctrl.php?search='+string, true);
    xhttp.send();
}

$("#inputsearch").keyup(function () {
    var string = $(this).val();
    if (string.length > 0) {
        $("#i").replaceWith('<i id="i" class="fas fa-times"></i>');
    } else {
        $("#i").replaceWith('<i id="i" class="fas fa-search"></i>');
        location.reload();
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
        location.reload();
    }
});