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
        {--final= : Tem final sim - s, nao - n}';

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
        $this->geraViewFuncionario();
    }

    /**
     * Gera view baseado nos requisitos
     */
    public function geraViewFuncionario()
    {
        $qtd = $this->option('qtd');
        $temFinal = $this->option('final') == 's';
        $tipoAvaliacao = ($qtd == QTD_FIXA) ? 'avaliacao_regular_qtd_fixa' : 'avaliacao_regular_qtd_variavel';

        $modelTemplate = str_replace(
            ['{{tipoAvaliacao}}'],
            [$tipoAvaliacao],
            $this->getStub('configura_avaliacao')
        );

        $includeAvaliacaoFinal = '';

        if($temFinal) {
            $includeAvaliacaoFinal = "@include('avaliacao_final_conf')";
        }

        $modelTemplate = str_replace(
            ['{{includeAvaliacaoFinal}}'],
            [$includeAvaliacaoFinal],
            $modelTemplate
        );

        file_put_contents(resource_path("/views/funcionarioxxxxxxxx.blade.php"), $modelTemplate);
    }

    protected function getStub($type)
    {
        return file_get_contents(app_path("Console/stubs/$type.stub"));
    }

}
