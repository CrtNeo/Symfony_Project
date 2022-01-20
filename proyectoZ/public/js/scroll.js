window.addEventListener("scroll", fundidoAbajo);
window.addEventListener("scroll", fundidoIzquierda);
window.addEventListener("scroll", fundidoDerecha);

function fundidoAbajo(){
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

function fundidoIzquierda(){
    let cards = document.querySelectorAll('.fundido-left');
    cards.forEach((card) => {
        var distanciaArriba = card.getBoundingClientRect().top;
        if(distanciaArriba < window.innerHeight - 400){
            card.classList.add('active');     
        }else{
            card.classList.remove('active');     
        };
    });
}

function fundidoDerecha(){
    let cards = document.querySelectorAll('.fundido-right');
    cards.forEach((card) => {
        var distanciaArriba = card.getBoundingClientRect().top;
        if(distanciaArriba < window.innerHeight - 400){
            card.classList.add('active');     
        }else{
            card.classList.remove('active');     
        };
    });
}
