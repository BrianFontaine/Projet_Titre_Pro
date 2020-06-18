document.getElementsByName("main");
let search = document.getElementById('serach');
let inputSearch = document.getElementsByClassName("inputsearch");

search.addEventListener("mouseover" ,function(){

    search.setAttribute("data","unsearch");
    inputSearch.style = 'display: none;';
    document.getElementById('i').classList = 'fas fa-'+'times';
});

search.addEventListener("mouseout" ,function(){

    search.setAttribute("data","unsearch");
    inputSearch.style = 'display: none;';
    document.getElementById('i').classList = 'fas fa-'+'search';
});





