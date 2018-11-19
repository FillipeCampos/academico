<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConfAvRegular;

class funcionarioController extends Controller
{
    public function saveConfiguracao(Request $requisicao)
    {
       $qtdMaxAval = $requisicao->input('qtdMaxAvaliacao');    
       $qtdMinAval = $requisicao->input('qtdMinAvaliacao');
       $isPesoModificavel = $requisicao->input('modificaPeso');
       
       $confAvalRegular = ConfAvRegular::first();
       $confAvalRegular->qtd_provas_max = $qtdMaxAval;
       $confAvalRegular->qtd_provas_min = $qtdMinAval;
       $confAvalRegular->peso_modificavel = $isPesoModificavel;
       $confAvalRegular->save();  

       $av_regular = ConfAvRegular::first();
       return view('funcionario')->with('av_regular', $av_regular);  
    }
}
