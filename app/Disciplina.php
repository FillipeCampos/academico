<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Turma;

class Disciplina extends Model
{
    //
    protected $fillable = [
        'id',
        'nome'
      ];
  
      protected $table = 'disciplina';

      public function turmas()
      {
        return $this->hasMany(Turma::class, 'disciplina_id');
      }

      public function check_if_exists($nome){
        $disciplina = Disciplina::where('nome', $nome)->count();
        return ($disciplina == 1);
      }
}
