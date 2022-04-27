<?php
    namespace App\Http\Controllers;
    use App\M_Aleatoriedade;
    use App\M_Conteudos;
    use App\M_Fracoes;
    use Session;

    class C_Fracoes extends Controller {
        public function fases($fase = null){
            $aleatoriedade = new M_Aleatoriedade();
            $conteudos = new M_Conteudos();
            $fracoes = new M_Fracoes();
            $dificuldade = session('dificuldade');

            if($fase == null){
                Session::put('questoes', $conteudos->getQuestoesBanco($conteudo = 6, $dificuldade = $dificuldade->id));
                Session::put('questao_numeros', $aleatoriedade->replaceBarsToNumbers());
                Session::put('respostas', $fracoes->respostas());
                Session::put('alternativas', $fracoes->generateAlternatives());
                $limite = count(session('questoes'));
                return view('/Fracoes/fracoes', ['limite' => $limite]);
            }

            $dados = [
                'fase' => $fase,
                'questao' => session('questoes'),
                'alternativas' => session('alternativas'),
                'respostas' => session('respostas'),
                'limite' => count(session('questoes'))
            ];

            if($fase >= 1 && $fase <= $dados['limite']){
                return view('/Fracoes/fracoes_questao', ['dados' => $dados]);
            }
        }
    }