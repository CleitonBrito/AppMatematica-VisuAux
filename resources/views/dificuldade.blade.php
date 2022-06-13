<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Dificuldade</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/dificuldade.css" />
    <link rel="stylesheet" href="../css/geral.css" />
    <link rel="icon" href="../imagens/coruja.png">
</head>
<body onload="verifyMouse(), focusMessage(1250)">
    <div class="nav-buttons">
        <img class="btn-back" tabindex="1" src="../imagens/Icon_back.png" alt="Botão Voltar" onclick="direct('/')" onkeypress="direct('/')" />
    </div>
    <div class="container-fluid flex-inline">
        <div class="painel flex-inline align-items-center col-xl-4 col-md-5">
            <div id="title" class="container-fluid menu-header flex-inline align-items-center">
                Dificuldade
            </div>
            <div class="menu-body">
            <div id="text" class="text-help" tabindex="0">Selecione a dificuldade com TAB e tecle ENTER.</div>
                <ul id="list-menu" class="d-flex flex-column text-center">
                    @if($dados['facil']->qtd_questoes > 0)
                        <li><div id="btn_facil" class="btn-menu p-2 m-2 bd-highlight rounded-3" tabindex="1" data-toggle="modal" data-target="#modalQuestoes" onclick="defineDificuldade('f')">Fácil</div></li>
                    @endif
                    @if($dados['medio']->qtd_questoes > 0)
                        <li><div id="btn_medio" class="btn-menu p-2 m-2 bd-highlight rounded-3" tabindex="1" data-toggle="modal" data-target="#modalQuestoes" onclick="defineDificuldade('m')">Médio</div></li>
                    @endif
                    @if($dados['dificil']->qtd_questoes > 0)
                        <li><div id="btn_dificil" class="btn-menu p-2 m-2 bd-highlight rounded-3" tabindex="1" data-toggle="modal" data-target="#modalQuestoes" onclick="defineDificuldade('d')">Difícil</div></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <form id="form_qtd_questoes" method="POST" action="/dificuldade/">
        @csrf
        <div class="modal fade" id="modalQuestoes" tabindex="-1" role="dialog" aria-labelledby="modalQuestoesTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 tabindex="0" class="modal-title" id="exampleModalLongTitle" >Tecle TAB, digite a quantidade de quetões para cada conteúdo e tecle ENTER para começar.</h5>
                </div>
                <div class="modal-body">
                    <input tabindex="0" type="number" name="qtd_questoes" id="qtd_questoes" min="0">
                    <input type="hidden" name="dificuldade" id="dificuldade">
                </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ url('../js/geral.js') }}"></script>
    <script src="{{ url('../js/link_botoes.js') }}"></script>
    <script src="{{ url('../js/ally.min.js') }}"></script>
    <script>
        if ($('#modalQuestoes').length){
            $('#modalQuestoes').on('shown.bs.modal', function () {
                $('.modal-title').focus();
            });
        }
    </script>
</body>
</html>