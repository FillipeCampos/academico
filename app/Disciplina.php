<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    //
    protected $fillable = [
        'id',
        'nome'
      ];
  
      protected $table = 'disciplina';

      public function turma()
      {
        return $this->hasMany(Turma::class, 'disciplina_id');
      }

}
