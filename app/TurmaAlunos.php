<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmaAlunos extends Model
{
    //
    protected $fillable = [
        'id',  
        'turma_id',
        'usuario_id'
      ];
  
      protected $table = 'turma_alunos';

      public function turma()
      {
        return $this->belongsTo(Turma::class, 'turma_id');
      }

      public function aluno()
      {
        return $this->belongsTo(Usuario::class, 'usuario_id');
      }
}
