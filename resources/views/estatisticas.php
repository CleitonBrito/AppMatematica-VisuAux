<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Estatísticas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/estatisticas.css">
    <link rel="stylesheet" href="../css/geral.css" />
    <link rel="icon" href="../imagens/coruja.png">
</head>
<body onload="focusMessage(800), updateProgress(), verifyMouse()">
    <div class="nav-buttons">
        <img class="btn-back" tabindex="2" src="../imagens/Icon_back.png" alt="Botão Voltar" onclick="direct('/')" onkeypress="direct('/')"/>
    </div>
    <div class="painel-conteudos">
        <div class="painel-head">
            <div class="col-10">
                <div class="painel-title no-focus-style">
                    <h1 id="title" class="title col-xl-5 col-lg-6 col-md-7 col-sm-7">Estatísticas</h1>
                    <p id="text" class="text-help" tabindex="0">Navegue com TAB para ver detalhes.</p>
                </div>
            </div>
            <div class="col-2">
                <div id="clear_statistics" tabindex="2" class="btn btn-danger clear-estatistics">Limpar Estatísticas</div>
            </div>
        </div>
        <div class="painel-body">
            <div class="col-esquerda col-2">
                <img style="display: none" id="seta_esquerda" class="seta_pagina" tabindex="1" src="../imagens/seta_pagina.png" onclick="anterior_pagina()" onkeypress="anterior_pagina()"  alt="Voltar para outros conteúdos"/>
            </div>
            <div class="conteudos">
                <div tabindex="1" class="labels-estatistics">
                    <div class="col-7">
                            Conteúdos
                        </div>
                        <div id="label" class="col-5 spacing_1">
                            Acertos<sub><b>(%)</b></sub> Erros<sub><b>(%)</b></sub> Feitas
                        </div>
                </div>
                <div class="estatistics-contents">
                    <div id="info_1" tabindex="1" onfocus="infosFocus(this)" onblur="removeFocus()" class="infos-estatistics">
                        <div id="conteudo_1" class="col-7">
                        </div>
                        <div id="content_1" class="col-5 spacing_2">
                            0% 0% 0
                        </div>
                    </div>
                    <div id="progress_1" class="progress">
                        <div id="progress_bar_1" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="estatistics-contents">
                    <div id="info_2" tabindex="1" onfocus="infosFocus(this)" onblur="removeFocus()" class="infos-estatistics">
                        <div id="conteudo_2" class="col-7">
                        </div>
                        <div id="content_2" class="col-5 spacing_2">
                            0% 0% 0
                        </div>
                    </div>
                    <div id="progress_2" class="progress">
                        <div id="progress_bar_2" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="estatistics-contents">
                    <div id="info_3" tabindex="1" onfocus="infosFocus(this)" onblur="removeFocus()" class="infos-estatistics">
                        <div id="conteudo_3" class="col-7">
                        </div>
                        <div id="content_3" class="col-5 spacing_2">
                            0% 0% 0
                        </div>
                    </div>
                    <div id="progress_3" class="progress">
                        <div id="progress_bar_3" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="estatistics-contents">
                    <div id="info_4" tabindex="1" onfocus="infosFocus(this)" onblur="removeFocus()" class="infos-estatistics">
                        <div id="conteudo_4" class="col-7">
                        </div>
                        <div id="content_4" class="col-5 spacing_2">
                            0% 0% 0
                        </div>
                    </div>
                    <div id="progress_4" class="progress">
                        <div id="progress_bar_4" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <div class="col-direita col-2">
                <img style="display: none;" id="seta_direita" class="seta_pagina" tabindex="1" src="../imagens/seta_pagina.png" onclick="prox_pagina()" onkeypress="prox_pagina()"  alt="Avançar para outros conteúdos"/>
            </div>
        </div>
    </div>
    <script src="../js/geral.js"></script>
    <script src="../js/link_botoes.js"></script>
    <script src="../js/estatisticas.js"></script>
    <script src="../js/localStorage.js"></script>
    <script src="../js/ally.min.js"></script>
</body>
</html>