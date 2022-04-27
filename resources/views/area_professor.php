<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Conteúdos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/geral.css" />
    <link rel="stylesheet" href="../css/area_professor.css">
    <link rel="icon" href="../imagens/coruja.png">
</head>
<body onload="focusMessage(1200), verifyMouse()">
    <div class="nav-buttons">
        <img class="btn-back" tabindex="2" src="../imagens/Icon_back.png" alt="Botão Voltar" onclick="direct('/')" onkeypress="direct('/')"/>
    </div>
    <div class="painel-conteudos">
        <div class="painel-title no-focus-style">
            <div class="header-title col-12 col-xl-6 col-lg-7">
                <h1 id="title" class="title">Área do Professor</h1>
            </div>
            <p id="text" class="text-help" tabindex="0">Tecle TAB para ler a descrição.</p>
        </div>
        <div class="painel-body">
            <div class="painel-questao col-9">
                <div class="header-infos">
                    <h4 tabindex="1" class="title-info text-center">Olá, Professor!</h4>
                </div>
                <div class="body-infos">
                    <p tabindex="1" class="questao">Esse site tem como objetivo auxiliar alunos com deficência visual no aprendizado da disciplina de matemática. Portanto, deve ser utilizado como complemento às atividades desenvolvidas em sala de aula. Aqui é abordado conteúdos sobre: <em>Unidades, Dezenas e Centenas</em>, <em>Operações Básicas</em>, <em>Escrever por extenso</em>, <em>Operações Diversas I</em>, <em>Números Romanos</em>, <em>Frações</em>, <em>Porcentagem</em> e <em>Razão e Proporção</em>.</p>
                    <p tabindex="1" class="questao">No menu tem a opção de <a tabindex="1" href="/estatisticas"><em>Estatísticas</em></a> na qual é possível analisar os acertos, erros e quantidade de questões feitas por cada conteúdo. A avaliação pedagógica quanto ao nível de aprendizagem do aluno fica livre, à seu critério.</p>
                    <p tabindex="1" class="questao">Pode ser utilizado tanto por pessoas deficientes visuais, quanto por pessoas videntes. É possível utilizar com um leitor de tela, recomenda-se utilizar o NVDA. Vamos começar?</p>
                    <div class="footer-infos">
                        <div tabindex="1" id="btn_iniciar" class="btn btn-light">Iniciar</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/geral.js"></script>
    <script src="../js/link_botoes.js"></script>
    <script src="../js/ally.min.js"></script>
</body>