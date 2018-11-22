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
<h3>Area Plano Ensino</h3>
@endsection
