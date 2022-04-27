let itens = [
    item1 = document.getElementById('fase_item1'),
    item2 = document.getElementById('fase_item2'),
    item3 = document.getElementById('fase_item3'),
    item4 = document.getElementById('fase_item4'),
    item5 = document.getElementById('fase_item5'),
    item6 = document.getElementById('fase_item6'),
    item7 = document.getElementById('fase_item7'),
    item8 = document.getElementById('fase_item8'),
    item9 = document.getElementById('fase_item9'),
    item10 = document.getElementById('fase_item10')
]

let cards = [
    card_1 = document.getElementById('card_1'),
    card_2 = document.getElementById('card_2'),
    card_3 = document.getElementById('card_3'),
    card_4 = document.getElementById('card_4'),
    card_5 = document.getElementById('card_5'),
    card_6 = document.getElementById('card_6'),
    card_7 = document.getElementById('card_7'),
    card_8 = document.getElementById('card_8'),
    card_9 = document.getElementById('card_9'),
    card_10 = document.getElementById('card_10')
]

const verifyArrows = (limite) => {
    if (limite > 10){
        showRightArrow();
        document.getElementById('seta_direita').setAttribute('alt', 'Avançar para questões ' + (parseInt(item1.textContent) + 10) + ' até ' + (limite < (parseInt(item10.textContent) + 10) ? limite : (parseInt(item10.textContent) + 10)));
    }
}

const hiddenLeftArrow = () => {
    document.getElementById('seta_esquerda').style.display = 'none';
}

const hiddenRightArrow = () => {
    document.getElementById('seta_direita').style.display = 'none';
}

const showLeftArrow = () => {
    document.getElementById('seta_esquerda').style.display = 'block';
}

const showRightArrow = () => {
    document.getElementById('seta_direita').style.display = 'block';
}

const hiddenCards = (max, index_final) => {
    for (let i = max + 1; i <= index_final + 10; i++) {
        cards[i - index_final - 1].style.display = 'none';
    }
}

const showCards = (limite) => {
    verifyArrows(limite);
    if (limite > 10) limite = 10;
    for (let i = 0; i < limite; i++) {
        cards[i].style.display = 'flex';
    }
}

const next_page = (max) => {
    if(max == undefined || max <= 10){
        hiddenRightArrow();
    }else{
        showLeftArrow();

        let index_item_final = parseInt(item10.textContent);
        let limite = max <= index_item_final + 10 ? max : index_item_final + 10;
        let indexItem = 0;

        for (let i = index_item_final + 1; i <= limite; i++, indexItem++){
            itens[indexItem].textContent = i;
        }

        if (limite < index_item_final + 10 && limite != index_item_final){
            hiddenRightArrow();
            hiddenCards(limite, index_item_final);
        }

        if (document.getElementById('card_2').style.display == 'none'){
            document.getElementById('seta_esquerda').focus();
            setTimeout(function(){
                card_1.focus();
            }, 200);
        }else{
            setTimeout(function () {
                card_1.focus();
            }, 200);
        }

        document.getElementById('seta_esquerda').setAttribute('alt', 'Voltar para questões ' + (parseInt(item1.textContent) - 10) + ' até ' + (parseInt(item1.textContent) - 1));

        if ((parseInt(item1.textContent) + 10) <= max)
            document.getElementById('seta_direita').setAttribute('alt', 'Avançar para questões ' + (parseInt(item1.textContent) + 10) + ' até ' + (((parseInt(item10.textContent) + 10) >= max) ? max : (parseInt(item10.textContent) + 10)));

    }
}

const previous_page = (max) => {
    if (item1.textContent <= 1){
        hiddenLeftArrow();
    }else{
        if (item1.textContent == 11)
            hiddenLeftArrow();

        showCards(max);
        showRightArrow();

        let index_item_inicio = parseInt(item1.textContent);
        let indexItem = 0;
        for (let i = index_item_inicio - 10; i < index_item_inicio; i++, indexItem++){
            itens[indexItem].textContent = i;
        }
        
        if (parseInt(item1.textContent) < 10) {
            document.getElementById('text').focus();
            setTimeout(function () {
                card_1.focus();
            }, 200);
        }else{
            setTimeout(function () {
                card_1.focus();
            }, 10);
        }

        if ((parseInt(item1.textContent)) > 10){
            document.getElementById('seta_esquerda').setAttribute('alt', 'Voltar para questões ' + (parseInt(item1.textContent) - 10) + ' até ' + (parseInt(item1.textContent) - 1));
        }

        document.getElementById('seta_direita').setAttribute('alt', 'Avançar para questões ' + (parseInt(item1.textContent) + 10) + ' até ' + (((parseInt(item10.textContent) + 10) >= max) ? max : (parseInt(item10.textContent) + 10)));
    }
}