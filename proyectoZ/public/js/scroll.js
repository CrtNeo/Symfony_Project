window.addEventListener("scroll", revelarCards);

function revelarCards(){
    let cards = document.querySelectorAll('.fundido');
    cards.forEach((card) => {
        var distanciaArriba = card.getBoundingClientRect().top;
        if(distanciaArriba < window.innerHeight - 150){
            card.classList.add('active');     
        }else{
            card.classList.remove('active');     
        };
    });
}
