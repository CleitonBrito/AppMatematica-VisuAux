<?php

    namespace App\Http\Controllers;
    use App\M_Conteudos;

    class C_Conteudos extends Controller {
        public function index(){
            $dificuldade = session('dificuldade');
            $conteudos = new M_Conteudos();

            $dados = [
                'unidades' => $conteudos->getQtdQuestoesConteudo($id_conteudo = 1, $dificuldade->id),
                'operacoes' => $conteudos->getQtdQuestoesConteudo($id_conteudo = 2, $dificuldade->id),
                'extenso' => $conteudos->getQtdQuestoesConteudo($id_conteudo = 3, $dificuldade->id),
                'op_diversas' => $conteudos->getQtdQuestoesConteudo($id_conteudo = 4, $dificuldade->id),
                'romanos' => $conteudos->getQtdQuestoesConteudo($id_conteudo = 5, $dificuldade->id),
                'fracoes' => $conteudos->getQtdQuestoesConteudo($id_conteudo = 6, $dificuldade->id),
                'porcentagem' => $conteudos->getQtdQuestoesConteudo($id_conteudo = 7, $dificuldade->id),
                'razao_proporcao' => $conteudos->getQtdQuestoesConteudo($id_conteudo = 8, $dificuldade->id)
            ];

            return view('conteudos', ['dados' => $dados]);
        }
    }