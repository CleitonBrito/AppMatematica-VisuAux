<?php
    namespace App\Http\Controllers;
    use App\M_Porcentagem;
    use App\M_Conteudos;
    use Session;

    class C_Porcentagem extends Controller {
        public function fases($fase = null){
            $conteudos = new M_Conteudos();
            $porcentagem = new M_Porcentagem();
            $dificuldade = session('dificuldade');

            if($fase == null){
                Session::put('questoes', $conteudos->getQuestoesBanco($conteudos = 7, $dificuldade = $dificuldade->id));
                Session::put('questao_numeros', $porcentagem->replaceBarsToNumbers());
                Session::put('respostas', $porcentagem->respostas());
                Session::put('alternativas', $porcentagem->generateAlternatives());
                $limite = count(session('questoes'));
                return view('/Porcentagem/porcentagem', ['limite' => $limite]);
            }

            $dados = [
                'fase' => $fase,
                'questao' => session('questoes'),
                'alternativas' => session('alternativas'),
                'respostas' => session('respostas'),
                'limite' => count(session('questoes'))
            ];

            if($fase >= 1 && $fase <= $dados['limite']){
                return view('/Porcentagem/porcentagem_questao', ['dados' => $dados]);
            }else{
                return redirect('conteudos/Porcentagem');
            }
        }
    }