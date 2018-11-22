<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    protected $fillable = [
      'id',  
      'nota',
      'turma_aluno_id',
      'avaliacao_id'
    ];

    protected $table = 'notas'; 

    public function aluno()
    {
       return $this->belongsTo(TurmaAlunos::class, 'turma_aluno_id');
    }

    public function avaliacao()
    {
       return $this->belongsTo(Avaliacao::class, 'avaliacao_id');
    }
}
