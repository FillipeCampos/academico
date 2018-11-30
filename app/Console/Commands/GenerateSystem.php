<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateSystem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:system';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new aplication';


    protected $paths_to_not_copy = array();
    protected $pathfiles_to_not_copy = array();
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->paths_to_not_copy = [
            base_path('app'.DIRECTORY_SEPARATOR.'Console'.DIRECTORY_SEPARATOR.'stubs')
        ];
        $this->pathfiles_to_not_copy = [
            base_path('app'.DIRECTORY_SEPARATOR.'Http'.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'funcionarioController.php'),
            base_path('resources'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'funcionario.blade.php')
        ];

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('Qual o nome da pasta?');
        $dst= dirname(base_path('')). DIRECTORY_SEPARATOR .$name;
        $this->copy_paths($dst);
    }

    public function copy_paths($dest){
        $source =  base_path('');
        mkdir($dest, 0755);
        foreach (
        $iterator = new \RecursiveIteratorIterator(
        new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS),
        \RecursiveIteratorIterator::SELF_FIRST) as $item
        ) 
        {
            if(!in_array($item->getPath(),$this->paths_to_not_copy) && !in_array($item->getPathName(),$this->pathfiles_to_not_copy)){
                if ($item->isDir()) {
                    mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
                } else {
                    copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
                }
            }
        }
    }
}
