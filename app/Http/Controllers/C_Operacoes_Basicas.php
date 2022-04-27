<?php
    namespace App\Http\Controllers;
    use App\M_Aleatoriedade;
    use App\M_Conteudos;
    use App\M_Operacoes;
    use Session;

    class C_Operacoes_Basicas extends Controller {
        public function fases($fase = null) {
            $aleatoriedade = new M_Aleatoriedade();
            $conteudos = new M_Conteudos();
            $operacoes = new M_Operacoes();
            $dificuldade = session('dificuldade');

            if($fase == null){
                Session::put('questoes', $conteudos->getQuestoesBanco($conteudo = 2, $dificuldade = $dificuldade->id));
                Session::put('questao_numeros', $aleatoriedade->replaceBarsToNumbers());
                Session::put('respostas', $operacoes->respostas());
                Session::put('alternativas', $aleatoriedade->generateAlternatives());
                $limite = count(session('questoes'));
                return view('/Operacoes_Basicas/operacoes_basicas', ['limite' => $limite]);
            }

            $dados = [
                'fase' => $fase,
                'questao' => session('questoes'),
                'alternativas' => session('alternativas'),
                'respostas' => session('respostas'),
                'limite' => count(session('questoes'))
            ];

            if($fase >= 1 && $fase <= $dados['limite']){
                return view('/Operacoes_Basicas/operacoes_basicas_questao', ['dados' => $dados]);
            }else{
                return redirect('conteudos/Operacoes_Basicas');
            }
        }
    }