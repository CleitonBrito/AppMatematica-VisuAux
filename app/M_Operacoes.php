<?php

    namespace App;
    use Illuminate\Database\Eloquent\Model;
    use App\M_Dificuldade;

    class M_Operacoes extends Model {
        public function respostas(){
            $questoes = session('questoes');
            $questao_numeros = session('questao_numeros');
            $respostas = array();

            foreach($questoes as $key => $questao){
                $resposta = null;
                $resposta = $this->operacao($questao_numeros[$key], $questao->operacao);
                array_push($respostas, $resposta);
            }

            return $respostas;
        }

        public function operacao($numeros, $tipo){
            if($tipo == "+"){
                return array_sum($numeros);
            }else if($tipo == "-"){
                return $numeros[0] - $numeros[1];
            }else if($tipo == "*"){
                return $numeros[0] * $numeros[1];
            }
        }

        public function limiteToOperacoes($questao_peso, $tipo){
            $dificuldade = session('dificuldade');
            $dificuldade = new M_Dificuldade();

            $dados = [
                'min' => null,
                'max' => null
            ];

            $dados['min'] = $dificuldade->limites($questao_peso)['min'];
            $dados['max'] = $dificuldade->limites($questao_peso)['max'];

            if($tipo == "+")
                $dados['max'] += $dados['max'];
            else if($tipo == "*")
                $dados['max'] *= $dados['max'];

            return $dados;
        }
    }