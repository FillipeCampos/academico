@extends('template.app')

@section('title')
Professor
@endsection

@section('nav-menu')
<li class=""><a href="index.html">Home</a></li>
<li><a id="disciplinas" href="{{url('/listarDisiciplinas')}}">Disciplinas Ministradas</a></li>
<li><a id="plano" href="{{url('/planoEnsino')}}">Definir Plano de Ensino</a></li>
<li><a  href="{{url('/professor')}}">Gerenciar Turma</a></li>
@endsection


@section('conteudo-principal')
  <div id="areaVerDisciplina" class="card card-outline-secondary" style="width: 18rem;margin-left:510px;margin-top:30px;">
    <div class="card-header">
        <h3 class="mb-0">Lista Disciplina</h3>
    </div>
    <div class="card-body">

    
    </div>
</div>
@endsection
