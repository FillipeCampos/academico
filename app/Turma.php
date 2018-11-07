<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
      //
      protected $fillable = [
        'id',  
        'disciplina_id',
        'usuario_id'
      ];
  
      protected $table = 'turma';

      public function disciplina()
      {
        return $this->belongsTo(Disciplina::class, 'disciplina_id');
      }

      public function professor()
      {
        return $this->belongsTo(Usuario::class, 'usuario_id');
      }

      public function avaliacao()
      {
        return $this->hasMany(Avaliacao::class, 'turma_id');
      }
}
