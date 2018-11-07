<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    //
    protected $fillable = [
        'id',  
        'peso',
        'turma_id'
      ];
  
      protected $table = 'turma_alunos';

      public function turma()
      {
        return $this->belongsTo(Turma::class, 'turma_id');
      }
}
