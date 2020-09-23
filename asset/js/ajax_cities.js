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
            return response.json();
        })
        //traitement du php qui est retourner 
        .then(function (data) {
            //ceci est une fonction flecher => === function()
            let ul = '<ul class="list-group SB-list_cities">';
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
        document.getElementById('cities').value = target.dataset.id;
        list.innerHTML = '';
    }
})