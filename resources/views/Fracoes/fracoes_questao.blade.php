<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Questão {{ $dados['fase'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/questao.css') }}">
    <link rel="stylesheet" href="{{ url('/css/geral.css') }}" />
    <link rel="icon" href="{{ url('/imagens/coruja.png') }}">
    <style>
        body{
            background-color: #92914271;
        }

        img.btn-back, img.btn-conteudos, img.btn-home, .text-help, .card, .seta_pagina, .painel-questao, .circle-quest {
            color: #fff;
            background-color: #423801;
        }

        img.btn-back:focus, img.btn-conteudos:focus, img.btn-home:focus, .text-help:focus, .card:focus, .seta_pagina:focus,
        img.btn-back:hover, img.btn-conteudos:hover, img.btn-home:hover, .card:hover, .seta_pagina:hover {
            background-color: #666404;
        }

        #questao:focus, #questao:focus, .alternative .options:focus,
        #questao:hover, #questao:hover, .alternative .options:hover {
            background-color: #666404;
            box-shadow: 3px 3px 2px 1px #25250e;
        }
    </style>
    <script>
        let barema = "{{ $dados['respostas'][$dados['fase']-1] }}";
        let limite = "{{ $dados['limite'] }}";
    </script>
</head>
<body onload="focusMessage(1000), createStorage(), verifyMouse(), CorrectAnswerAlternative(barema, limite)">
    <div class="nav-buttons">
        <img class="btn-back" tabindex="2" src="{{ url('/imagens/Icon_back.png') }}" alt="Botão Voltar" onclick="direct('/conteudos/Fracoes')" onkeypress="direct('/conteudos/Fracoes')"/>
        <img id="btn_conteudos" class="btn-conteudos" tabindex="2" src="{{ url('/imagens/icon_conteudos.png') }}" alt="Botão Conteúdos"/>
        <img id="btn_home" class="btn-home" tabindex="2" src="{{ url('/imagens/Icon_home.png') }}" alt="Botão Início"/>
    </div>
    <div class="painel-conteudos">
        <div class="painel-title no-focus-style">
            <div class="header-quest  col-12 col-xl-6 col-lg-7">
                <h1 id="title" class="title col-6">Frações</h1>
                <div class="circle-quest">{{ $dados['fase'] }}</div>
            </div>
            <p id="text" class="text-help" tabindex="0">Tecle TAB para ler a questão, selecione a alternativa e clique ENTER.</p>
        </div>
        <div class="painel-body">
            <div class="col-esquerda col-xl-2 col-lg-1">
                @if($dados['fase'] > 1):
                    <img id="seta_esquerda" class="seta_pagina" tabindex="1" src="{{ url('/imagens/seta_pagina.png') }}" onclick="<?= "direct('/conteudos/Fracoes/". intval($dados['fase']-1) ."')" ?>" onkeypress="<?= "direct('/conteudos/Fracoes/". intval($dados['fase']-1) ."')" ?>"/>
                @endif
            </div>
            <div class="painel-questao">
                <div class="questao-header">
                    <p tabindex="1" id="questao">Questão {{ $dados['fase'] }} - {{ $dados['questao'][$dados['fase']-1]->questao }} </p>
                </div>
                <div class="questao-body">
                    <div class="questao-msg col-5">
                        <div tabindex="1" id="revisa-resposta" style="display: none;"></div>
                        <p tabindex="1" class="feedback error" style="display: none;">Errado! Tente novamente!</p>
                        <p tabindex="1" class="feedback right" style="display: none;">Parabéns! Certa Resposta.</p>
                    </div>
                    <div class="questao-alternative col-7">
                        <ul class="alternative">
                            <li class="options" tabindex="1">A)&nbsp; <div class="alternatives" id="alternative_1">{{ $dados['alternativas'][$dados['fase']-1][0] }}</div></li>
                            <li class="options" tabindex="1">B)&nbsp; <div class="alternatives" id="alternative_2">{{ $dados['alternativas'][$dados['fase']-1][1] }}</div></li>
                            <li class="options" tabindex="1">C)&nbsp; <div class="alternatives" id="alternative_3">{{ $dados['alternativas'][$dados['fase']-1][2] }}</div></li>
                            <li class="options" tabindex="1">D)&nbsp; <div class="alternatives" id="alternative_4">{{ $dados['alternativas'][$dados['fase']-1][3] }}</div></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-direita col-xl-2 col-lg-1">
                @if($dados['fase'] < $dados['limite']):
                    <img id="seta_direita" class="seta_pagina" tabindex="1" src="{{ url('/imagens/seta_pagina.png') }}" onclick="<?= "direct('/conteudos/Fracoes/". intval($dados['fase']+1) ."')" ?>" onkeypress="<?= "direct('/conteudos/Fracoes/". intval($dados['fase']+1) ."')" ?>" />
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{ url('/js/geral.js') }}"></script>
    <script src="{{ url('/js/link_botoes.js') }}"></script>
    <script src="{{ url('/js/resposta.js') }}"></script>
    <script src="{{ url('/js/localStorage.js') }}"></script>
    <script src="{{ url('/js/ally.min.js') }}"></script>
</body>
</html>