<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Porcentagem | Questões</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/fases.css') }}" />
    <link rel="stylesheet" href="{{ url('/css/geral.css') }}" />
    <link rel="icon" href="{{ url('/imagens/coruja.png') }}">
    <style>
        body{
            background-color: #b334343f;
        }

        img.btn-back, img.btn-home, .text-help, .card, .seta_pagina {
            color: #fff;
            background-color: #660707;
        }

        img.btn-back:focus, img.btn-home:focus, .text-help:focus, .card:focus, .seta_pagina:focus,
        img.btn-back:hover, img.btn-home:hover, .card:hover, .seta_pagina:hover {
            background-color: #af1818;
        }
    </style>
    <script>
        let limite_questoes = {{ $limite }};
    </script>
</head>
<body onload="focusMessage(2500), showCards(limite_questoes), verifyMouse()">
    <div class="nav-buttons">
        <img class="btn-back" tabindex="2" src="{{ url('/imagens/Icon_back.png') }}" alt="Botão Voltar" onclick="direct('/conteudos')" onkeypress="direct('/conteudos')"/>
        <img id="btn_home" class="btn-home" tabindex="2" src="{{ url('/imagens/Icon_home.png') }}" alt="Botão Início" />
    </div>
    <div class="painel-conteudos">
        <div class="painel-title no-focus-style">
            <h1 id="title" class="title col-xl-3 col-lg-4 col-md-5 col-sm-5">Porcentagem</h1>
            <p id="text" class="text-help" tabindex="0">Selecione a questão com TAB e tecle ENTER para começar.</p>
        </div>
        <div class="painel-body">
            <div class="col-esquerda col-1">
                <img id="seta_esquerda" class="seta_pagina" tabindex="1" src="{{ url('/imagens/seta_pagina.png') }}" onclick="previous_page(limite_questoes)" onkeypress="previous_page(limite_questoes)" style="display: none;"/>
            </div>
            <div class="cards">
                <div id="card_1" class="card" tabindex="1">
                    <div class="card_fases">
                        <div class="card_questao">QUESTÃO</div>
                        <div id="fase_item1" class="card_fase">1</div>
                    </div>
                </div>
                <div id="card_2"  class="card" tabindex="1">
                    <div class="card_fases">
                        <div class="card_questao">QUESTÃO</div>
                        <div id="fase_item2" class="card_fase">2</div>
                    </div>
                </div>
                <div id="card_3" class="card" tabindex="1">
                    <div class="card_fases">
                        <div class="card_questao">QUESTÃO</div>
                        <div id="fase_item3" class="card_fase">3</div>
                    </div>
                </div>
                <div id="card_4" class="card" tabindex="1">
                    <div class="card_fases">
                        <div class="card_questao">QUESTÃO</div>
                        <div id="fase_item4" class="card_fase">4</div>
                    </div>
                </div>
                <div id="card_5" class="card" tabindex="1">
                    <div class="card_fases">
                        <div class="card_questao">QUESTÃO</div>
                        <div id="fase_item5" class="card_fase">5</div>
                    </div>
                </div>
                <div id="card_6" class="card" tabindex="1">
                    <div class="card_fases">
                        <div class="card_questao">QUESTÃO</div>
                        <div id="fase_item6" class="card_fase">6</div>
                    </div>
                </div>
                <div id="card_7" class="card" tabindex="1">
                    <div class="card_fases">
                        <div class="card_questao">QUESTÃO</div>
                        <div id="fase_item7" class="card_fase">7</div>
                    </div>
                </div>
                <div id="card_8" class="card" tabindex="1">
                    <div class="card_fases">
                        <div class="card_questao">QUESTÃO</div>
                        <div id="fase_item8" class="card_fase">8</div>
                    </div>
                </div>
                <div id="card_9" class="card" tabindex="1">
                    <div class="card_fases">
                        <div class="card_questao">QUESTÃO</div>
                        <div id="fase_item9" class="card_fase">9</div>
                    </div>
                </div>
                <div id="card_10" class="card" tabindex="1">
                    <div class="card_fases">
                        <div class="card_questao">QUESTÃO</div>
                        <div id="fase_item10" class="card_fase">10</div>
                    </div>
                </div>
            </div>
            <div class="col-direita col-1">
                <img id="seta_direita" class="seta_pagina" tabindex="1" src="{{ url('/imagens/seta_pagina.png') }}" onclick="next_page(limite_questoes)" onkeypress="next_page(limite_questoes)" style="display: none;"/>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{ url('/js/geral.js') }}"></script>
    <script src="{{ url('/js/link_botoes.js') }}"></script>
    <script src="{{ url('/js/pages_fases.js') }}"></script>
    <script src="{{ url('/js/ally.min.js') }}"></script>
</body>
</html>