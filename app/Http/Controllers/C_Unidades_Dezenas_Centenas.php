<?php

    namespace App\Http\Controllers;
    use App\M_Aleatoriedade;
    use App\M_Conteudos;
    use Session;
    use DB;

    class C_Unidades_Dezenas_Centenas extends Controller {
        public function fases($fase = null) {          
            $aleatoriedade = new M_Aleatoriedade();
            $conteudos = new M_Conteudos();
            $dificuldade = session('dificuldade');

            if($fase == null){
                Session::put('questoes', $conteudos->getQuestoesBanco($conteudo = 1, $dificuldade = $dificuldade->id));
                Session::put('respostas', $aleatoriedade->replaceBarsToNumbers());
                $limite = count(session('questoes'));
                return view('/Unidades_Dezenas_Centenas/unidades_dezenas_centenas', ['limite' => $limite]);
            }

            $dados = [
                'fase' => $fase,
                'questao' => session('questoes'),
                'respostas' => session('respostas'),
                'limite' => count(session('questoes'))
            ];

            if($fase >= 1 && $fase <= $dados['limite']){
                return view('Unidades_Dezenas_Centenas/unidades_dezenas_centenas_questao', ['dados' => $dados]);
            }else{
                return redirect('conteudos/Unidades_Dezenas_Centenas');
            }
        }

    }