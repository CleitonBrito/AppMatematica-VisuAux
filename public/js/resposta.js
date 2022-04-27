let resposta = '', conteudo, mode, link;

let feedback_error = document.querySelector('.feedback.error');
let feedback_right = document.querySelector('.feedback.right');

const feedBackAnswerDefault = () => {
    feedback_error.style.display = "none";
    feedback_right.style.display = "none";
}

const digite = (event, max) => {
    if (event.keyCode == 8 && resposta != '')
        apaga();
    else if (event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode >= 96 && event.keyCode <= 105){
        if(resposta.length < max){
            resposta += event.key;
        } 
    }
    document.getElementById('resposta').value = resposta;
}

const apaga = () => {
    arrayResp = resposta.substring(0, resposta.length - 1);
    resposta = arrayResp;
}

const verifyResp = (event, valor, limite) => {
    if ((event.which == 1 || event.which == 13) && document.getElementById('resposta').value != ''){

        link = window.location.pathname;
        array_link = link.split("/");

        feedBackAnswerDefault();

        document.getElementById('revisa-resposta').style.display = "grid";
        document.getElementById('revisa-resposta').textContent = 'Você respondeu: ' + resposta;

        if(valor == resposta){
            feedback_right.style.display = "block";
            document.getElementById('revisa-resposta').focus();

            setTimeout(function(){
                document.querySelector('.feedback.right').focus();

                let tempo_acerto = setTimeout(function () {
                    nova_questao = parseInt(document.querySelector('.circle-quest').textContent) + 1;

                    if(nova_questao <= limite)
                        direct('/conteudos/' + array_link[2] + '/' + nova_questao);
                    else
                        direct('/conteudos/' + array_link[2]);

                }, 5600);
                
                cancelTime(tempo_acerto);
                conteudo = array_link[2].toLowerCase();
                mode = "acertos";
                SaveStorage(conteudo, mode);

            }, 200);
        }else{
            feedback_error.style.display = "block";

            document.getElementById('revisa-resposta').focus();
            setTimeout(function () {
                document.querySelector('.feedback.error').focus();
            }, 50);

            document.getElementById('resposta').value = '';

            conteudo = array_link[2].toLowerCase();
            mode = "erros";
            SaveStorage(conteudo, mode);
        }
        resposta = '';
    }
}

let AlternativeCorrectAnswer = null;
let limiteQuestoes = 0;

const CorrectAnswerAlternative = (barema, limite) => {
    AlternativeCorrectAnswer = barema;
    limiteQuestoes = limite;
}

const verifyAlternative = (el) => {
    link = window.location.pathname;
    array_link = link.split("/");

    feedBackAnswerDefault();
    resposta = el.textContent;

    document.getElementById('revisa-resposta').style.display = "grid";
    document.getElementById('revisa-resposta').textContent = 'Você respondeu: ' + resposta;

    if (resposta == AlternativeCorrectAnswer){
        feedback_right.style.display = "block";
        document.getElementById('revisa-resposta').focus();

        setTimeout(function () {
            document.querySelector('.feedback.right').focus();

            let tempo_acerto = setTimeout(function () {
                nova_questao = parseInt(document.querySelector('.circle-quest').textContent) + 1;

                if (nova_questao <= limiteQuestoes)
                    direct('/conteudos/' + array_link[2] + '/' + nova_questao);
                else
                    direct('/conteudos/' + array_link[2]);

            }, 5600);

            cancelTime(tempo_acerto);
            conteudo = array_link[2].toLowerCase();
            mode = "acertos";
            SaveStorage(conteudo, mode);

        }, 200);
    }else{
        feedback_error.style.display = "block";

        document.getElementById('revisa-resposta').focus();
        setTimeout(function () {
            document.querySelector('.feedback.error').focus();
        }, 50);

        conteudo = array_link[2].toLowerCase();
        mode = "erros";
        SaveStorage(conteudo, mode);
    }
}

let alternatives = document.querySelectorAll('.alternatives');
let options = document.querySelectorAll('.options');

if(alternatives != undefined && options != undefined){
    for(let i = 0; i < alternatives.length; i++) {
        options[i].addEventListener('click', function(){
            verifyAlternative(alternatives[i]);
        });
        options[i].addEventListener('keypress', function(){
            verifyAlternative(alternatives[i]);
        });
    }
}