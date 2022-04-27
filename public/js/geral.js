const direct = (caminho) => {
    window.location.href = caminho;
}

const focusMessage = (time) => {
    document.getElementById('title').focus();
    let tempo_focus = setTimeout(function () {
        if (isNaN(document.querySelector('.circle-quest'))){
            let fase = parseInt(document.querySelector('.circle-quest').textContent);
            if (fase == 1){
                document.getElementById('text').focus(); 
            }else{
                document.getElementById('questao').focus();
            }
        }else{
            document.getElementById('text').focus();
        }

    }, time);

    cancelTime(tempo_focus);

    ally.maintain.tabFocus({
        context: document,
    });
}

const cancelTime = (elm) => {
    document.addEventListener('keydown', function (event) {
        if (event.keyCode == 9 || event.keyCode == 13) {
            clearTimeout(elm);
        }
    });
}

const url = (limite) => {
    $link = window.location.pathname;

    if(limite != undefined){
        $array_link = $link.split("/");
        let $novo_link = "";

        (limite > $array_link.length) ? limite = $array_link.length : limite = limite;

        for (let i = 1; i < limite; i++) {
            $novo_link += $array_link[i] + "/";
        }
    }else{
        $novo_link = $link;
    }

    return $novo_link;
}

const onlyNumbers = (event) => {
    if (event.keyCode == 13) {
        verifyResp();
    } else if (event.keyCode >= 40 && event.keyCode <= 47)
        return event.preventDefault();
    else if ((event.charCode >= 48 && event.charCode <= 57)) {
        return event.charCode;
    }
}

const verifyMouse = () => {
    document.body.style.cursor = 'none';

    if(localStorage.mouse == 'false'){
        document.onpointerlockchange = false;
        document.body.style.pointerEvents = 'none';
    }else if (localStorage.mouse == 'true'){
        document.body.style.cursor = '';
        document.body.style.pointerEvents = '';
        if (document.getElementById('option') != undefined) document.getElementById('option').checked = true;
    }
}

const defineDificuldade = (dificuldade) => {
    $('#dificuldade').val(dificuldade);
    $('#form_qtd_questoes').attr('action', '/dificuldade/' + dificuldade);
}