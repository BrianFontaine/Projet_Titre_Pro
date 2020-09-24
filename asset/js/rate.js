let likes = document.querySelectorAll(".star");
likes.forEach(like => {
    like.addEventListener('click', function(e){
        let target = e.target;
        console.log(target);
        target.classList.toggle('far');
        target.classList.toggle('fas');
    })
});
