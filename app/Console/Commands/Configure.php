<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

const TEMPLATE_AVALIACAO_FIXA = 'avaliacao_regular_qtd_fixa';
const TEMPLATE_AVALIACAO_VARIAVEL= 'avaliacao_regular_qtd_variavel';
const QTD_FIXA = 1;
const QTD_VARIAVEL = 2;

class Configure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'config:avaliacao 
        {--qtd= : quantidade avaliacoes fixa - 1, variavel - 2}
        {--final= : Tem final sim - s, nao - n}
        {--base_path : caminho raiz}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configura a aplicação de acordo com as features informadas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {     
        $this->controller();
        $this->geraViewFuncionario();
    }

    /**
     * Gera view baseado nos requisitos
     */
    public function geraViewFuncionario()
    {
        $base_path = $this->option('base_path');   
        $qtd = $this->option('qtd');
        $temFinal = $this->option('final') == 's';
        $tipoAvaliacao = ($qtd == QTD_FIXA) ? 'avaliacao_regular_qtd_fixo' : 'avaliacao_regular_qtd_variavel';

        $nav_tab_final = '<a class="nav-item nav-link" id="nav-aval-fin-tab" data-toggle="tab" href="#nav-aval-fin" role="tab" aria-controls="nav-aval-fin" aria-selected="false">Avaliação Final</a>';

        $modelTemplate = str_replace(
            ['{{tipoAvaliacao}}'],
            [$tipoAvaliacao],
            $this->getStub('configura_avaliacao')
        );

        $includeAvaliacaoFinal = '';

        if($temFinal) {
            $includeAvaliacaoFinal = "@include('avaliacao_final_conf')";
            $modelTemplate = str_replace(
                ['{{nav-aval-fin-tab}}'],
                [$nav_tab_final],
                $modelTemplate
            );
        }

        $modelTemplate = str_replace(
            ['{{includeAvaliacaoFinal}}'],
            [$includeAvaliacaoFinal],
            $modelTemplate
        );

        $modelTemplate = str_replace(
            ['{{nav-aval-fin-tab}}'],
            [''],
            $modelTemplate
        );
        
        file_put_contents($base_path.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'funcionario.blade.php', $modelTemplate);
    }

    protected function getStub($type)
    {
        return file_get_contents(app_path("Console/stubs/$type.stub"));
    }

    protected function controller()
    {
        $base_path = $this->option('base_path');   
        $temFinal = $this->option('final') == 's';

        if($temFinal){
            $var = ['{{av_final_first}}' =>'$av_final = ConfAvFinal::first();',
            '{{av_final_var}}' => "'av_final',"];
        }else{
            $var = ['{{av_final_first}}' => '',
            '{{av_final_var}}' => '' ];
        }
        

        $controllerTemplate = str_replace(
            ['{{av_final_first}}'],
            [$var['{{av_final_first}}']],
            $this->getStub('Controller')
        );

        $controllerTemplate = str_replace(
            ['{{av_final_var}}'],
            [$var['{{av_final_var}}']],
            $controllerTemplate
        );

      file_put_contents($base_path.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Http'.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'funcionarioController.php', $controllerTemplate);
    }

}
