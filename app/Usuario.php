<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $fillable = [
        'id',  
        'nome',
        'email',
        'senha',
        'tipo'
      ];
  
      protected $table = 'usuario';

      public function turma_alunos()
      {
        return $this->hasMany(TurmaAlunos::class, 'usuario_id');
      }

      public function turma()
      {
        return $this->hasMany(Turma::class, 'usuario_id');
      }
}
