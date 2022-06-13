let btn_conteudos = document.getElementById('btn_conteudos');
let btn_iniciar = document.getElementById('btn_iniciar');
let btn_estatisticas = document.getElementById('btn_estatisticas');
let btn_area_professor = document.getElementById('btn_area_professor');
let btn_sobre = document.getElementById('btn_sobre');

let btn_home = document.getElementById('btn_home');
    if(btn_home != undefined){
        btn_home.addEventListener('click', function () {
            direct('/');
        });
        btn_home.addEventListener('keypress', function () {
            direct('/');
        });
    }

(btn_conteudos != undefined) ? ['click', 'keypress'].forEach(i => btn_conteudos.addEventListener(i, function () {
        direct('/conteudos');
    })) : btn_conteudos;

(btn_iniciar != null) ? ['click', 'keypress'].forEach(i => btn_iniciar.addEventListener(i, function () {
    direct('../dificuldade');
})) : null;

(btn_estatisticas != null) ? ['click', 'keypress'].forEach(i => btn_estatisticas.addEventListener(i, function () {
    direct('estatisticas');
})) : null;

(btn_area_professor != null) ? ['click', 'keypress'].forEach(i => btn_area_professor.addEventListener(i, function () {
    direct('area_professor');
})) : null;

(btn_sobre != null) ? ['click', 'keypress'].forEach(i => btn_sobre.addEventListener(i, function () {
    direct('configuracoes');
})) : null;


let btn_conteudos_1 = document.getElementById('btn_conteudos_1');
let btn_conteudos_2 = document.getElementById('btn_conteudos_2');
let btn_conteudos_3 = document.getElementById('btn_conteudos_3');
let btn_conteudos_4 = document.getElementById('btn_conteudos_4');
let btn_conteudos_5 = document.getElementById('btn_conteudos_5');
let btn_conteudos_6 = document.getElementById('btn_conteudos_6');
let btn_conteudos_7 = document.getElementById('btn_conteudos_7');
let btn_conteudos_8 = document.getElementById('btn_conteudos_8');

(btn_conteudos_1 != null) ? ['click', 'keypress'].forEach(i => btn_conteudos_1.addEventListener(i, function(){
    direct('/conteudos/Unidades_Dezenas_Centenas');
})) : null;

(btn_conteudos_2 != null) ? ['click', 'keypress'].forEach(i => btn_conteudos_2.addEventListener(i, function(){
    direct('/conteudos/Operacoes_Basicas');
})) : null;

// (btn_conteudos_3 != null) ? ['click', 'keypress'].forEach(i => btn_conteudos_3.addEventListener(i, function(){
// })) : null;

// (btn_conteudos_4 != null) ? ['click', 'keypress'].forEach(i => btn_conteudos_4.addEventListener(i, function(){
// })) : null;

// (btn_conteudos_5 != null) ? ['click', 'keypress'].forEach(i => btn_conteudos_5.addEventListener(i, function(){
// })) : null;

(btn_conteudos_6 != null) ? ['click', 'keypress'].forEach(i => btn_conteudos_6.addEventListener(i, function(){
    direct('/conteudos/Fracoes');
})) : null;

(btn_conteudos_7 != null) ? ['click', 'keypress'].forEach(i => btn_conteudos_7.addEventListener(i, function(){
    direct('/conteudos/Porcentagem');
})) : null;

// (btn_conteudos_8 != null) ? ['click', 'keypress'].forEach(i => btn_conteudos_8.addEventListener(i, function(){
// })) : null;


//
let card_1 = document.getElementById('card_1');
let card_2 = document.getElementById('card_2');
let card_3 = document.getElementById('card_3');
let card_4 = document.getElementById('card_4');
let card_5 = document.getElementById('card_5');
let card_6 = document.getElementById('card_6');
let card_7 = document.getElementById('card_7');
let card_8 = document.getElementById('card_8');
let card_9 = document.getElementById('card_9');
let card_10 = document.getElementById('card_10');

const card_link = (card) => {
    let uri_complete = url();
    let card_link = uri_complete + "/" + parseInt(card.children[0].children[1].textContent);

    return card_link;
}

(card_1 != null) ? ['click', 'keypress'].forEach(i => card_1.addEventListener(i, function(){
    direct(card_link(card_1));
})) : null;

(card_2 != null) ? ['click', 'keypress'].forEach(i => card_2.addEventListener(i, function(){
    direct(card_link(card_2));
})) : null;

(card_3 != null) ? ['click', 'keypress'].forEach(i => card_3.addEventListener(i, function(){
    direct(card_link(card_3));
})) : null;

(card_4 != null) ? ['click', 'keypress'].forEach(i => card_4.addEventListener(i, function(){
    direct(card_link(card_4));
})) : null;

(card_5 != null) ? ['click', 'keypress'].forEach(i => card_5.addEventListener(i, function(){
    direct(card_link(card_5));
})) : null;

(card_6 != null) ? ['click', 'keypress'].forEach(i => card_6.addEventListener(i, function(){
    direct(card_link(card_6));
})) : null;

(card_7 != null) ? ['click', 'keypress'].forEach(i => card_7.addEventListener(i, function(){
    direct(card_link(card_7));
})) : null;

(card_8 != null) ? ['click', 'keypress'].forEach(i => card_8.addEventListener(i, function(){
    direct(card_link(card_8));
})) : null;

(card_9 != null) ? ['click', 'keypress'].forEach(i => card_9.addEventListener(i, function(){
    direct(card_link(card_9));
})) : null;

(card_10 != null) ? ['click', 'keypress'].forEach(i => card_10.addEventListener(i, function(){
    direct(card_link(card_10));
})) : null;

let optionArea = document.getElementById('optionArea');
let option = document.getElementById('option');

(optionArea != null) ? ['click', 'keypress'].forEach(i => optionArea.addEventListener(i, function (event) {
    if(event.which == 13){
        if (option.checked)
            option.checked = false;
        else
            option.checked = true;
        }
    localStorage.setItem('mouse', JSON.stringify(option.checked));
    verifyMouse();
})) : null;