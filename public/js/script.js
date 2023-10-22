const menu = document.querySelector("div.menu");
const titulo_texto = document.getElementById('titulo_texto');

if (menu != null) {
    menu.addEventListener('click', () =>{
        menu.classList.toggle('active');
    });
}

let currentIndex = 0;

const titles = [
    "Contexto do projeto",
    "Objetivo do projeto",
    "Motivação do projeto",
];

function nextText(cont){
    currentIndex = Math.max((currentIndex + cont) % titles.length, 0);
    titulo_texto.innerText = titles[currentIndex];
}

function enviarFormulario() {
    document.getElementById('form_categorias').submit();
}