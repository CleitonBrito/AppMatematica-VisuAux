<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class M_Conteudos extends Model {
    public function getQuestoesBanco($id_conteudo, $dificuldade, $operacao = null){
        $qtd_questoesConteudoDificuldade = $this->getQtdQuestoesConteudoDificuldade($id_conteudo, $dificuldade);
        if($operacao == null){

            if ($qtd_questoesConteudoDificuldade > session('qtd_questoes')){
                $table = DB::select('select * from questoes where id_conteudo = ? and id_dificuldade = ? Limit ?', [$id_conteudo, $dificuldade, session('qtd_questoes')]);
            }else{
                $table = DB::select('select * from questoes where id_conteudo = ? and id_dificuldade = ?', [$id_conteudo, $dificuldade]);
            }
        }else{
            if ($qtd_questoesConteudoDificuldade > session('qtd_questoes')){
                $table = DB::select('select * from questoes where id_conteudo = ? and id_dificuldade = ? and operacao = ? Limit ?', [$id_conteudo, $dificuldade, $operacao, session('qtd_questoes')]);
            }else{
                $table = DB::select('select * from questoes where id_conteudo = ? and id_dificuldade = ? and operacao = ?', [$id_conteudo, $dificuldade, $operacao]);
            }
        }
        
        return $table;
    }

    public function getQuestaoBanco($id_questao, $id_conteudo, $dificuldade){
        $table = DB::select('select * from questoes where id_questao = ? and id_conteudo = ? and id_dificuldade = ?', [$id_questao, $id_conteudo, $dificuldade]);
        return $table;
    }

    public function getQtdQuestoesConteudo($id_conteudo, $id_dificuldade){
        $qtd_questoes = DB::select('select COUNT(*) as qtd_questoes from questoes where id_conteudo = ? and id_dificuldade = ?', [$id_conteudo, $id_dificuldade])[0];
        return $qtd_questoes;
    }

    public function getQtdQuestoesDificuldade($id_dificuldade){
        $qtd_questoes = DB::select('select COUNT(*) as qtd_questoes from questoes where id_dificuldade = ?', [$id_dificuldade])[0];
        return $qtd_questoes;
    }

    public function getQtdQuestoesConteudoDificuldade($id_conteudo, $id_dificuldade){
        $qtd_questoes = DB::select('select COUNT(*) as qtd_questoes from questoes where id_conteudo = ? and id_dificuldade = ?', [$id_conteudo, $id_dificuldade])[0];
        return $qtd_questoes->qtd_questoes;
    }


}