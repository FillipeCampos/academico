<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ConfAvFinal;
use App\ConfAvRegular;
use App\Turma;
use App\Avaliacao;
use App\Disciplina;
use Illuminate\Support\Facades\Auth;

class Professor extends Controller
{
    //
    public function index()
    {
        $av_regular = ConfAvRegular::first();
        $turma = Turma::all();

        return view('professor')->with('av_regular', $av_regular)->with('turma', $turma);
    }

    public function listarDisciplinas()
    {         
        $disciplinas = Disciplina::with(['turmas'=> function($q) {
            return $q;
          //   return $q->where('usuario_id', $userId);
        }])->get();
 
      //  dd($turma->toArray()); 
        
        return view('listardisciplinas')->with('disciplinas', $disciplinas);
    }

    public function definirPlanoEnsino(){
        return view('planoensino');
    }

    public function gerenciarTurma($id){
        $av_regular = ConfAvRegular::first();
        $pesoNotas = Avaliacao::where('turma_id', $id);

        return view('gerenciarTurmas')->with('av_regular', $av_regular)->with('pesoNotas', $pesoNotas)
              ->with('idTurma',$id);
    }

}
