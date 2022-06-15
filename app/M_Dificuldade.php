<?php

    namespace App;
    use Illuminate\Database\Eloquent\Model;
    use DB;

    class M_Dificuldade extends Model {
        public function getDificuldade($id){
            $table = DB::select('select * from dificuldade where id = ?', [$id]);
            return $table[0];
        }

        public function limites($questao_peso){
            $dificuldade = session('dificuldade');

            $dados = [
                'min' => null,
                'max' => null
            ];

            $limite = ($dificuldade->max * $questao_peso * 10)/100 <= 5 ? 10 : ($dificuldade->max * $questao_peso * 10)/100;

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

            $dados['min'] = $min;
            $dados['max'] = $max;

            return $dados;
        }
    }