<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Usuario extends   \Eloquent implements Authenticatable
{
    //
    use AuthenticableTrait;
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
