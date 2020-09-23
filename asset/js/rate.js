let likes = document.querySelectorAll(".star");
likes.forEach(like => {
    like.addEventListener('click', function(e){
        let target = e.target;
        
        target.classList.toggle('far');
        target.classList.toggle('fas');
    })
});
