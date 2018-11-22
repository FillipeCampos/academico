<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usuario;
use App\ConfAvFinal;
use App\ConfAvRegular;
use App\Avaliacao;
use App\Notas;
use App\Turma;
use Illuminate\Support\Facades\Auth;

class Academico_Controller extends Controller
{
    //Notas 
    public function index()
    {
        return view('master');
    }

    public function cadastrar(Request $requisicao)
    {
       $nome = $requisicao->input('campo_nome');    
       $email = $requisicao->input('campo_email');
       $senha = $requisicao->input('campo_senha');
       $tipo_usuario = $requisicao->input('campo_tipo_usuario');

       $usuario = new Usuario;
       $usuario->nome = $nome;
       $usuario->email = $email;
       $usuario->senha = $senha;
       $usuario->tipo = $tipo_usuario;
       $usuario->save();  

       return view('welcome');  
    }

    public function login(Request $requisicao)
    {
       $email = $requisicao->input('campo_email');
       $senha = $requisicao->input('campo_senha');

       $usuario = Usuario::where('email',$email)->where('senha', $senha)->first();
       $tipoUsuario = $usuario->tipo;
    
   //    Auth::loginUsingId($usuario->id, TRUE);
       switch($tipoUsuario){
          case 'Aluno':
            return view('aluno'); 
          break; 

          case 'Professor':
          return redirect('/professor');
          break;  

          case 'Funcionario' :
            return view('funcionario'); 
          break; 
     }
    
    }

    public function cadastrar_avaliacao(Request $requisicao)
    {
       $qtd_notas_min = $requisicao->input('qtd_provas_min');   
       $turma = $requisicao->input('turmaselecionada');

       for($i=1; $i <= $qtd_notas_min; $i++) {
            //Mapeia e pega os campos do formulário
            $campo_nota_form = 'campo_nota'.$i;
            $campo_nota = $requisicao->input($campo_nota_form);

            $campo_peso_form = 'campo_peso'.$i;
            $campo_peso =  $requisicao->input($campo_peso_form);

            $avaliacao = new Avaliacao;
            $avaliacao->peso = $campo_peso;
            $avaliacao->turma_id = $turma;
            $avaliacao->save();

            $notas = new Notas;
            $notas->nota = $campo_nota;
            $notas->turma_aluno_id = 1;
            $notas->avaliacao_id = $i;
            $notas->save();
        }  
        $requisicao->session()->flash('sucesso', 'Dados inseridos com sucesso!');  
        return redirect('/professor');
    }

}

/* 
---------------------------------------
    EXEMPLO ADICIONAR
---------------------------------------    
   /* $av_regular = ConfAvRegular::first();
        return view('professor')->with('av_regular', $av_regular);     
*/

/*public function adicionar(Request $requisicao)
    {
         
        $entidade = $requisicao->input('entidade');

        switch($entidade) 
        {
           case 'empresa':  
             $nome = $requisicao->input('name'); 
             $empresa = new Empresa;
             
             $empresa->nome = $nome;
             $empresa->save();

             $status = "Empresa adicionada com sucesso!";
             
             return array('data' => $status);

           break; 
           
           case 'exameAdmissional':               
               $estado = $requisicao->input('estadoSaudeA');
               $historico = $requisicao->input('historicoA');
               $data = $requisicao->input('dataA');

               $exameAdmissional = new Exame_Admissional;
               $exameAdmissional->historico = $historico;
               $exameAdmissional->estado_saude = $estado;
               $exameAdmissional->data_admissao = $data;
               $exameAdmissional->save();
               $status = "Exame Admissional adicionado com sucesso!";
             
               return array('data' => $status);
           break;

           case 'risco_ocupacional':
              $nome = $requisicao->input('name'); 
              $consulta_adm = DB::table('exame_admissional')->orderBy('id', 'desc')->first()->id;
               
              $risco = new Risco_Ocupacional;
              $risco->nome = $nome; 
              $risco->id_ex_admissional = $consulta_adm;
              $risco->save(); 
              $status = "Risco ocupacional adicionado com sucesso!";
             
              return array('data' => $status);
                      
           break;


           case 'funcionario':
              $nome = $requisicao->input('name');
              $ocupacao = $requisicao->input('ocupacao'); 
            //  $codigo = $requisicao->input('codigo'); 
              $codigo_int = (int) $ocupacao; 


              $exame_adm = DB::table('exame_admissional')->orderBy('id', 'desc')->first()->id;
              $empresa =  DB::table('empresa')->orderBy('id', 'desc')->first()->id;

              $funcionario = new Funcionario;
              $funcionario->id =  $codigo_int;
              $funcionario->nome = $nome;
              $funcionario->ocupacao = "Algo";
              $funcionario->id_ex_admissional = $exame_adm;
              $funcionario->id_empresa = $empresa;
              $funcionario->save();

              //Preenche tabela relatório de risco
              $riscoNome =  DB::table('risco_ocupacional')->orderBy('id', 'desc')->first()->nome;
              $relatorioRisco = new Relatorio_Risco;
              $relatorioRisco->agente_causador = $riscoNome;
              $relatorioRisco->id_empresa =  $empresa; 
              $relatorioRisco->tipo_risco = "#";
              $relatorioRisco->save();
                 
              $status = "Funcionário adicionado com sucesso!";
             
              return array('data' => $status);

           break;

           case 'ex_demissional':
               $condicao =   $requisicao->input('condicao'); 
               $dataSaida =   $requisicao->input('dataSaida'); 

               $exameDemissional = new Exame_Demissional;
               $exameDemissional->condicao_saude =  $condicao;
               $exameDemissional->data_saida = $dataSaida;
               $exameDemissional->save();

               $status = "Exame Demissional adicionado com sucesso!";
             
               return array('data' => $status);
           break;

           case 'ex_ret_trabalho':
               $condicao = $requisicao->input('condicao'); 
               $statusInss = $requisicao->input('status'); 

               $exameRetornoTrabalho = new Exame_Retorno_Trabalho;
               $exameRetornoTrabalho->condicao_saude = $condicao;
               $exameRetornoTrabalho->status_inss = $statusInss;
               $exameRetornoTrabalho->save();
               $status = "Exame Demissional adicionado com sucesso!";
             
               return array('data' => $status);

           break;

           case 'ex_mud_funcao':
               $status = $requisicao->input('status'); 
               $exame_complementar = $requisicao->input('exameCompl'); 

               $exameMudancaFuncao = new Exame_Mudanca_Funcao;
               $exameMudancaFuncao->status_paciente = $status;
               $exameMudancaFuncao->exame_complementar = $exame_complementar;
               $exameMudancaFuncao->save();
               $status = "Exame Demissional adicionado com sucesso!";
             
               return array('data' => $status);
           break;

           case 'ex_periodico':
               $periodo =  $requisicao->input('periodo');  
               $status =   $requisicao->input('status');  

               $examePeriodico = new Exame_Periodico;
               $examePeriodico->periodo = $periodo;
               $examePeriodico->status_paciente = $status;
               $examePeriodico->save();
               $statusS = "Exame Demissional adicionado com sucesso!";
             
               return array('data' => $statusS);
           break; 

           case 'medico':
              $nomeMedico = $requisicao->input('name');
              $especialidade = $requisicao->input('especialidade');
               
              $funcionarioId = DB::table('funcionario')->orderBy('created_at', 'desc')->first()->id;
              $relatorioId = DB::table('relatorio_risco')->orderBy('id', 'desc')->first()->id;
              
              $medico = new Medico;
              $medico->nome = $nomeMedico;
              $medico->especialidade = $especialidade;
              $medico->id_relatorio = $relatorioId;
              $medico->save();

              $medicoId = DB::table('medico')->orderBy('id', 'desc')->first()->id;

              DB::table('funcionario_medico')->insert(
                 ['funcionario_id' => $funcionarioId, 'medico_id' => $medicoId]
              ); 

              $statusS = "Médico adicionado com sucesso!";
             
              return array('data' => $statusS);
           break;

        }  

    } */

    /*
    --------------------------
      EXEMPLO PESQUISAR
    -------------------------- 
    */

    /*

      $pesquisar_funcionario = Funcionario::where('id','=',$id_conversao)->get()->first();
      $id_funcionario = $pesquisar_funcionario->id;

      AND
      $userRecord = $this->where('email', $email)->where('password', $password)->first();
    
    */  

