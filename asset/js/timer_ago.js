let terms = [{
    // temp en secondes 
    time: 10,
    // le diviseur 
    divide: 1,
    // le template 
    text: "%d secondes"
}, {
    time: 90,
    divide: 60,
    text: "Moins d'une Minute"
}, {
    time: 45 * 60,
    divide: 60,
    text: "%d Minutes"
}, {
    time: 90 * 60,
    divide: 60 * 60,
    text: "environ une heure"
}, {
    time: 24 * 60 * 60,
    divide: 60 * 60,
    text: "%d heures"
}, {
    time: 42 * 60 * 60,
    divide: 24 * 60 * 60,
    text: "environ un jour"
}, {
    time: 45 * 24 * 60 * 60,
    divide: 24 * 60 * 60 * 30,
    text: "environ un mois"
}, {
    time: 365 * 24 * 60 * 60,
    divide: 24 * 60 * 60 * 30,
    text: "%d mois"
}, {
    time: 365 * 1.5 * 24 * 60 * 60,
    divide: 24 * 60 * 60 * 365,
    text: "environ un an"
}, {
    time: Infinity,
    divide: 24 * 60 * 60 * 365,
    text: "%d ans"
}];
// je selection tous les element qui on le data-ago 
document.querySelectorAll('[data-ago]').forEach(function (node) {
// je cree une fonction setText pour transcrire un timestamp en  il y a environ *** heure
    function setText() {
        // je cree les seconde a partir du timstamp qui est en miliseconde donc je 
        // le divise par 1000 car 1 secondes represente 1000 miliseconde 
        let secondes = Math.floor(new Date().getTime() / 1000 - parseInt(node.dataset.ago, 10));
        // je cree un prefixe pour savoir si levenement est passer ou non 
        let prefix = secondes > 0 ? 'Il y a ' : 'Dans';
        // je calcule labsolue de seconde 
        secondes = Math.abs(secondes);
        // je declare une variable term a null
        let term = null;
        // je parcoure mon tableau terms et je lui envoie les infos dans term
        for (term of terms) {
            if (secondes < term.time) {
                break;
            }
        }
        // je declare une variable nextimer pour etre sur que le timer se declanche que quand 
        // il en a besoins pour cea je recupere le modulo de seconde 
        let nextTick = secondes % term.divide;
        // et la je verifie que le modulo soit 0 et si il est egale a 0 alors je lance le timer 
        // quand les seconde ou les minuter arive a bout de couse pour passer a la minute ou seconde suivante 
        if (nextTick === 0){
            nextTick = term.divide;
        }
        // je cree un template avec mon prefix et je remplace le %d par le nombre de seconde diviser par le diviseur de mon tableau terms 
        node.innerHTML = prefix + term.text.replace("%d", Math.round(secondes / term.divide));
        // je declare setTimeout pour relancer automatiquement ma fonction 
        setTimeout(function () {
            // je verifie que le nnoeud parent existe bien 
            if (node.parentNode){
                window.requestAnimationFrame(setText);
            }
        }, nextTick * 1000)
    }
    
    setText();
})