<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/geral.css" />
    <link rel="icon" href="../imagens/coruja.png">
</head>
<body onload="focusMessage(100), createStorage(), verifyMouse()">
    <div class="container-fluid flex-inline">
        <div class="painel flex-inline align-items-center col-xl-4 col-md-5">
            <div id="title" class="container-fluid menu-header flex-inline align-items-center">
                Menu
            </div>
            <div class="menu-body">
            <div id="text" class="text-help" tabindex="0">Selecione uma opção usando TAB e tecle ENTER.</div>
                <ul id="list-menu" class="d-flex flex-column text-center">
                    <li><div id="btn_iniciar" class="btn-menu p-2 m-2 bd-highlight rounded-3" tabindex="1">Iniciar</div></li>
                    <li><div id="btn_estatisticas" class="btn-menu p-2 m-2 bd-highlight rounded-3" tabindex="1">Estatísticas</div></li>
                    <li><div id="btn_area_professor" class="btn-menu p-2 m-2 bd-highlight rounded-3" tabindex="1">Área do Professor</div></li>
                    <li><div id="btn_sobre" class="btn-menu p-2 m-2 bd-highlight rounded-3" tabindex="1">Configurações</div></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="../js/geral.js"></script>
    <script src="../js/link_botoes.js"></script>
    <script src="../js/localStorage.js"></script>
    <script src="../js/ally.min.js"></script>
</body>
</html>