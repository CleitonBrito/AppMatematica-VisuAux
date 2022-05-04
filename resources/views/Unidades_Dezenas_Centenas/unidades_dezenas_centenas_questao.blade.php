<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Questão {{ $dados['fase'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('css/questao.css') }}">
    <link rel="stylesheet" href="{{ url('css/geral.css') }}" />
    <link rel="icon" href="{{ url('imagens/coruja.png') }}">
    <style>
        body{
            background-color: #c9dcf0;
        }

        img.btn-back, img.btn-home, img.btn-conteudos, .text-help, .card, .seta_pagina, .painel-questao, .circle-quest {
            color: #fff;
            background-color: #2b4a68;
        }

        img.btn-back:focus, img.btn-conteudos:focus, img.btn-home:focus, .text-help:focus, .card:focus, .seta_pagina:focus,
        img.btn-back:hover, img.btn-conteudos:hover, img.btn-home:hover, .card:hover, .seta_pagina:hover {
            background-color: #3075b4;
        }

        #questao:focus, #questao:hover {
            background-color:#3075b4;
            box-shadow: 3px 3px 2px 1px #0d263f!important;
        }
    </style>
</head>
<body onload="focusMessage(1000), createStorage(), verifyMouse()">
    <div class="nav-buttons">
        <img class="btn-back" tabindex="2" src="{{ url('imagens/Icon_back.png') }}" alt="Botão Voltar" onclick="direct('/conteudos/Unidades_Dezenas_Centenas')" />
        <img id="btn_conteudos" class="btn-conteudos" tabindex="2" src="{{ url('/imagens/Icon_conteudos.png') }}" alt="Botão Conteúdos"/>
        <img id="btn_home" class="btn-home" tabindex="2" src="{{ url('/imagens/Icon_home.png') }}" alt="Botão Início" />
    </div>
    <div class="painel-conteudos">
        <div class="painel-title no-focus-style">
            <div class="header-quest col-12 col-xl-6 col-lg-7">
                <h1 id="title" class="title">Unidades, Dezenas e Centenas</h1>
                <div class="circle-quest">{{ $dados['fase'] }}</div>
            </div>
            <p id="text" class="text-help" tabindex="0">Tecle TAB para ler a questão, digite a resposta e tecle ENTER.</p>
        </div>
        <div class="painel-body">
            <div class="col-esquerda col-xl-2 col-lg-1">
                @if($dados['fase'] > 1)
                    <img id="seta_esquerda" class="seta_pagina" tabindex="1" src="{{ url('imagens/seta_pagina.png') }}" onclick="<?= "direct('/conteudos/Unidades_Dezenas_Centenas/". intval($dados['fase']-1) ."')" ?>" onkeypress="<?= "direct('/conteudos/Unidades_Dezenas_Centenas/". intval($dados['fase']-1) ."')" ?>"/>
                @endif
            </div>
            <div class="painel-questao">
                <div class="questao-header">
                    <p tabindex="1" id="questao" onkeydown="digite(event, max), verifyResp(event, barema, limite)" onmousedown="verifyResp(event, barema, limite)">Questão {{ $dados['fase'] }} - {{ $dados['questao'][$dados['fase']-1]->questao }} </p>
                </div>
                <div class="questao-body">
                    <div class="questao-msg col-4">
                        <div tabindex="1" id="revisa-resposta" style="display: none;"></div>
                        <p tabindex="1" class="feedback error" onkeydown="digite(event, max), verifyResp(event, barema, limite)" onmousedown="digite(event, max), verifyResp(event, barema, limite)" style="display: none;">Errado! Tente novamente!</p>
                        <p tabindex="1" class="feedback right" onkeydown="digite(event, max), verifyResp(event, barema, limite)" onmousedown="digite(event, max), verifyResp(event, barema, limite)" style="display: none;">Parabéns! Certa Resposta.</p>
                    </div>
                    <div class="questao-resposta col-8">
                        <p id="label-resposta">Resposta</p>
                        <input id="resposta" minlength="1" maxlength="1" type="text" disabled>
                    </div>
                </div>
            </div>
            <div class="col-direita col-xl-2 col-lg-1">
            @if($dados['fase'] < $dados['limite'])
                <img id="seta_direita" class="seta_pagina" tabindex="1" src="{{ url('imagens/seta_pagina.png') }}" onclick="<?= "direct('/conteudos/Unidades_Dezenas_Centenas/". intval($dados['fase']+1) ."')" ?>" onkeypress="<?= "direct('/conteudos/Unidades_Dezenas_Centenas/". intval($dados['fase']+1) ."')" ?>" />
            @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{ url('/js/link_botoes.js') }}"></script>
    <script src="{{ url('/js/geral.js') }}"></script>
    <script src="{{ url('/js/resposta.js') }}"></script>
    <script src="{{ url('/js/localStorage.js') }}"></script>
    <script src="{{ url('/js/ally.min.js') }}"></script>
    <script>
        let barema = "{{ $dados['respostas'][$dados['fase']-1] }}";
        let limite = "{{ $dados['limite'] }}";
        let max = Math.floor(Math.log10(barema)+1);
        document.getElementById("resposta").style.width = .8+.5*max + 'em';
    </script>
</body>
</html>