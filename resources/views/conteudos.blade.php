<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Conteúdos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/conteudos.css') }}" />
    <link rel="stylesheet" href="{{ url('/css/geral.css') }}" />
    <link rel="icon" href="{{ url('/imagens/coruja.png') }}">
    <style>
        
    </style>
</head>
<body onload="focusMessage(1200), verifyMouse()">
    <div class="nav-buttons">
        <div class="btn-back" tabindex="2" onclick="direct('/dificuldade')" onkeypress="direct('/dificuldade')">Botão Voltar</div>
        <div id="btn_home" class="btn-home" tabindex="2" >Botão Início</div>
    </div>
    <div class="painel-conteudos">
        <div class="painel-title no-focus-style">
            <h1 id="title" class="title col-lg-3 col-md-4 col-sm-5 col-8">Conteúdos</h1>
            <p id="text" class="text-help" tabindex="0">Selecione o conteúdo com TAB e tecle ENTER para escolher.</p>
        </div>
        @component('layouts.tour', ['title_tour' => "Conteúdos", 'message_tour' => "Escolha um dos conteúdos abaixo para começar os exercícios."]);
        @endcomponent
        <div class="painel-body">
            <div class="cards col-10 col-xl-8 col-sm-10">
                @if($dados['unidades']->qtd_questoes > 0)
                <div style="background-image: url('imagens/unidade-dezena-centena.png')" id="btn_conteudos_1" class="card" tabindex="1">
                    Unidades, Dezenas e Centenas Botão
                </div>
                @endif
                @if($dados['operacoes']->qtd_questoes > 0)
                <div style="background-image: url('imagens/operacoes_basicas.png')" id="btn_conteudos_2" class="card" tabindex="1">
                    Operações Básicas Botão
                </div>
                @endif
                @if($dados['extenso']->qtd_questoes > 0)
                <div style="background-image: url('imagens/extenso.png')" id="btn_conteudos_3" class="card" tabindex="1">
                    Números por Extenso Botão
                </div>
                @endif
                @if($dados['op_diversas']->qtd_questoes > 0)
                <div style="background-image: url('imagens/operacoes_diversas1.png')" id="btn_conteudos_4" class="card" tabindex="1">
                    Operações Diversas Botão
                </div>
                @endif
                @if($dados['romanos']->qtd_questoes > 0)
                <div style="background-image: url('imagens/romanos.png')" id="btn_conteudos_5" class="card" tabindex="1">
                    Números Romanos Botão
                </div>
                @endif
                @if($dados['fracoes']->qtd_questoes > 0)
                <div style="background-image: url('imagens/fracoes.png')" id="btn_conteudos_6" class="card" tabindex="1">
                    Frações Botão
                </div>
                @endif
                @if($dados['porcentagem']->qtd_questoes > 0)
                    <div style="background-image: url('imagens/porcentagem.png')" id="btn_conteudos_7" class="card" tabindex="1">
                        Porcentagem Botão
                    </div>
                @endif
                @if($dados['razao_proporcao']->qtd_questoes > 0)
                <div style="background-image: url('imagens/razao_proporcao.png')" id="btn_conteudos_8" class="card" tabindex="1">
                    Razão e Proporção Botão
                </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{ url('js/geral.js') }}"></script>
    <script src="{{ url('js/link_botoes.js') }}"></script>
    <script src="{{ url('js/ally.min.js') }}"></script>
</body>
</html>