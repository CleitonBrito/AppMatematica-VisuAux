<?php

    namespace App;
    use App\M_Conteudos;
    use App\M_Operacoes;
    use Illuminate\Database\Eloquent\Model;
    use Session;

    class M_Aleatoriedade extends Model {
        public function generateNumbers($qtd = 1, $min, $max, $diferenteDe = false, $repetir = false){
            $numeros = array();

            while(count($numeros) < $qtd){
                $numero = rand($min, $max);
                
                if($repetir == false && $diferenteDe != false){
                    while($numero == $diferenteDe){
                        list($usec, $sec) = explode(' ', microtime());
                        $seed =  $sec + $usec * 1000000;
                        srand($seed);
                        $numero = rand($min, 100);
                    }
                }else if($repetir == false){
                    while(in_array($numero, $numeros)){
                        $numero = rand($min, $max);
                    }
                }

                array_push($numeros, $numero);
            }

            if($qtd > 1)
                return $numeros;
            else
                return $numero;
        }

        public function genereteNumbersToQuestions($repetir = false){
            $questoes = session('questoes');
            $dificuldade = session('dificuldade');
            $tmp_numeros_array = array();
            $numeros = array();
            $tmp_numero;
            $limite;
            $min;
            $max;

            foreach($questoes as $key => $questao){
                $limite = ($dificuldade->max * $questao->peso * 10)/100;

                if($limite > $dificuldade->min || $limite >= $dificuldade->max)
                    $min = $dificuldade->min;
                else if ($limite < $dificuldade->min || $limite < $dificuldade->max)
                    $min = $limite;

                if ($limite < $dificuldade->min)
                    $max = $dificuldade->min;
                else if ($limite == $dificuldade->min)
                    $max = $dificuldade->max;
                else if ($limite > $dificuldade->min)
                    $max = $limite;


                if($questao->qtd_numeros > 1){
                    if($questao->juntar == "true"){
                        $tmp_numeros_array = $this->generateNumbers($questao->qtd_numeros, 1, 9, $repetir);
                        $numeros[$key] = $tmp_numeros_array;
                    }else{
                        $tmp_numeros_array = $this->generateNumbers($questao->qtd_numeros, $min, $max, $repetir);
                        $numeros[$key] = $tmp_numeros_array;
                    }
                }else{
                    $tmp_numero = $this->generateNumbers($questao->qtd_numeros, $min, $max, $repetir);
                    while(in_array($tmp_numero, $numeros)){
                        $tmp_numero = $this->generateNumbers($questao->qtd_numeros, $min, $max, $repetir);
                    }
                    $numeros[$key] = $tmp_numero;
                }
                
                if($questao->decrescente == "true"){
                    rsort($numeros[$key]);
                }else if($questao->decrescente == "false"){
                    sort($numeros[$key]);
                }
            }

            return $numeros;
        }

        public function generateAlternatives(){
            $questoes = session('questoes');
            $numeros_questoes = session('questao_numeros');
            $respostas = array();
            $operacoes = new M_Operacoes();

            foreach($questoes as $key => $questao){
                $alternatives = array();
                $resposta = $operacoes->operacao($numeros_questoes[$key], $questao->operacao);
                $alternatives = $this->generateNumbers($qtd = 3, $min = $operacoes->limiteToOperacoes($questao->peso, $questao->operacao)['min'], $max = $operacoes->limiteToOperacoes($questao->peso, $questao->operacao)['max'], $diferenteDe = $resposta);
                $alternatives[3] = $resposta;
                shuffle($alternatives);
                $respostas[$key] = $alternatives;
            }

            return $respostas;
        }

        public function juntar($array_numeros){
            $juntar = null;

            foreach($array_numeros as $numero){
                while($numero > 9 || $array_numeros[0] < 1){
                    $numero = rand(0,9);
                }
                $juntar .= $numero;
            }
            return intval($juntar);
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

        public function NumberToName($number){

            $hyphen      = '-';
            $conjunction = ' e ';
            $separator   = ', ';
            $negative    = 'menos ';
            $decimal     = ' ponto ';
            $dictionary  = array(
                0                   => 'zero',
                1                   => 'um',
                2                   => 'dois',
                3                   => 'três',
                4                   => 'quatro',
                5                   => 'cinco',
                6                   => 'seis',
                7                   => 'sete',
                8                   => 'oito',
                9                   => 'nove',
                10                  => 'dez',
                11                  => 'onze',
                12                  => 'doze',
                13                  => 'treze',
                14                  => 'quatorze',
                15                  => 'quinze',
                16                  => 'dezesseis',
                17                  => 'dezessete',
                18                  => 'dezoito',
                19                  => 'dezenove',
                20                  => 'vinte',
                30                  => 'trinta',
                40                  => 'quarenta',
                50                  => 'cinquenta',
                60                  => 'sessenta',
                70                  => 'setenta',
                80                  => 'oitenta',
                90                  => 'noventa',
                100                 => array('cento', 'cem'),
                200                 => 'duzentos',
                300                 => 'trezentos',
                400                 => 'quatrocentos',
                500                 => 'quinhentos',
                600                 => 'seiscentos',
                700                 => 'setecentos',
                800                 => 'oitocentos',
                900                 => 'novecentos',
                1000                => 'mil',
                1000000             => array('milhão', 'milhões'),
                1000000000          => array('bilhão', 'bilhões'),
                1000000000000       => array('trilhão', 'trilhões'),
                1000000000000000    => array('quatrilhão', 'quatrilhões'),
                1000000000000000000 => array('quinquilhão', 'quinquilhões')
            );

            if (!is_numeric($number)) {
                return false;
            }

            if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
                trigger_error(
                    'convert_number_to_words só aceita números entre ' . PHP_INT_MAX . ' à ' . PHP_INT_MAX,
                    E_USER_WARNING
                );
                return false;
            }

            if ($number < 0) {
                return $negative . $this->NumberToName(abs($number));
            }

            $string = $fraction = null;

            if (strpos($number, '.') !== false) {
                list($number, $fraction) = explode('.', $number);
            }

            switch (true) {
                case $number < 21:
                    $string = $dictionary[$number];
                    break;
                case $number < 100:
                    $tens   = ((int) ($number / 10)) * 10;
                    $units  = $number % 10;
                    $string = $dictionary[$tens];
                    if ($units) {
                        $string .= $conjunction . $dictionary[$units];
                    }
                    break;
                case $number < 1000:
                    $hundreds = floor($number / 100) * 100;
                    $remainder = $number % 100;
                    if($number < 200){
                        if($remainder){
                            $string = $dictionary[$hundreds][0] . $conjunction . $this->NumberToName($remainder);
                        }else{
                            $string = $dictionary[$hundreds][1];
                        }
                    }else{
                        if($remainder){
                            $string = $dictionary[$hundreds] . $conjunction . $this->NumberToName($remainder);
                        }else{
                            $string = $dictionary[$hundreds];
                        }	
                    }
                    break;
                default:
                    $baseUnit = pow(1000, floor(log($number, 1000)));
                    $numBaseUnits = (int) ($number / $baseUnit);	
                    $remainder = $number % $baseUnit;
                    if($baseUnit == 1000){
                        if($numBaseUnits == 1){
                            $string = $dictionary[$baseUnit];
                        }else{
                            $string = $this->NumberToName($numBaseUnits).' '.$dictionary[$baseUnit];	
                        }
                    }else{
                        if($numBaseUnits == 1){
                            $string = $this->NumberToName($numBaseUnits).' '.$dictionary[$baseUnit][0];
                        }else{
                            $string = $this->NumberToName($numBaseUnits).' '.$dictionary[$baseUnit][1];
                        }
                    }

                    if(($remainder < 100 || $numBaseUnits % 100 == 0) && $remainder != 0){
                        $string .= $conjunction.' '.$this->NumberToName($remainder);
                    }else if($remainder!=0){
                        $string .= $separator.' '.$this->NumberToName($remainder);	
                    }
                break;
            }

            if (null !== $fraction && is_numeric($fraction)) {
                $string .= $decimal;
                $words = array();
                foreach (str_split((string) $fraction) as $number) {
                    $words[] = $dictionary[$number];
                }
                $string .= implode(' ', $words);
            }
            return $string;
        }

    }