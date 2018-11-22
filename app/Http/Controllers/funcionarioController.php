<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConfAvRegular;
use App\ConfAvFinal;
use App\Disciplina;
use App\Usuario;

class funcionarioController extends Controller
{
    public static function index(){
        $av_regular = ConfAvRegular::first();
        $av_final = ConfAvFinal::first();
        $disciplinas = Disciplina::all()->sortBy('nome');
        $usuarios = Usuario::all()->sortBy('tipo');
        return view('funcionario',compact('av_regular','disciplinas','av_final','usuarios'));
    }

    public function saveConfiguracaoAvalRegular(Request $requisicao)
    {
       $qtdMaxAval = $requisicao->input('qtdMaxAvaliacao');    
       $qtdMinAval = $requisicao->input('qtdMinAvaliacao');
       $isPesoModificavel = $requisicao->input('modificaPeso');
       
       $confAvalRegular = ConfAvRegular::first();
       $confAvalRegular->qtd_provas_max = $qtdMaxAval;
       $confAvalRegular->qtd_provas_min = $qtdMinAval;
       $confAvalRegular->peso_modificavel = $isPesoModificavel;
       $confAvalRegular->save();  

       return redirect()->route('funcionario');
    }

    public function saveConfiguracaoAvalFinal(Request $requisicao){

        $peso_regular = $requisicao->input('pesoRegular');
        $peso_final = $requisicao->input('pesoFinal');

        $confAvFinal = ConfAvFinal::first();
        if($confAvFinal == null)  $confAvFinal = new ConfAvFinal;
        
        $confAvFinal->peso_nota_regular = $peso_regular;
        $confAvFinal->peso_nota_final = $peso_final;
        $confAvFinal->save();

        return redirect()->route('funcionario');
    }

    public function addDisciplina(Request $requisicao){
        $nome =  $requisicao->input('nomeDisciplina');
        $disciplina = new Disciplina;
        if(!($disciplina->check_if_exists($nome))){
            $disciplina->nome = $nome;
            $disciplina->save();
        }
        return redirect()->route('funcionario');
    }

    public function delDisciplina(Request $requisicao, $id){
        $disciplina = Disciplina::find($id);
        $disciplina->delete();
        return redirect()->route('funcionario');
    }
}
