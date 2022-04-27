<?php

    namespace App;
    use Illuminate\Database\Eloquent\Model;
    use App\M_Aleatoriedade;
    use App\M_Dificuldade;

    class M_Porcentagem extends Model {
        public function genereteNumbersToQuestions($repetir = false){
            $questoes = session('questoes');
            $dificuldade = session('dificuldade');
            $aleatoriedade = new M_Aleatoriedade();
            $tmp_numeros_array = array();
            $numeros = array();
            $tmp_numero;
            $limite;
            $min;
            $max;

            foreach($questoes as $key => $questao){
                $dificuldade = new M_Dificuldade();

                $min = $dificuldade->limites($questao->peso)['min'];
                $max = $dificuldade->limites($questao->peso)['max'];

                if($questao->qtd_numeros > 1){
                    if($questao->juntar == "true"){
                        $tmp_numeros_array = $aleatoriedade->generateNumbers($questao->qtd_numeros, 1, 9, $repetir);
                        $numeros[$key] = $tmp_numeros_array;
                    }else{
                        $tmp_numeros_array = $aleatoriedade->generateNumbers($questao->qtd_numeros, $min, $max, $repetir);
                        $numeros[$key] = $tmp_numeros_array;
                    }
                }else{
                    $tmp_numero = $aleatoriedade->generateNumbers($questao->qtd_numeros, $min, $max, $repetir);
                    while(in_array($tmp_numero, $numeros)){
                        $tmp_numero = $aleatoriedade->generateNumbers($questao->qtd_numeros, $min, $max, $repetir);
                    }
                    $numeros[$key] = $tmp_numero;
                }
                
                if($questao->decrescente == "true"){
                    rsort($numeros[$key]);
                }else if($questao->decrescente == "false"){
                    sort($numeros[$key]);
                }

                if($questao->operacao == "%"){
                    $numeros[$key][0] = rand(1, 100);
                }
            }

            return $numeros;
        }

        public function Porcent(){
            $numero_parte1 = rand(0.01, 100);
            $numero_parte2 = rand(0, 10);
            if($numero_parte2 == 10)
                $numero_parte2 = 0;

            $numero = floatval($numero_parte1.".".$numero_parte2);
            return $numero;
        }

        public function NumberPercent($max){
            $numero_parte1 = rand(0.01, $max);
            $numero_parte2 = rand(0, 10);

            if($numero_parte1 == $max && $numero_parte2 == 10){
                $numero_parte1 = $max - 1;
                $numero_parte2 = 0;
            }

            $numero = floatval($numero_parte1.".".$numero_parte2);
            return $numero;
        }

        public function generatePorcent($qtd = 1, $diferenteDe = null, $repetir = null){
            $numeros = array();

            while(count($numeros) < $qtd){
                $numero = $this->Porcent();
                
                if($repetir == false && $diferenteDe != false){
                    while(in_array($numero, $numeros) || $numero == $diferenteDe){
                        $numero = $this->Porcent();
                    }
                }else if($repetir == false){
                    while(in_array($numero, $numeros)){
                        $numero = $this->Porcent();
                    }
                }

                array_push($numeros, number_format($numero, 1)." %");
            }

            if($qtd > 1)
                return $numeros;
            else
                return $numero;
        }

        public function generateNumberPorcent($qtd = 1, $max, $diferenteDe = null, $repetir = null){
            $numeros = array();

            while(count($numeros) < $qtd){
                $numero = $this->NumberPercent($max);
                
                if($repetir == false && $diferenteDe != false){
                    while(in_array($numero, $numeros) || $numero == $diferenteDe){
                        $numero = $this->NumberPercent($max);
                    }
                }else if($repetir == false){
                    while(in_array($numero, $numeros)){
                        $numero = $this->NumberPercent($max);
                    }
                }

                array_push($numeros, number_format($numero, 2));
            }

            if($qtd > 1)
                return $numeros;
            else
                return $numero;
        }

        public function replaceBarsToNumbers(){
            $questoes = session('questoes');
            $dificuldade = session('dificuldade');
            $numeros = $this->genereteNumbersToQuestions();

            foreach($numeros as $key => $numero){
                if($questoes[$key]->juntar == "true"){
                    $numeros[$key] = $this->juntar($numero);
                }

                $string = '';
                $string = $questoes[$key]->questao;
                if(is_array($numero)){
                    foreach($numero as $code => $numero_numero){
                        $patterns[] = '/\|/';
                        $replacements = array();
                        $replacements[$code] = $numero_numero;
                        $string = preg_replace($patterns, $replacements, $string, 1);
                        $patterns = array();
                    }
                }else{
                    $patterns[] = '/\|/';
                    $string = preg_replace($patterns, $numero, $string, 1);
                    $patterns = array();
                }
                $questoes[$key]->questao = $string;
            }
            
            return $numeros;
        }

        public function generateAlternatives(){
            $questoes = session('questoes');
            $numeros_questoes = session('questao_numeros');
            $respostas = array();
            $aleatoriedade = new M_Aleatoriedade();
            $operacoes = new M_Operacoes();
            $dificuldade = new M_Dificuldade();

            foreach($questoes as $key => $questao){
                $alternatives = array();
                if($questao->operacao == "%"){
                    $resposta = ($numeros_questoes[$key][0] * $numeros_questoes[$key][1]) / 100;
                    $alternatives = $this->generateNumberPorcent($qtd = 3, $numeros_questoes[$key][1], $diferenteDe = $resposta);
                }else{
                    $resposta = number_format(($numeros_questoes[$key][0] / $numeros_questoes[$key][1])*100, 1)." %";
                    $alternatives = $this->generatePorcent($qtd = 3, $diferenteDe = $resposta);
                }
                $alternatives[3] = $resposta;
                shuffle($alternatives);
                $respostas[$key] = $alternatives;
            }

            return $respostas;
        }

        public function respostas(){
            $questoes = session('questoes');
            $questao_numeros = session('questao_numeros');
            $respostas = array();

            foreach($questoes as $key => $questao){
                $resposta = null;
                if($questao->operacao == "%"){
                    $resposta = ($questao_numeros[$key][0] * $questao_numeros[$key][1]) / 100;
                }else{
                    $resposta = number_format(($questao_numeros[$key][0] / $questao_numeros[$key][1])*100, 1)." %";
                }
                array_push($respostas, $resposta);
            }

            return $respostas;
        }
    }