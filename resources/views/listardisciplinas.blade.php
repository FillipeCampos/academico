@extends('template.app')

@section('title')
Professor
@endsection

@section('nav-menu')
<li class=""><a href="index.html">Home</a></li>
<li><a id="disciplinas" href="{{url('/listarDisiciplinas')}}">Disciplinas Ministradas</a></li>
<li><a id="plano" href="{{url('/planoEnsino')}}">Definir Plano de Ensino</a></li>
<li><a  href="{{url('/gerenciarTurmas')}}">Gerenciar Turma</a></li>
@endsection

@section('conteudo-principal')
  <div class="card" style="width: 18rem;">   
  @foreach($disciplinas as $disciplina)
    <div class="card-header">     
       {{ $disciplina->nome }}
    </div>   
  <ul class="list-group list-group-flush">    
    @foreach($disciplina->turmas as $turma)
     <li class="list-group-item"> Turma {{ $turma->id }} <a href="{{url('/gerenciarTurmas/'.$turma->id)}}">Gerenciar Notas</a></li>    
    @endforeach 
  </ul> 
  @endforeach  
</div>

@endsection






 <!-- <div id="areaVerDisciplina" class="card card-outline-secondary" style="width: 18rem;margin-left:510px;margin-top:30px;">
   
    <div class="card-header">
        <h3 class="mb-0">Lista Disciplina</h3>  
    </div>
    <div class="card-body">
        <h5>$item->nome</h5>
    </div>
  
</div>-->