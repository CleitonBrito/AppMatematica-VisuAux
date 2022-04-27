var unidades_dezenas_centenas = [], operacoes_basicas = [], escrever_extenso = [], dados = [], mouse;

const createStorage = () => {
    if(!localStorage.unidades_dezenas_centenas) {
        unidades_dezenas_centenas = {
            acertos: 0,
            erros: 0,
            feitas: 0
        };
        localStorage.setItem('unidades_dezenas_centenas', JSON.stringify(unidades_dezenas_centenas));
    }else{
        unidades_dezenas_centenas = {
            acertos: JSON.parse(localStorage.getItem('unidades_dezenas_centenas')).acertos,
            erros: JSON.parse(localStorage.getItem('unidades_dezenas_centenas')).erros,
            feitas: JSON.parse(localStorage.getItem('unidades_dezenas_centenas')).feitas
        }
    }

    if (!localStorage.operacoes_basicas){
        operacoes_basicas = {
            acertos: 0,
            erros: 0,
            feitas: 0
        }
        localStorage.setItem('operacoes_basicas', JSON.stringify(operacoes_basicas));
    }else{
        operacoes_basicas = {
            acertos: JSON.parse(localStorage.getItem('operacoes_basicas')).acertos,
            erros: JSON.parse(localStorage.getItem('operacoes_basicas')).erros,
            feitas: JSON.parse(localStorage.getItem('operacoes_basicas')).feitas
        };
    }

    if (!localStorage.escrever_extenso){
        escrever_extenso = {
            acertos: 0,
            erros: 0,
            feitas: 0
        }
        localStorage.setItem('escrever_extenso', JSON.stringify(escrever_extenso));
    }else{
        escrever_extenso = {
            acertos: JSON.parse(localStorage.getItem('escrever_extenso')).acertos,
            erros: JSON.parse(localStorage.getItem('escrever_extenso')).erros,
            feitas: JSON.parse(localStorage.getItem('escrever_extenso')).feitas
        };
    }

    if (!localStorage.op_diversas){
        op_diversas = {
            acertos: 0,
            erros: 0,
            feitas: 0
        }
        localStorage.setItem('op_diversas', JSON.stringify(op_diversas));
    }else{
        op_diversas = {
            acertos: JSON.parse(localStorage.getItem('op_diversas')).acertos,
            erros: JSON.parse(localStorage.getItem('op_diversas')).erros,
            feitas: JSON.parse(localStorage.getItem('op_diversas')).feitas
        };
    }

    if (!localStorage.romanos){
        romanos = {
            acertos: 0,
            erros: 0,
            feitas: 0
        }
        localStorage.setItem('romanos', JSON.stringify(romanos));
    }else{
        romanos = {
            acertos: JSON.parse(localStorage.getItem('romanos')).acertos,
            erros: JSON.parse(localStorage.getItem('romanos')).erros,
            feitas: JSON.parse(localStorage.getItem('romanos')).feitas
        };
    }

    if (!localStorage.fracoes){
        fracoes = {
            acertos: 0,
            erros: 0,
            feitas: 0
        }
        localStorage.setItem('fracoes', JSON.stringify(fracoes));
    }else{
        fracoes = {
            acertos: JSON.parse(localStorage.getItem('fracoes')).acertos,
            erros: JSON.parse(localStorage.getItem('fracoes')).erros,
            feitas: JSON.parse(localStorage.getItem('fracoes')).feitas
        };
    }

    if (!localStorage.porcentagem){
        porcentagem = {
            acertos: 0,
            erros: 0,
            feitas: 0
        }
        localStorage.setItem('porcentagem', JSON.stringify(porcentagem));
    }else{
        porcentagem = {
            acertos: JSON.parse(localStorage.getItem('porcentagem')).acertos,
            erros: JSON.parse(localStorage.getItem('porcentagem')).erros,
            feitas: JSON.parse(localStorage.getItem('porcentagem')).feitas
        };
    }

    if (!localStorage.razao_proporcao){
        razao_proporcao = {
            acertos: 0,
            erros: 0,
            feitas: 0
        }
        localStorage.setItem('razao_proporcao', JSON.stringify(razao_proporcao));
    }else{
        razao_proporcao = {
            acertos: JSON.parse(localStorage.getItem('razao_proporcao')).acertos,
            erros: JSON.parse(localStorage.getItem('razao_proporcao')).erros,
            feitas: JSON.parse(localStorage.getItem('razao_proporcao')).feitas
        };
    }

    if (!localStorage.mouse) {
        mouse = true;
        localStorage.setItem('mouse', JSON.stringify(mouse));
    }
}

const SaveStorage = (content, type) => {
    conteudo = eval(content);
    console.log();
    if(type === 'acertos'){
        conteudo.acertos += 1;
        conteudo.feitas += 1;
        localStorage.setItem(content, JSON.stringify(conteudo));
    } else if (type === 'erros'){
        conteudo.feitas += 1;
        conteudo.erros += 1;
        localStorage.setItem(content, JSON.stringify(conteudo));
    }
}
