<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Configurações</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/configuracoes.css" />
    <link rel="stylesheet" href="../css/geral.css" />
    <link rel="icon" href="../imagens/coruja.png">
</head>
<body onload="focusMessage(100), verifyMouse()">
    <div class="nav-buttons">
        <img class="btn-back" tabindex="2" src="../imagens/Icon_back.png" alt="Botão Voltar" onclick="direct('/')" onkeypress="direct('/')"/>
    </div>
    <div class="container-fluid flex-inline">
        <div class="painel flex-inline align-items-center col-xl-4 col-md-5">
            <div id="title" class="container-fluid menu-header flex-inline align-items-center">
                Configurações
            </div>
            <div class="menu-body">
            <div id="text" class="text-help" tabindex="0">Deseja utilizar mouse? Tecle TAB, ou clique com o mouse para escolher.</div>
                <div class="d-flex justify-content-center">
                    <div id="optionArea" tabindex="1" class="d-flex check-radio">
                        <input id="option" type="checkbox"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/geral.js"></script>
    <script src="../js/link_botoes.js"></script>
    <script src="../js/localStorage.js"></script>
    <script src="../js/ally.min.js"></script>
</body>
</html>