const titulo_texto = document.getElementById('titulo_texto');

let contAtual = 0;

function nextText(cont){

    if (contAtual === 2 && cont === 1) {
        cont = 0;
    }

    if (contAtual === 0 && cont === -1) {
        cont = 0;
    }

    contAtual = cont + contAtual;

    switch (contAtual) {
        case 0:
            titulo_texto.innerText = "Contexto do projeto"
        break;

        case 1:
            titulo_texto.innerText = "Objetivo do projeto"
        break;

        case 2:
            titulo_texto.innerText = "Motivação do projeto"
        break;
    
        default:
            titulo_texto.innerText = "Contexto do projeto"
        break;
    }
    
}