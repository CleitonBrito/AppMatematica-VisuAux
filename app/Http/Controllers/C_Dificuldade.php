<?php

    namespace App\Http\Controllers;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Http\Request;
    use App\M_Dificuldade;
    use App\M_Conteudos;
    use Session;

    class c_Dificuldade extends Controller {
        public function index(Request $request){
            $dificuldade = new M_Dificuldade();
            $conteudos = new M_Conteudos();

            $dados = [
                'facil' => $conteudos->getQtdQuestoesDificuldade($id_dificuldade = 1),
                'medio' => $conteudos->getQtdQuestoesDificuldade($id_dificuldade = 2),
                'dificil' => $conteudos->getQtdQuestoesDificuldade($id_dificuldade = 3)
            ];

            Session::put('qtd_questoes', intval($request->qtd_questoes));

            if($request->dificuldade == NULL){
                return view('dificuldade', ['dados' => $dados]);
            }
            else if($request->dificuldade == "f"){
                Session::put('dificuldade', $dificuldade->getDificuldade(1));
            }
            else if($request->dificuldade == "m"){
                Session::put('dificuldade', $dificuldade->getDificuldade(2));
            }
            else if($request->dificuldade == "d"){
                Session::put('dificuldade', $dificuldade->getDificuldade(3));
            }else
                return redirect()->route('dificuldade');

            return redirect()->route('conteudos');
        }
    }