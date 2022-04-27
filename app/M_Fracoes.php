<?php
    namespace App;
    use Illuminate\Database\Eloquent\Model;
    use App\M_Aleatoriedade;
    use App\M_Dificuldade;
    use DB;

    class M_Fracoes extends Model {
        public function respostas(){
            $questoes = session('questoes');
            $questao_numeros = session('questao_numeros');
            $respostas = array();

            foreach($questoes as $key => $questao){
                $resposta = null;
                $resposta = $questao_numeros[$key][1]. " / ".$questao_numeros[$key][0];
                array_push($respostas, $resposta);
            }

            return $respostas;
        }

        public function generateAlternatives(){
            $questoes = session('questoes');
            $resposta = $this->respostas();
            $aleatoriedade = new M_Aleatoriedade();
            $dificuldade = new M_Dificuldade();
            $geral_alternativas = array();

            foreach($questoes as $key => $questao){
                $alternatives = array();
                $numeros = array();

                for($i = 0; $i < 3; $i++){
                    do {
                        $numeros = $aleatoriedade->generateNumbers($qtd = 2, $min = $dificuldade->limites($questao->peso)['min'], $max = $dificuldade->limites($questao->peso)['max'], $diferenteDe = false, $repetir = false);
                        $nova_alternativa = $numeros[1]." / ".$numeros[0];
                    }while(in_array($nova_alternativa, $alternatives));
                    array_push($alternatives, $nova_alternativa);
                }
                $alternatives[3] = $resposta[$key];
                shuffle($alternatives);

                $geral_alternativas[$key] = $alternatives;
            }

            return $geral_alternativas;
        }
    }