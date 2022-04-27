let pagina_atual = 0, barras_count = 0;

const updateProgress = () => {
    createStorage();
    let contents = {
        0 : document.getElementById('content_1'),
        1 : document.getElementById('content_2'),
        2 : document.getElementById('content_3'),
        3 : document.getElementById('content_4')
    };

    let conteudosElement = {
        0: document.getElementById('conteudo_1'),
        1: document.getElementById('conteudo_2'),
        2: document.getElementById('conteudo_3'),
        3: document.getElementById('conteudo_4'),
    }

    let progress_bars = {
        0 : document.getElementById('progress_bar_1'),
        1 : document.getElementById('progress_bar_2'),
        2 : document.getElementById('progress_bar_3'),
        3 : document.getElementById('progress_bar_4')
    };

    let dados = {
        0 : {
            porcent_acertos: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.unidades_dezenas_centenas).acertos / JSON.parse(localStorage.unidades_dezenas_centenas).feitas))) ? '0%' : ((JSON.parse(localStorage.unidades_dezenas_centenas).acertos / JSON.parse(localStorage.unidades_dezenas_centenas).feitas) * 100).toFixed(1) + "%" : "0%",
            porcent_erros: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.unidades_dezenas_centenas).erros / JSON.parse(localStorage.unidades_dezenas_centenas).feitas))) ? '0%' : ((JSON.parse(localStorage.unidades_dezenas_centenas).erros / JSON.parse(localStorage.unidades_dezenas_centenas).feitas) * 100).toFixed(1) + "%" : "0%",
            feitas: (localStorage != undefined) ? JSON.parse(localStorage.unidades_dezenas_centenas).feitas : "0%"
        },
        1 : {
            porcent_acertos: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.operacoes_basicas).acertos / JSON.parse(localStorage.operacoes_basicas).feitas))) ? '0%' : ((JSON.parse(localStorage.operacoes_basicas).acertos / JSON.parse(localStorage.operacoes_basicas).feitas) * 100).toFixed(1) + "%" : "0%",
            porcent_erros: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.operacoes_basicas).erros / JSON.parse(localStorage.operacoes_basicas).feitas))) ? '0%' : ((JSON.parse(localStorage.operacoes_basicas).erros / JSON.parse(localStorage.operacoes_basicas).feitas) * 100).toFixed(1) + "%" : "0%",
            feitas: (localStorage != undefined) ? JSON.parse(localStorage.operacoes_basicas).feitas : "0%"
        },
        2 : {
            porcent_acertos: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.fracoes).acertos / JSON.parse(localStorage.fracoes).feitas))) ? '0%' : ((JSON.parse(localStorage.fracoes).acertos / JSON.parse(localStorage.fracoes).feitas) * 100).toFixed(1) + "%" : "0%",
            porcent_erros: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.fracoes).erros / JSON.parse(localStorage.fracoes).feitas))) ? '0%' : ((JSON.parse(localStorage.fracoes).erros / JSON.parse(localStorage.fracoes).feitas) * 100).toFixed(1) + "%" : "0%",
            feitas: (localStorage != undefined) ? JSON.parse(localStorage.fracoes).feitas : "0%"
        },
        3 : {
            porcent_acertos: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.porcentagem).acertos / JSON.parse(localStorage.porcentagem).feitas))) ? '0%' : ((JSON.parse(localStorage.porcentagem).acertos / JSON.parse(localStorage.porcentagem).feitas) * 100).toFixed(1) + "%" : "0%",
            porcent_erros: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.porcentagem).erros / JSON.parse(localStorage.porcentagem).feitas))) ? '0%' : ((JSON.parse(localStorage.porcentagem).erros / JSON.parse(localStorage.porcentagem).feitas) * 100).toFixed(1) + "%" : "0%",
            feitas: (localStorage != undefined) ? JSON.parse(localStorage.porcentagem).feitas : "0%"
        }
        // 4 : {
        //     porcent_acertos: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.romanos).acertos / JSON.parse(localStorage.romanos).feitas))) ? '0%' : ((JSON.parse(localStorage.romanos).acertos / JSON.parse(localStorage.romanos).feitas) * 100).toFixed(1) + "%" : "0%",
        //     porcent_erros: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.romanos).erros / JSON.parse(localStorage.romanos).feitas))) ? '0%' : ((JSON.parse(localStorage.romanos).erros / JSON.parse(localStorage.romanos).feitas) * 100).toFixed(1) + "%" : "0%",
        //     feitas: (localStorage != undefined) ? JSON.parse(localStorage.romanos).feitas : "0%"
        // },
        // 5 : {
        //     porcent_acertos: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.fracoes).acertos / JSON.parse(localStorage.fracoes).feitas))) ? '0%' : ((JSON.parse(localStorage.fracoes).acertos / JSON.parse(localStorage.fracoes).feitas) * 100).toFixed(1) + "%" : "0%",
        //     porcent_erros: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.fracoes).erros / JSON.parse(localStorage.fracoes).feitas))) ? '0%' : ((JSON.parse(localStorage.fracoes).erros / JSON.parse(localStorage.fracoes).feitas) * 100).toFixed(1) + "%" : "0%",
        //     feitas: (localStorage != undefined) ? JSON.parse(localStorage.fracoes).feitas : "0%"
        // },
        // 6 : {
        //     porcent_acertos: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.porcentagem).acertos / JSON.parse(localStorage.porcentagem).feitas))) ? '0%' : ((JSON.parse(localStorage.porcentagem).acertos / JSON.parse(localStorage.porcentagem).feitas) * 100).toFixed(1) + "%" : "0%",
        //     porcent_erros: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.porcentagem).erros / JSON.parse(localStorage.porcentagem).feitas))) ? '0%' : ((JSON.parse(localStorage.porcentagem).erros / JSON.parse(localStorage.porcentagem).feitas) * 100).toFixed(1) + "%" : "0%",
        //     feitas: (localStorage != undefined) ? JSON.parse(localStorage.porcentagem).feitas : "0%"
        // },
        // 7 : {
        //     porcent_acertos: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.razao_proporcao).acertos / JSON.parse(localStorage.razao_proporcao).feitas))) ? '0%' : ((JSON.parse(localStorage.razao_proporcao).acertos / JSON.parse(localStorage.razao_proporcao).feitas) * 100).toFixed(1) + "%" : "0%",
        //     porcent_erros: (localStorage != undefined) ? isNaN(((JSON.parse(localStorage.razao_proporcao).erros / JSON.parse(localStorage.razao_proporcao).feitas))) ? '0%' : ((JSON.parse(localStorage.razao_proporcao).erros / JSON.parse(localStorage.razao_proporcao).feitas) * 100).toFixed(1) + "%" : "0%",
        //     feitas: (localStorage != undefined) ? JSON.parse(localStorage.razao_proporcao).feitas : "0%"
        // },
    };

    let conteudos = {
        0: "Unidades, Dezenas e Centenas",
        1: "Operações Básicas",
        2: "Frações",
        3: "Porcentagem"
    }
    
    let barras = {
            0 : unidades_dezenas_centenas,
            1 : operacoes_basicas,
            2: fracoes,
            3: porcentagem
        }

    barras_count = Object.keys(barras).length;
    let bar_progress_array = document.querySelectorAll('.progress');

    for(let i = 0+pagina_atual, j = 0; i < 4+pagina_atual; i++, j++) {
        conteudosElement[j].textContent = conteudos[i];
        contents[j].textContent = dados[i].porcent_acertos + " " + dados[i].porcent_erros + " " + dados[i].feitas;
        progress_bars[j].style.width = dados[i].porcent_acertos;
        if (dados[i].feitas == 0){
            bar_progress_array[j].style.backgroundColor = '#ffffff6e';
        }else{
            bar_progress_array[j].style.backgroundColor = '#d25454';
        }
    }
}

const prox_pagina = () => {
    let seta_esquerda = document.getElementById('seta_esquerda');
    let seta_direita = document.getElementById('seta_direita');

    if(pagina_atual += 3 <= barras_count){
        pagina_atual += 3;
        seta_esquerda.style.display = 'block';
        seta_direita.style.display = 'none';
    }else{
        seta_esquerda.style.display = 'none';
        seta_direita.style.display = 'block';
    }
    updateProgress();
}

const anterior_pagina = () => {
    let seta_esquerda = document.getElementById('seta_esquerda');
    let seta_direita = document.getElementById('seta_direita');

    if (pagina_atual -= 4 >= barras_count){
        pagina_atual -= 4;
        seta_esquerda.style.display = 'none';
        seta_direita.style.display = 'block';
    }else{
        seta_esquerda.style.display = 'block';
        seta_direita.style.display = 'none';
    }
    updateProgress();
}

const infosFocus = (element) => {
    if(element.id == 'info_1')
        document.getElementById('progress_1').classList.add('focus');
    else if(element.id == 'info_2')
        document.getElementById('progress_2').classList.add('focus');
    else if(element.id == 'info_3')
        document.getElementById('progress_3').classList.add('focus');
    else if(element.id == 'info_4')
        document.getElementById('progress_4').classList.add('focus');
}

const removeFocus = () => {
    document.getElementById('progress_1').classList.remove('focus');
    document.getElementById('progress_2').classList.remove('focus');
    document.getElementById('progress_3').classList.remove('focus');
    document.getElementById('progress_4').classList.remove('focus');
}

let btn_clear_statistics = document.getElementById('clear_statistics');

['click', 'keypress'].forEach(i => btn_clear_statistics.addEventListener(i, function(){
    localStorage.removeItem('unidades_dezenas_centenas');
    localStorage.removeItem('operacoes_basicas');
    localStorage.removeItem('escrever_extenso');
    localStorage.removeItem('op_diversas');
    localStorage.removeItem('romanos');
    localStorage.removeItem('fracoes');
    localStorage.removeItem('porcentagem');
    localStorage.removeItem('razao_proporcao');
    updateProgress();
}));