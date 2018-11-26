<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Configure extends Command
{

    const TEMPLATE_AVALIACAO_FIXA = 'avaliacao_regular_qtd_fixa';
    const TEMPLATE_AVALIACAO_VARIAVEL= 'avaliacao_regular_qtd_variavel';
    const QTD_FIXA = 1;
    const QTD_VARIAVEL = 2;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'config:avaliacao 
        {qtd: quantidade avaliacoes fixa=1 , variavel=2}
         {final: Tem final sim=s, nao=n}';

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
        $qtd = $this->argument('qtd');
        $temFinal = $this->argument('final') == 's';
        $tipoAvaliacao = ($qtd == QTD_FIXA) ? 'avaliacao_regular_qtd_fixa' : 'avaliacao_regular_qtd_variavel';
        
        $modelTemplate = str_replace(
            ['{{tipoAvaliacao}}'],
            [$tipoAvaliacao],
            $this->getStub('configura_avaliacao')
        );

        $includeAvaliacaoFinal ='';
        if($temFinal) {
            $includeAvaliacaoFinal = "@include('avaliacao_final_conf')";
        }
        $modelTemplate = str_replace(
            ['{{includeAvaliacaoFinal}}'],
            [$includeAvaliacaoFinal],
            $this->getStub('configura_avaliacao')
        );
        

    file_put_contents(app_path("/{$name}.php"), $modelTemplate);
        
    }
    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

}
