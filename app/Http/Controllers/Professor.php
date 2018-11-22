<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ConfAvFinal;
use App\ConfAvRegular;
use App\Turma;
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
      /*  $userId = Auth::user();
        dd($userId);
        $turma = Disciplina::with(['turma'=> function($q) use($userId){
            return $q;
             return $q->where('usuario_id', $userId);
        }])->get();
 
        dd($turma->toArray()); */

        return view('listardisciplinas');
    }

    public function definirPlanoEnsino(){
        return view('planoensino');
    }


}
