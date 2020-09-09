// document.querySelectorAll('[data-note]').forEach(function (node) {
//     function genaralNote() {
//         let note = parseFloat(node.dataset.note, 100);
//         console.log(note);
//         let noteGénerale = 'Note générale :';
//         // let note = 2;
//         if (note == 5 )
//         {
//             // var noteStars = 'jai 5';
//             node.innerHTML = noteGénerale + ' jai 5';
//         }
//         else if (note >= 4 && note <= 4.9)
//         {
//             // var noteStars = 'jai entre 4 et 4.9';
//             node.innerHTML = noteGénerale + ' jai entre 4 et 4.9';
//         }
//         else if (note >= 3 && note <= 3,9)
//         {
//             // var noteStars = 'jai entre 3 et 3.9';
//             node.innerHTML = noteGénerale + ' jai entre 3 et 3.9';
//         }
//         else if (note >= 2 && note <= 2,9)
//         {
//             // var noteStars = 'jai entre 2 ET 2,9';
//             node.innerHTML = noteGénerale + ' jai entre 2 ET 2,9';
//         }
//         else if (note >= 1 && note <= 1,9)
//         {
//             // var noteStars = "jai entre 1 et 1.9";
//             node.innerHTML = noteGénerale + ' jai entre 1 et 1.9';
//         } 
        
//         else if (note >= 0 && note <= 0,9){
//             // var noteStars = 'jai entre 0 et 0,9';
//             node.innerHTML = noteGénerale + ' jai entre 0 et 0,9';
//         }
//         // console.log(noteStars);
//         node.innerHTML = noteGénerale + ' ' + note+' / 5';
//     }
//     setInterval(function () {
//         // je verifie que le nnoeud parent existe bien 
//         if (node.parentNode) {
//             window.requestAnimationFrame(genaralNote);
//             // genaralNote();
//         // window.location.reload()
//         }
//     }, 15000)
    
//     genaralNote();
// })